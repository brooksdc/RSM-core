<?php

//---
// Determine post ID to use.
// Using $post_id as a vairable so specific IDs can be used conditionally, if required. (For example, if is blog page, etc.)
//---
$post_id = $post->ID;


// UPDATED 2017.11.18
$rsm_page_use_masthead = get_field('rsm_page_use_fullwidth_masthead', $post_id);
$rsm_page_place_title_in_masthead = get_field('rsm_page_place_page_title_in_masthead', $post_id);
$rsm_page_masthead_disable = get_field('rsm_page_disable_masthead', $post_id);

$rsm_global_use_masthead = get_field('rsm_global_use_masthead_for_all_pages', 'option');
$rsm_global_page_title_in_masthead = get_field('rsm_global_masthead_use_page_title', 'option');

$rsm_page_hide_title = get_field('rsm_page_hide_masthead_title', $post_id);
$rsm_page_custom_title = get_field('rsm_page_custom_title', $post_id);

//---
// Create switches to use global or custom page settings
//---
$use_global_masthead_settings = false;
$use_custom_masthead_settings = false;

if( $rsm_global_use_masthead == true ) {
	$use_global_masthead_settings = true;
}
if( $rsm_page_use_masthead == true ) {
	$use_custom_masthead_settings = true;
}
if( $rsm_global_use_masthead == true && $rsm_page_use_masthead != true) {
	$use_global_masthead_settings = true;
	$use_custom_masthead_settings = false;
}

//---
// Switches to determine if page title should be dipslayed in entry header
//--
$display_page_title = false;

if($rsm_page_masthead_disable) {
	$display_page_title = true;
}
elseif( $use_custom_masthead_settings && $rsm_page_place_title_in_masthead ) {
	$display_page_title = false;
}
elseif( $use_custom_masthead_settings && !$rsm_page_place_title_in_masthead) {
	//if custom settings are on and page title is NOT set to place in masthead
	$display_page_title = true;
}
elseif( $use_global_masthead_settings && $rsm_global_page_title_in_masthead ) {
	//if GLOBAL settings are on and page title is set to place in masthead
	$display_page_title = false; 
}
else {
	$display_page_title = true;
}



?>

<!-- if breadcrumbs are NOT placed in masthead... -->
<?php get_template_part('template-parts/breadcrumbs'); ?>

<header class="entry-header">
	
	<?php if(is_page_template('page-acf-fullwidth-builder.php')) {
		echo '<div class="container">';
	} ?>

		<?php if( $display_page_title ) {
			if( $rsm_page_hide_title ) {
				// hide title all together
				echo '<h1 class="sr-only entry-title">'.get_the_title($post_id).'</h1>';
			
			} else {
				//
				if($rsm_page_custom_title) {
					echo '<div class="h1 entry-title">'.$rsm_page_custom_title.'</div>';
					echo '<h1 class="sr-only">'.get_the_title($post_id).'</h1>';
				} else {
					echo '<h1 class="entry-title">'.get_the_title($post_id).'</h1>';
				}
			}
		} ?>

	<?php if(is_page_template('page-acf-fullwidth-builder.php')) {
		echo '</div>'; //.container
	} ?>
	

</header><!-- .entry-header -->



