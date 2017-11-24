<?php
/**
 * SHORTCODE: Social Networks.
 *
 * This shortcode will output the template
 * file from the templates/folder.
 *
 * @since 1.0.0
 */
function rsm_sc_social_networks() {

	ob_start();
	rsm_get_template( 'rsm-social-networks.php' );
	return ob_get_clean();
	
}
add_shortcode( 'rsm_social_networks', 'rsm_sc_social_networks' );
