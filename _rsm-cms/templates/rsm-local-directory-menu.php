<?php
/**
 * Local Directory Menu Shortcode Template.
 *
 * This template can be overriden by copying this file to your-theme/rsm-templates/
 *
 * @author 		RSM
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Don't allow direct access

global $post;

//---
// Check if shortcode attributes are set
//---
if( !isset($args['exclude']) ) {

	$exclude_ids = null; 

} else {

	$exclude_ids = $args['exclude'];
}

if( !isset($args['depth']) ) {
	
	$depth = 2;

} else {

	$depth = $args['depth'];

}

//---
// Check if this is a 3rd-level page or deeper
//---
if ( wp_has_grandparent() ) {

	$has_grandparent = true;
	$grandparent_id = wp_has_grandparent();

} else {

	$has_grandparent = false;
	$grandparent_id = null;

}

//--
// Menu $args setup
//--
$top_level_active_class = null;

if ( is_page() && $has_grandparent ) {
	
	//get the granparent page ID
	$child_of = $grandparent_id;
}
elseif ( is_page() && $post->post_parent ) {
	
	//get the eparent page ID
	$child_of = $post->post_parent;
}
else {

	// if viewing the top-level page
	$child_of = $post->ID;
	$top_level_active_class = 'current_page_item';
}

$menu_args = array(
	'sort_column' => 'menu_order',
	'title_li' => '',
	'child_of' => $child_of,
	'echo' => 0,
	'depth' => $depth,
	'exclude' => $exclude_ids,
);
$childpages = wp_list_pages($menu_args);

//--
// Get the appropriate page ID for the section title of this directory
//--
if($post->post_parent == 0){

	 // top-level page
	$the_parent_post_id = $post->ID;

} else {

	//if 3rd-level page
	if ( $has_grandparent ){

		// get the top-level page ID
		$the_parent_post_id = $grandparent_id;

	} else {

		// get the top-level page ID from 2nd-level
		$the_parent_post_id = $post->post_parent;
	}
}

//---
// Custom section title meta... 
//---
$section_title = null; //@todo NO CUSTOM FIELD SETUP YET.

// check if there is custom field meta, determine the parent title...
if($section_title) {

	$parent_title = $section_title;

} else {

	if ( $has_grandparent ){
		
		$parent_title = get_the_title( $the_parent_post_id ); //$grandparent_id );
	} else {
		
		$parent_title = get_the_title( $the_parent_post_id ); //$post->post_parent );
	}

}


//---
// Get the parent item permalink
//---
if ( $has_grandparent ){
	$parent_link = get_the_permalink( $grandparent_id );
} else {
	$parent_link = get_the_permalink( $post->post_parent );
}


//---
// Output
//---
if ( $childpages ) {
	echo '<div class="rsm-local-menu">';
		echo '<nav class="rsm-local-menu__nav" role="navigation">';
			echo '<ul class="menu">';
				echo '<li class="menu__header page-item page-item-'.$the_parent_post_id.' '.$top_level_active_class.'"><a href="'.esc_attr($parent_link).'">'.$parent_title.'</a></li>';
				echo $childpages;
			echo '</ul>';
		echo '</nav>';	
	echo '</div>';
}



