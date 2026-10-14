#!/usr/bin/env bash
# Builds dist/whop-klarna-for-woocommerce.zip, the file you upload in WordPress.
set -euo pipefail

ROOT="$(cd "$(dirname "$0")/.." && pwd)"
mkdir -p "$ROOT/dist"
rm -f "$ROOT/dist/whop-klarna-for-woocommerce.zip"
cd "$ROOT"
zip -qr -X "dist/whop-klarna-for-woocommerce.zip" whop-klarna-for-woocommerce -x '*.DS_Store'
echo "Built dist/whop-klarna-for-woocommerce.zip"
