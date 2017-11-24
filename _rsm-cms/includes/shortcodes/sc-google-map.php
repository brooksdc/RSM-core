<?php
/**
 * SHORTCODE: Google Map.
 *
 * This shortcode will output the template
 * file from the templates/folder.
 *
 * @since 1.0.0
 */
function rsm_sc_google_map() {

	ob_start();
	rsm_get_template( 'rsm-google-map.php' );
	return ob_get_clean();

}
add_shortcode( 'rsm_google_map', 'rsm_sc_google_map' );
