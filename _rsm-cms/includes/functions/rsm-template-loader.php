<?php
/**
 * Template loader.
 * Ref: http://jeroensormani.com/how-to-add-template-files-in-your-plugin/
 *
 * The template loader will check if WP is loading a template
 * for a specific Post Type and will try to load the template
 * from out 'templates' directory.
 *
 * @since 1.0.0
 *
 * @param	string	$template	Template file that is being loaded.
 * @return	string				Template file that should be loaded.
 */
function rsm_template_loader( $template ) {

	$find = array();
	$file = '';

	/* roll through multiple post type templates */
	if ( is_singular( 'rsm_project' ) ) :
		$file = 'single-rsm_project.php';
	elseif ( is_singular( 'rsm_job_posting' ) ) :
		$file = 'single-rsm_job_posting.php';
	elseif ( is_post_type_archive( 'rsm_project_type' ) ) :
		$file = 'taxonomy-rsm_project_type.php';
	endif;

	if ( file_exists( rsm_locate_template( $file ) ) ) :
		$template = rsm_locate_template( $file );
	endif;

	return $template;

}
add_filter( 'template_include', 'rsm_template_loader' );