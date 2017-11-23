<?php
/**
 * Various Custom Functions
 */


/*
 * Debugging tool.
 * Prints a readable array object.
 */
if(!function_exists('spill')) {
	function spill($element) {
		echo '<pre>'.print_r($element, true).'</pre>';
	}
}

/*
 * Build a JSON+LD object for structured data about the business.
 */
if( !function_exists('rsm_structured_business_data') ):
	function rsm_structured_business_data() {

		if(function_exists('get_field')){

			// get data from options panel
			$address_company_name = get_field('address_company_name', 'option');
			$address_street = get_field('address_street', 'option');
			$address_city = get_field('address_city', 'option');
			$address_region = get_field('address_region', 'option');
			$address_country = get_field('address_country', 'option');
			$address_postal = get_field('address_postal', 'option');
			$organization_type = get_field('schema_organization_type', 'option');
			$organization_type_child = get_field('schema_organization_type_child', 'option');
			$schema_email = get_field('schema_email', 'option');
			$schema_faxnumber = get_field('schema_faxnumber', 'option');
			$schema_telephone = get_field('schema_telephone', 'option');
			$schema_description = get_field('schema_description', 'option');
			$schema_logo = get_field('schema_logo', 'option');
			$schema_image = get_field('schema_image', 'option');
			$schema_priceRange = get_field('schema_priceRange', 'option');
			$schema_url = get_site_url();
			$schema_name = get_bloginfo('name');


			// build PHP object so we can encode with JSON.
			$schemaObj = new stdClass();
			
			$schemaObj->{'@context'} = 'http://schema.org';
			if($organization_type_child){
				$schemaObj->{'@type'} = $organization_type_child;
			} else {
				$schemaObj->{'@type'} = $organization_type;
			}
			$schemaObj->name = $schema_name;

			// not sure if there's a better way to create this second level in the object... but this seems to work.
			$schemaObj->address = new stdClass();
			$schemaObj->address->{'@type'} = 'PostalAddress';
			$schemaObj->address->streetAddress = $address_street;
			$schemaObj->address->addressLocality = $address_city;
			$schemaObj->address->addressRegion = $address_region;
			$schemaObj->address->postalCode = $address_postal;
			$schemaObj->address->addressCountry = $address_country;
			$schemaObj->email = $schema_email;
			$schemaObj->faxNumber = $schema_faxnumber;
			$schemaObj->telephone = $schema_telephone;
			$schemaObj->description = $schema_description;
			$schemaObj->logo = $schema_logo;
			$schemaObj->image = $schema_image;
			$schemaObj->url = $schema_url;
			$schemaObj->priceRange = $schema_priceRange;

			// json encode
			$schemaJSON = json_encode($schemaObj);

			echo '<script type="application/ld+json">'.$schemaJSON.'</script>';
		}
	}

endif;

/*
 * Build a JSON+LD object for structured data about this website.
 */
if( !function_exists('rsm_structured_website_data') ):
	function rsm_structured_website_data() {

		if(function_exists('get_field')){

			// get data from WP
			
			$schema_url = get_site_url();
			$schema_name = get_bloginfo('name');


			// build PHP object so we can encode with JSON.
			$schemaObj = new stdClass();
			$schemaObj->{'@context'} = 'http://schema.org';
			$schemaObj->{'@type'} = 'Website';
			$schemaObj->{'@id'} = '#website';
			$schemaObj->url = $schema_url;
			$schemaObj->name = $schema_name;

			// not sure if there's a better way to create this second level in the object... but this seems to work.
			$schemaObj->potentialAction = new stdClass(); 
			$schemaObj->potentialAction->{'@type'} = 'SearchAction';
			$schemaObj->potentialAction->target = $schema_url.'?s={search_term_string}';
			$schemaObj->potentialAction->{'query-input'} = 'required name=search_term_string';

			// json encode
			$schemaJSON = json_encode($schemaObj);

			echo '<script type="application/ld+json">'.$schemaJSON.'</script>';
		}
	}

