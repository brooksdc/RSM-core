<?php
/**
 * SHORTCODE: Primary Address.
 *
 * This shortcode will output the template
 * file from the templates/folder.
 *
 * @since 1.0.0
 */
function rsm_sc_primary_address() {

	ob_start();
	rsm_get_template( 'rsm-primary-address.php' );
	return ob_get_clean();

}
add_shortcode( 'rsm_primary_address', 'rsm_sc_primary_address' );
