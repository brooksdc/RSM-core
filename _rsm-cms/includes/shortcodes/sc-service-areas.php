<?php
/**
 * SHORTCODE: Service Areas.
 *
 * This shortcode will output the template
 * file from the templates/folder.
 *
 * @since 1.0.0
 */
function rsm_sc_service_areas() {

	ob_start();
	rsm_get_template( 'rsm-service-areas.php' );
	return ob_get_clean();

}
add_shortcode( 'rsm_service_areas', 'rsm_sc_service_areas' );
