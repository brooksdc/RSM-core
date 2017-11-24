<?php
/**
 * SHORTCODE: Header logo.
 *
 * This shortcode will output the template
 * file from the templates/folder.
 *
 * @since 1.0.0
 */
function rsm_sc_header_logo() {

	ob_start();
	rsm_get_template( 'rsm-header-logo.php' );
	return ob_get_clean();

}
add_shortcode( 'rsm_header_logo', 'rsm_sc_header_logo' );
