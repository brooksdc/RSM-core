<?php
/**
 * SHORTCODE: Testimonial.
 *
 * This shortcode will output the template
 * file from the templates/folder.
 *
 * --> [rsm_testimonial id=##] //set specific ids
 *
 * @since 1.0.0
 */
function rsm_sc_testimonial($atts) {

	// setup attriutes for use in get_template function
	extract( shortcode_atts( array(
		'id' => null,
	), $atts ) );

	if(!empty($atts)) {
		$args = array( 'id' => $atts['id']);
	} else {
		$args = null;
	}
	
	ob_start();
	rsm_get_template( 'rsm-testimonial.php', $args );
	return ob_get_clean();

}
add_shortcode( 'rsm_testimonial', 'rsm_sc_testimonial' );
