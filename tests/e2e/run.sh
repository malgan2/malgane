#!/usr/bin/env bash
# End-to-end test: builds a real WordPress + WooCommerce store on SQLite, installs the
# plugin, mocks Whop's API, and runs checkout + webhook scenarios against both WooCommerce
# order storage modes. Needs php (with pdo_sqlite), composer, node and git.
#
#   tests/e2e/run.sh
#
# Downloads go to tests/e2e/.work and are reused on later runs.
set -euo pipefail

HERE="$(cd "$(dirname "$0")" && pwd)"
PLUGIN="$(cd "$HERE/../../whop-klarna-for-woocommerce" && pwd)"
WORK="$HERE/.work"
WP="$WORK/wordpress"
WP_VERSION=7.1.3
WC_VERSION=11.2.1

mkdir -p "$WORK"
if [ ! -d "$WP" ]; then
	echo "Downloading WordPress $WP_VERSION, WooCommerce $WC_VERSION and the SQLite driver..."
	git clone -q --depth 1 --branch "$WP_VERSION" https://github.com/WordPress/WordPress.git "$WP"
	git clone -q --depth 1 https://github.com/WordPress/sqlite-database-integration.git "$WORK/sqlite"
	git clone -q --depth 1 --branch "$WC_VERSION" --filter=blob:none --sparse https://github.com/woocommerce/woocommerce.git "$WORK/wc"
	git -C "$WORK/wc" sparse-checkout set plugins/woocommerce packages/php
	(cd "$WORK/wc/plugins/woocommerce" && COMPOSER_ALLOW_SUPERUSER=1 composer install --no-dev --no-interaction -q && WC_ADMIN_PHASE=core php bin/generate-feature-config.php)

	cp -rL "$WORK/sqlite/packages/plugin-sqlite-database-integration" "$WP/wp-content/plugins/sqlite-database-integration"
	sed -e "s#'{SQLITE_IMPLEMENTATION_FOLDER_PATH}'#__DIR__.'/plugins/sqlite-database-integration'#" \
		-e "s#{SQLITE_PLUGIN}#sqlite-database-integration/load.php#" \
		"$WORK/sqlite/packages/plugin-sqlite-database-integration/db.copy" > "$WP/wp-content/db.php"
	ln -s "$WORK/wc/plugins/woocommerce" "$WP/wp-content/plugins/woocommerce"
fi
if [ ! -d "$WORK/node_modules/@whop/sdk" ]; then
	npm install --prefix "$WORK" --no-audit --no-fund --silent @whop/sdk@2.4.0
fi

ln -sfn "$PLUGIN" "$WP/wp-content/plugins/whop-klarna-for-woocommerce"
mkdir -p "$WP/wp-content/mu-plugins"
cp "$HERE/mock-whop-api.php" "$WP/wp-content/mu-plugins/"
cp "$HERE/wp-config.php" "$WP/wp-config.php"

for file in $(find "$PLUGIN" -name '*.php'); do php -l "$file" > /dev/null; done
node --check "$PLUGIN/assets/js/blocks.js"

echo "== Webhook signatures vs. Whop's SDK"
node "$HERE/signature.mjs" "$PLUGIN" "$WORK"

WP_ROOT="$WP" php -S 127.0.0.1:8899 -t "$WP" "$HERE/router.php" > "$WORK/server.log" 2>&1 &
SERVER=$!
trap 'kill $SERVER 2> /dev/null' EXIT
sleep 1

for mode in classic hpos; do
	echo "== Checkout and webhooks ($mode order storage)"
	rm -rf "$WP/wp-content/database" "$WP/wp-content/whop-mock" "$WP/wp-content/debug.log"
	show_log() { echo "Store setup failed:"; tail -n 20 "$WP/wp-content/debug.log" 2> /dev/null; exit 1; }
	php "$HERE/setup-store.php" "$WP" install > /dev/null || show_log
	php "$HERE/setup-store.php" "$WP" activate || show_log
	product=$(php "$HERE/setup-store.php" "$WP" configure "$mode") || show_log
	# WooCommerce logs a notice of its own on its first load after install; only check
	# what is logged while the plugin handles checkouts and webhooks.
	: > "$WP/wp-content/debug.log"
	NO_PROXY='*' node "$HERE/e2e.mjs" "$WP" "$product" "$mode"
	if grep -E "PHP (Fatal|Warning|Notice|Deprecated)" "$WP/wp-content/debug.log"; then
		echo "PHP errors were logged during the $mode run."
		exit 1
	fi
done
