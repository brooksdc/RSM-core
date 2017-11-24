<?php
/**
 * SHORTCODE: Primary Email.
 *
 * This shortcode will output the template
 * file from the templates/folder.
 *
 * @since 1.0.0
 */
function rsm_sc_primary_email($atts) {

	// setup attriutes for use in get_template function
	extract( shortcode_atts( array(
		'style' => 'textonly',
		'icon' => null,
	), $atts ) );

	if(!empty($atts)) {
		$args = array( 'style' => $atts['style'], 'icon' => $atts['icon']);
	} else {
		$args = null;
	}
	
	ob_start();
	rsm_get_template( 'rsm-primary-email.php', $args );
	return ob_get_clean();
	
}
add_shortcode( 'rsm_primary_email', 'rsm_sc_primary_email' );