endif;

/*
{"@context":"http:\/\/schema.org",
"@type":"WebSite",
"@id":"#website",
"url":"http:\/\/proampelectric.ca\/",
"name":"ProAmp Electric Ltd.",
"potentialAction":
{"@type":"SearchAction",
"target":"http:\/\/proampelectric.ca\/?s={search_term_string}",
"query-input":"required name=search_term_string"}}
*/

/**
 * Custom maintenance mode (Comment out when not in use)
 * This version relies on a theme option to activate.
 */
if(!function_exists('activate_maintenance_mode')) {
	function activate_maintenance_mode() {
	    //If the current user is NOT an 'Administrator' or NOT 'Super Admin' then display Maintenance Page.
	    if ( !(current_user_can( 'administrator' ) ||  current_user_can( 'super admin' ))) {
	        //Kill WordPress execution and display HTML maintenance message. 
	        $maintenance_mode = get_field('maintenance_mode', 'option');
			if($maintenance_mode == true){
		        require_once( get_template_directory() . '/503.php' );
		    	die();
	    	}
	    }
	}
	//Hooks the 'activate_maintenance_mode' function on to the 'get_header' action.
	add_action('get_header', 'activate_maintenance_mode');
}

/*
 * Highlight keywords in search
 */
if(!function_exists('search_excerpt_highlight')):
	function search_excerpt_highlight() {
	 $excerpt = get_the_excerpt();
	 $link = get_the_permalink();
	 $keys = preg_quote(implode('|', explode(' ', get_search_query())));
	 $excerpt = preg_replace('/(' . $keys .')/iu', '<span class="search-excerpt">\0</span>', $excerpt);

	 echo '<p class="highlighted-summary">' . $excerpt . '<span class="excerpt-leader">...</span></p>';
	 echo '<a href="'.$link.'">'.$link.'</a>';
	}
endif;

if(!function_exists('search_title_highlight')):
	function search_title_highlight() {
	 $title = get_the_title();
	 $link = get_the_permalink();
	 $keys = implode('|', explode(' ', get_search_query()));
	 $title = preg_replace('/(' . $keys .')/iu', '<span class="search-excerpt">\0</span>', $title);

	 echo '<a href="'.$link.'">'.$title.'</a>';
	}
endif;


/**
 * Obfuscate data. Useful for email addresses.
 */
if(!function_exists('obfuscate')){
	function obfuscate($email){
		$link = '';
		foreach(str_split($email) as $letter)
		$link .= '&#' . ord($letter) . ';';
		return $link;
	}
}

/**
 * Get a count of the header widget areas in use.
 */
if( !function_exists( 'rsm_header_col_count' ) ) {
	function rsm_header_col_count() {
		
		// build as an array so we can return a count
		$header_cols = array();

		// setup conditionals
		if( is_active_sidebar( 'header-utility-1' ) ) {
			$header_cols[] = true;
		}
		if( is_active_sidebar( 'header-utility-2' ) ) {
			$header_cols[] = true;
		}

		return count($header_cols);
	}
}

/**
 * Get a count of the footer widget areas in use.
 */
if( !function_exists( 'rsm_footer_col_count' ) ) {
	function rsm_footer_col_count() {
		
		// build as an array so we can return a count
		$footer_cols = array();

		// setup conditionals
		if( is_active_sidebar( 'footer-dropin-1' ) ) {
			$footer_cols[] = true;
		}
		if( is_active_sidebar( 'footer-dropin-2' ) ) {
			$footer_cols[] = true;
		}
		if( is_active_sidebar( 'footer-dropin-3' ) ) {
			$footer_cols[] = true;
		}
		if( is_active_sidebar( 'footer-dropin-4' ) ) {
			$footer_cols[] = true;
		}

		return count($footer_cols);
	}
}

