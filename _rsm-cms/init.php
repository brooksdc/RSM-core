<?php
/*
Plugin Name: RSM – Custom CMS Assets
Description: Custom content parts and option data independent of this theme. (Don't Delete!)
Version: 1.7
Updated: Nov 23, 2017
*/

/*
 @ Hey YOU! Attention!
 Absolutely no part of this plugin should be distrubuted outside of this plugin / website.
 */


//---
// INITIALIZE ACF Pro as part of this plugin...
//--

// 1. customize ACF path
add_filter('acf/settings/path', 'my_acf_settings_path');

function my_acf_settings_path( $path ) {

	// update path
	$path = dirname( __FILE__ ) .  '/libs/acf/';
	return $path;

}

// 2. customize ACF dir
add_filter('acf/settings/dir', 'my_acf_settings_dir');

function my_acf_settings_dir( $dir ) {

	// update path
	$dir = plugin_dir_url( __FILE__ ) . 'libs/acf/';
	return $dir;

}

// 3. Hide ACF field group menu item (uncomment)
//add_filter('acf/settings/show_admin', '__return_false');

// 4. Include ACF
include_once( 'libs/acf/acf.php' );


//---
// Set custom SAVE point for JSON ACF
//---
add_filter('acf/settings/save_json', 'my_acf_json_save_point');
 
function my_acf_json_save_point( $path ) {
    
    // update path
    $path = plugin_dir_path( __FILE__ ) . '/acf-json';
    
    
    // return
    return $path;
}

//---
// Set custom LOAD point for JSON ACF
//---
add_filter('acf/settings/load_json', 'my_acf_json_load_point');

function my_acf_json_load_point( $paths ) {
    
    // remove original path (optional)
    unset($paths[0]);
    
    
    // append path
    $paths[] = plugin_dir_path( __FILE__ ) . '/acf-json';
    
    
    // return
    return $paths;
    
}


//---
// LOAD PLUGIN FUNCTIONS
//---
include dirname(__FILE__) . '/includes/functions/rsm-helpers.php';
include dirname(__FILE__) . '/includes/functions/rsm-locate-template.php';
include dirname(__FILE__) . '/includes/functions/rsm-get-template.php';
include dirname(__FILE__) . '/includes/functions/rsm-shortcode-metabox-info.php';
//include dirname(__FILE__) . '/includes/functions/rsm-shortcode-button-tinyMCE.php'; //not working
//include dirname(__FILE__) . '/includes/functions/rsm-template-loader.php'; //not working yet


//---
// LOAD CMS ADMIN PARTS
//---
include dirname(__FILE__) . '/assets/css/styles.php';
include dirname(__FILE__) . '/parts/options/acf-options-panel.php';
include dirname(__FILE__) . '/parts/careers/rsm_careers.php';
include dirname(__FILE__) . '/parts/projects/rsm_projects.php';
include dirname(__FILE__) . '/parts/promotions/rsm_promotions.php';
include dirname(__FILE__) . '/parts/team-members/rsm_team-members.php';
include dirname(__FILE__) . '/parts/testimonials/rsm_testimonials.php';
 

//---
// LOAD INCLUDED SHORTCODES
//---
include_once dirname(__FILE__) . ( '/includes/shortcodes/sc-additional-emails.php' );
include_once dirname(__FILE__) . ( '/includes/shortcodes/sc-additional-phones.php' );
include_once dirname(__FILE__) . ( '/includes/shortcodes/sc-associations.php' );
include_once dirname(__FILE__) . ( '/includes/shortcodes/sc-awards-recognition.php' );
include_once dirname(__FILE__) . ( '/includes/shortcodes/sc-business-hours.php' );
include_once dirname(__FILE__) . ( '/includes/shortcodes/sc-cta-aside-box.php' );
include_once dirname(__FILE__) . ( '/includes/shortcodes/sc-google-map.php' );
include_once dirname(__FILE__) . ( '/includes/shortcodes/sc-header-logo.php' );
include_once dirname(__FILE__) . ( '/includes/shortcodes/sc-local-directory-menu.php' );
include_once dirname(__FILE__) . ( '/includes/shortcodes/sc-payment-types.php' );
include_once dirname(__FILE__) . ( '/includes/shortcodes/sc-primary-address.php' );
include_once dirname(__FILE__) . ( '/includes/shortcodes/sc-primary-email.php' );
include_once dirname(__FILE__) . ( '/includes/shortcodes/sc-primary-phone.php' );
include_once dirname(__FILE__) . ( '/includes/shortcodes/sc-service-areas.php' );
include_once dirname(__FILE__) . ( '/includes/shortcodes/sc-site-credit.php' );
include_once dirname(__FILE__) . ( '/includes/shortcodes/sc-social-networks.php' );
include_once dirname(__FILE__) . ( '/includes/shortcodes/sc-team-member.php' );
include_once dirname(__FILE__) . ( '/includes/shortcodes/sc-team-members.php' );
include_once dirname(__FILE__) . ( '/includes/shortcodes/sc-testimonial.php' );
include_once dirname(__FILE__) . ( '/includes/shortcodes/sc-testimonial-list.php' );


