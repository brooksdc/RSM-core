<?php
/**
 * SHORTCODE: Payment Types.
 *
 * This shortcode will output the template
 * file from the templates/folder.
 *
 * @since 1.0.0
 */
function rsm_sc_payment_types() {

	ob_start();
	rsm_get_template( 'rsm-payment-types.php' );
	return ob_get_clean();

}
add_shortcode( 'rsm_payment_types', 'rsm_sc_payment_types' );
