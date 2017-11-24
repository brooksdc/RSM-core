<?php
/**
 * SHORTCODE: Testimonial List.
 *
 * This shortcode will output the template
 * file from the templates/folder.
 *
 * --> [rsm_testimonial_list] //display all
 *
 * @since 1.0.0
 */
function rsm_sc_testimonial_list($atts) {

	
	ob_start();
	rsm_get_template( 'rsm-testimonial-list.php' );
	return ob_get_clean();

}
add_shortcode( 'rsm_testimonial_list', 'rsm_sc_testimonial_list' );
