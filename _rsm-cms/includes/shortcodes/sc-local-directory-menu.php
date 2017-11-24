<?php
/**
 * SHORTCODE: Local Directory Menu.
 *
 * This shortcode will output the template
 * file from the templates/folder.
 *
 * @since 1.0.0
 */
function rsm_sc_local_directory_menu($atts) {

	// setup attriutes for use in get_template function
	extract( shortcode_atts( array(
		'exclude' => null, //list of IDs to EXCLUDE
		'depth' => null, // page depth
	), $atts ) );

	if(!empty($atts)) {
		$args = array( 'exclude' => $atts['exclude'], 'depth' => $atts['depth']);
	} else {
		$args = null;
	}

	ob_start();
	rsm_get_template( 'rsm-local-directory-menu.php', $args );
	return ob_get_clean();
}
add_shortcode( 'rsm_local_directory_menu', 'rsm_sc_local_directory_menu' );