//---
// LOAD INCLUDED WIDGETS
//---
//include_once dirname(__FILE__) . ( '/includes/widgets/widget-rsm-entry-point.php' );
include_once dirname(__FILE__) . ( '/includes/widgets/widget-rsm-local-directory-menu.php' );
include_once dirname(__FILE__) . ( '/includes/widgets/widget-rsm-primary-phone.php' );
include_once dirname(__FILE__) . ( '/includes/widgets/widget-rsm-primary-address.php' );
include_once dirname(__FILE__) . ( '/includes/widgets/widget-rsm-social-channels.php' );
include_once dirname(__FILE__) . ( '/includes/widgets/widget-rsm-cta-button-group.php' );
include_once dirname(__FILE__) . ( '/includes/widgets/widget-rsm-footer-logo.php' );
include_once dirname(__FILE__) . ( '/includes/widgets/widget-rsm-contact-card.php' );

//---
// REGISTER FRONT-END SCRIPTS
// Use wp_register_script to so WordPress knows about your scripts that may be called within the shortcodes.
//---
function rsm_frontend_scripts() {

	//register
	$gm_api_key = get_field('google_map_api_key', 'options');
	wp_register_script( 'google-map-api-js', 'https://maps.googleapis.com/maps/api/js?key='.$gm_api_key, array(), NULL, false );



	//enqueue
	wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', null, '1.10.8.1' );


}
add_action( 'wp_enqueue_scripts', 'rsm_frontend_scripts' );	

//---
// Include image crop for logo/badge images
//---
if( !function_exists('rsm_custom_image_sizes') ):
function rsm_custom_image_sizes() {

	// NOTE. If this plugin installed to an existing database you'll need to run a "regenerate thumbnails" process.
	add_image_size( 'thumb-no-crop', 250, 250 ); //no cropping
	add_image_size( 'med-no-crop', 450, 450 ); //no cropping
}
endif;
add_action( 'after_setup_theme', 'rsm_custom_image_sizes' );


/*********************************************
 Automatically create a page called 'style guide' for quick theming purposes
 NOTE! You must paste this function in the init.php file of the plugin or the theme's functions file.
 Also note, this page uses MARKUP SPECIFIC TO THE BASE RSM THEME (based on bootstrap).
 */
register_activation_hook( __FILE__, 'activate_style_guide' );
function activate_style_guide() {
	$style_guide = array(
		'post_title' => 'Style Guide',
		'post_content' => 'This is a page that demonstrates the styles of this site.',
		'post_status' => 'publish',
		'post_type' => 'page',
		'page_template'  => 'page-style-guide.php'
	);

	wp_insert_post( $style_guide, '');
}

//---
// Register a page in plugin activation to demonstrate the various shortcodes available form this plugin
//---
/*register_activation_hook( __FILE__, 'activate_shortcode_guide' );
function activate_shortcode_guide() {
	$shortcode_content = file_get_contents( dirname(__FILE__) . ( '/templates/shortcode-guide-table.php' ) );

	$shortcode_guide = array(
		'post_title' => 'Shortcode Guide',
		'post_content' => $shortcode_content,
		'post_status' => 'publish',
		'post_type' => 'page',
		'page_template'  => 'page-shortcode-guide.php'
	);

	wp_insert_post( $shortcode_guide, '');
}*/