/**
 * Convert string to array.
 * Take a string and convert all line breaks into individual array items
 *
 * Example usage: $my_new_array = convert_string_to_array($string);
 */
if(!function_exists('convert_string_to_array')){
	function convert_string_to_array($string){
		$bits = explode("\n", $string);
		$newArray = array();
		foreach($bits as $bit)
		{
		  if($bit != "\r") {
			  $newArray[] = str_replace("\r", '', $bit);
			}
		}
		return $newArray;
	}
}


/**
 * Lower the default Yoast SEO meta box priority.
 */
function lower_wpseo_priority( $html ) {
    return 'low';
}
add_filter( 'wpseo_metabox_prio', 'lower_wpseo_priority' );


/**
 * Add a dropdown to the Tiny MCE toolbar
 */
function custom_mce_buttons_2($buttons) {
	array_unshift($buttons, 'styleselect');
	return $buttons;
}
add_filter('mce_buttons_2', 'custom_mce_buttons_2');


/**
 * Callback function to filter the MCE settings
 */
function custom_mce_before_init_insert_formats( $init_array ) {  

// Define the style_formats array

	$style_formats = array(  
		/*
		* Each array child is a format with it's own settings
		* Notice that each array has title, block, classes, and wrapper arguments
		* Title is the label which will be visible in Formats menu
		* Block defines whether it is a span, div, selector, or inline style
		* Classes allows you to define CSS classes
		* Wrapper whether or not to add a new block-level element around any selected elements
		*/
		array(  
			'title' => 'Paragraph Lead Text',  
			'block' => 'p',  
			'classes' => 'lead',
			'wrapper' => false,
			
		),
		array(  
			'title' => 'Button - Default',  
			'block' => 'a',
			'attributes' => array (
				'href' => '(click EDIT to add a link)',
			),  
			'classes' => 'btn btn-default',
			'wrapper' => false,
		),  
		array(  
			'title' => 'Button - Primary',  
			'block' => 'a',
			'attributes' => array (
				'href' => '(click EDIT to add a link)',
			),  
			'classes' => 'btn btn-primary',
			'wrapper' => false,
		),
		array(  
			'title' => 'Button - Secondary',  
			'block' => 'a',
			'attributes' => array (
				'href' => '(click EDIT to add a link)',
			),  
			'classes' => 'btn btn-secondary',
			'wrapper' => false,
		),
		array(  
			'title' => 'Button - Accent',  
			'block' => 'a',
			'attributes' => array (
				'href' => '(click EDIT to add a link)',
			),  
			'classes' => 'btn btn-accent',
			'wrapper' => false,
		),
	);  
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );  
	
	return $init_array;  
  
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'custom_mce_before_init_insert_formats' ); 

/**
 * Add this theme stylesheet to the WP editor (accompanies function above)
 *
 This stylesheet can be generated by the SCSS variables in this theme for consitency (possible excess overhead for editor loading though), or just a simple list of styles to recognize certain formatting.
 */
function custom_theme_add_editor_styles() {
    add_editor_style( 'assets/css/custom-WP-editor-styles.css' );
}
add_action( 'admin_init', 'custom_theme_add_editor_styles' );


/**
 * Custom menu item Additions from ACF
 */
function rsm_wp_nav_menu_objects( $items, $args ) {
	
	// loop
	foreach( $items as &$item ) {
		
		// vars
		$icon = get_field('rsm_menu_item_icon', $item);
		$button_classes = get_field('rsm_menu_item_button_classes', $item);

		// append icon
		if( $icon ) {
			
			$item->title .= ' <i class="fa '.$icon.'"></i>';
			
		}

		//wrap title with button class markup
		if( $button_classes ) {

			$item->classes[] = 'has-button-classes';
			$item->title = '<span class="'.$button_classes.'">'.$item->title.'</span>';

		}
		
	}
	
	// return
	return $items;
	
}
add_filter('wp_nav_menu_objects', 'rsm_wp_nav_menu_objects', 10, 2);