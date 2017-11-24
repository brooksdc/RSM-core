<?php
/**
 * SHORTCODE: Additional Phones.
 *
 * This shortcode will output the template
 * file from the templates/folder.
 *
 * @since 1.0.0
 */
function rsm_sc_additional_phones() {

	ob_start();
	rsm_get_template( 'rsm-additional-phones.php' );
	return ob_get_clean();
	
}
add_shortcode( 'rsm_additional_phones', 'rsm_sc_additional_phones' );
