<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features, so keep an
 * eye out for that. At this point, these are all custom additions. OCT. 2017.
 *
 * @package rsm_core_
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function rsm_core_body_classes( $classes ) {
	global $post;

	if( !is_404() && !is_search() ){
		$post_id = $post->ID;
	} else {
		$post_id = null;
	}
	

	$rsm_hero_banner_full_height = get_field('rsm_hero_banner_full_height', $post_id);
	$rsm_page_disable_masthead = get_field('rsm_page_disable_masthead', $post_id);

	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Check if there is a custom page class set in the page options.
	// requires option panel setting (currently ACF get_field())
	if(function_exists('get_field')):
		$custom_page_class = get_field( 'custom_page_class' );
		if(!empty($custom_page_class)){
			$classes[] = $custom_page_class;
		} 
	endif;

	// Add class with the page name
	if( !is_404() && !is_search() ) {
		$classes[] = 'page-'.$post->post_name; 
		$classes[] = $post->post_type;
	} 

	// Add class if page (NOT home) has a featured image set
	if (!is_front_page() && has_post_thumbnail()) {
		$classes[] = 'has-featured-image';
	}

	// Label the page as an inner-page if it isn't home.
	if (!is_front_page()) {
		$classes[] = 'inner-page';
	}

	// Check if there is a Hero element set to "ful-height"
	if ( $rsm_hero_banner_full_height ) {
		$classes[] = 'has-full-height-hero';
	}

	// Checl if the masthead is disabled for this page
	if( $rsm_page_disable_masthead == true ) {
		$classes[] = 'masthead-disabled';
	}
	
	return $classes;

}
add_filter( 'body_class', 'rsm_core_body_classes' );


/**
 * Version compare
 */
if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
	/**
	 * Filters wp_title to print a neat <title> tag based on what is being viewed.
	 *
	 * @param string $title Default title text for current view.
	 * @param string $sep Optional separator.
	 * @return string The filtered title.
	 */
	function rsm_core_wp_title( $title, $sep ) {
		if ( is_feed() ) {
			return $title;
		}

		global $page, $paged;

		// Add the blog name
		$title .= get_bloginfo( 'name', 'display' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}

		// Add a page number if necessary:
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title .= " $sep " . sprintf( __( 'Page %s', 'quantus' ), max( $paged, $page ) );
		}

		return $title;
	}
	add_filter( 'wp_title', 'rsm_core_wp_title', 10, 2 );

endif;

/**
 * Change "Default Template" label in page attributes
 */
function rsm_change_default_template_name( $label, $context = null ) {
  return __( '1-col, Boxed (Default)', 'quantus' ); // new template name
}
add_filter( 'default_page_template_title', 'rsm_change_default_template_name');


/*
 * Change default excerpt [...] to custom text
 */
if(!function_exists('wp_new_excerpt_more')):
	function wp_new_excerpt_more($more) {
	   	global $post;
	return ' <a href="'. get_permalink($post->ID) . '">...Continue Reading</a>';
	}
	add_filter('excerpt_more', 'wp_new_excerpt_more');
endif;


/**
 * Get the meta data of an image by ID;
 * use something like $attachment_meta = wp_get_attachment(56); to create an object
 * You can get the featured image by by using: $post_thumbnail_id = get_post_thumbnail_id();
 *
 * NOTE: If you're looking for the image dimensions, use: wp_get_attachment_image_src(). Docs: https://developer.wordpress.org/reference/functions/wp_get_attachment_image_src/
 */
if(!function_exists('wp_get_attachment')):
	function wp_get_attachment( $attachment_id ) {

		$attachment = get_post( $attachment_id );
		return array(
			'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
			'caption' => $attachment->post_excerpt,
			'description' => $attachment->post_content,
			'href' => get_permalink( $attachment->ID ),
			'src' => $attachment->guid,
			'title' => $attachment->post_title
		);
	}
endif;


/**
 * Get the ID of an image by looking up its source URL
 */
if(!function_exists('wp_get_image_id_from_src')) {
	// Function to retrieve the attachment ID from the file URL (which is all we have to work with form the options meta)
	function wp_get_image_id_from_src($image_url) {
		global $wpdb;
		$attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url )); 
	        return $attachment[0]; 
	}
}

/**
 * Boolean function to determine if the current page, or specific ID, has children.
 * ex. if( wp_has_children() ) { ... }
 */
if(!function_exists('wp_has_children')) {
	function wp_has_children($id = null) {
		global $post;

		if(!empty($id)){
			$parent_id = $id;
		} else {
			$parent_id = $post->ID;
		}

		$pages = get_pages('child_of=' . $parent_id);

		$child_count = count($pages);
		if($child_count !== null && $child_count > 0) {
			$wp_has_children = true;
		} else {
			$wp_has_children = false;
		}

		//return count($pages);
		return $wp_has_children;
	}
}

/*
 * Function to determine if the current page is 3rd level or down.
 */
if(!function_exists('has_grandparent')){
	function has_grandparent($page_id = null) {
	    if(is_null($page_id)) {
	    	$page_id = get_the_ID();
	    }
	    
	    $current_page = get_page( $page_id );

	    if ($current_page->post_parent > 0){
	        //has at least a parent
	        $parent_page = get_page($current_page->post_parent);
	        if ($parent_page->post_parent > 0){
	            return $parent_page->post_parent;
	        }else{
	            return false;
	        }
	    }
	    return false;
	}
}

/**
 * A boolean function to determine if you're on a blog related page:
 * Index, single, archive, author, etc.
 */
if(!function_exists('wp_is_blog')):
	function wp_is_blog() {
	    return ( is_author() || is_category() || is_tag() || is_date() || is_home() || is_single() ) && 'post' == get_post_type();
	}
endif;


/**
 * Hide Password-Protected posts.
 * Creates a new filtering function that will avoid including password-protected posts to the query.
 *
 * WARNING: This will mess with the WooCommerce orders page.
 */
/*function my_password_post_filter( $where = '' ) {
 //Make sure this only applies to loops / feeds on the frontend:
    if (!is_single() && !is_admin()) {
        // exclude password protected
        $where .= " AND post_password = ''";
    }
    return $where;
}
add_filter( 'posts_where', 'my_password_post_filter' );

//hide password protected posts on post navigation
add_filter( 'get_previous_post_where', 'my_theme_mod_adjacent' );
add_filter( 'get_next_post_where', 'my_theme_mod_adjacent' );
function my_theme_mod_adjacent( $where ) {
    return $where . " AND p.post_password = ''";
}*/

