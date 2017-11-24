<?php
/**
 * SHORTCODE: Business Hours.
 *
 * This shortcode will output the template
 * file from the templates/folder.
 *
 * @since 1.0.0
 */
function rsm_sc_business_hours() {

	ob_start();
	rsm_get_template( 'rsm-business-hours.php' );
	return ob_get_clean();

}
add_shortcode( 'rsm_business_hours', 'rsm_sc_business_hours' );
