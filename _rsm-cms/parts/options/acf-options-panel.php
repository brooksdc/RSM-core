<?php
// Options panel setup for ACF
// Ref: https://www.advancedcustomfields.com/resources/
$site_name = get_bloginfo('name');

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> $site_name.' - Options',
		'menu_title'	=> $site_name.' - Options',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=>  true
	));
	
	// Create pages to add fields to in admin...
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Social Networks and Tracking Codes',
		'menu_title'	=> 'Social Networks and Tracking Codes',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Global Contact Details',
		'menu_title'	=> 'Contact Details',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Business Info',
		'menu_title'	=> 'Business Info',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Settings',
		'menu_title'	=> 'Theme Settings',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Global Template Parts',
		'menu_title'	=> 'Global Template Parts',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Maintenance Page (503.php)',
		'menu_title'	=> 'Maintenance Page',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> '404 Page',
		'menu_title'	=> '404 Page',
		'parent_slug'	=> 'theme-general-settings',
	));
	
}




