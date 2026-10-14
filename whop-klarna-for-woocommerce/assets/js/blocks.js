/**
 * Registers Klarna with the block-based Checkout. Plain browser JavaScript, no build step.
 */
( function () {
	var registry = window.wc && window.wc.wcBlocksRegistry;
	var wcSettings = window.wc && window.wc.wcSettings;
	if ( ! registry || ! wcSettings || ! window.wp || ! window.wp.element ) {
		return;
	}

	var createElement = window.wp.element.createElement;
	var decodeEntities = window.wp.htmlEntities ? window.wp.htmlEntities.decodeEntities : function ( text ) { return text; };
	var settings = wcSettings.getSetting( 'whop_klarna_data', {} );
	var title = decodeEntities( settings.title || 'Klarna' );
	var description = decodeEntities( settings.description || '' );

	function Content() {
		return description ? createElement( 'p', null, description ) : null;
	}

	function Label( props ) {
		var PaymentMethodLabel = props.components && props.components.PaymentMethodLabel;
		return PaymentMethodLabel ? createElement( PaymentMethodLabel, { text: title } ) : createElement( 'span', null, title );
	}

	registry.registerPaymentMethod( {
		name: 'whop_klarna',
		label: createElement( Label ),
		content: createElement( Content ),
		edit: createElement( Content ),
		ariaLabel: title,
		// Country and amount rules are applied on the server, which leaves Klarna out of
		// the list of payment methods the checkout receives when they don't fit.
		canMakePayment: function () {
			return true;
		},
		supports: {
			features: settings.supports || [ 'products' ],
		},
	} );
} )();
