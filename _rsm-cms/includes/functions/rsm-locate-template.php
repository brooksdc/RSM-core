<?php
/**
 * Locate template.
 * Ref: http://jeroensormani.com/how-to-add-template-files-in-your-plugin/
 *
 * Locate the called template.
 * Search Order:
 * 1. /themes/theme-name/rsm-templates/$template_name
 * 2. /themes/theme-name/$template_name
 * 3. /plugins/rsm-plugin/templates/$template_name.
 *
 * @since 1.0.0
 *
 * @param 	string 	$template_name			Template to load.
 * @param 	string 	$string $template_path	Path to templates.
 * @param 	string	$default_path			Default path to template files.
 * @return 	string 							Path to the template file.
 */
function rsm_locate_template( $template_name, $template_path = '', $default_path = '' ) {

	// Set variable to search in THEME for rsm-templates folder.
	if ( ! $template_path ) :
		$template_path = 'rsm-templates/';
	endif;

	// Set default plugin templates path.
	if ( ! $default_path ) :
		$default_path = plugin_dir_path( __FILE__ ) . '../../templates/'; // Path to the template folder from HERE
	endif;

	// Search template file in theme folder.
	$template = locate_template( array(
		$template_path . $template_name,
		$template_name
	) );

	// Get plugins template file.
	if ( ! $template ) :
		$template = $default_path . $template_name;
	endif;

	return apply_filters( 'rsm_locate_template', $template, $template_name, $template_path, $default_path );

}