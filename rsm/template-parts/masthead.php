<?php
/**
 * Dynamic masthead.
 *
 * Controlled by global settings set in options panel. Can be overridden by settings in each page's masthead settings panel.
 */
global $post;

//---
// Determine post ID to use.
// Using $post_id as a vairable so specific IDs can be used conditionally, if required. (For example, if is blog page, etc.)
//---
$post_id = $post->ID;


//---
// local page settings
//---
$rsm_page_use_masthead = get_field('rsm_page_use_fullwidth_masthead', $post_id);
//$rsm_page_use_page_title = get_field('rsm_page_use_default_page_title', $post_id);
$rsm_page_place_title_in_masthead = get_field('rsm_page_place_page_title_in_masthead', $post_id);
$rsm_page_custom_title = get_field('rsm_page_custom_title', $post_id);

$rsm_page_masthead_custom_title = get_field('rsm_page_custom_masthead_title', $post_id);
$rsm_page_masthead_surtitle = get_field('rsm_page_masthead_surtitle', $post_id);
$rsm_page_masthead_subtitle = get_field('rsm_page_masthead_subtitle', $post_id);

//$rsm_page_use_h1_tag = get_field('rsm_page_h1_tag_masthead_title', $post_id);
$rsm_page_hide_title = get_field('rsm_page_hide_page_title', $post_id);

$rsm_page_override_global_align = get_field('rsm_page_override_global_title_align', $post_id);
$rsm_page_title_alignment = get_field('rsm_page_masthead_title_alignment', $post_id);

$rsm_page_masthead_image = get_field('rsm_page_masthead_image', $post_id);
$rsm_page_masthead_disable = get_field('rsm_page_disable_masthead', $post_id);
$rsm_page_no_masthead_image = get_field('rsm_page_no_masthead_image', $post_id);
$rsm_page_custom_masthead_overlay = get_field('rsm_page_custom_masthead_overlay', $post_id);
$rsm_page_custom_masthead_overlay_settings = get_field('rsm_page_custom_masthead_overlay_settings', $post_id);

//---
// global settings (options panel)
//---
$rsm_global_use_masthead = get_field('rsm_global_use_masthead_for_all_pages', 'option');
$rsm_global_page_title_in_masthead = get_field('rsm_global_masthead_use_page_title', 'option');
$rsm_global_breadcrumbs_in_masthead = get_field('rsm_global_masthead_use_breadcrumbs', 'option');

$rsm_global_title_alignment = get_field('rsm_global_masthead_title_alignment', 'option');
$rsm_global_masthead_parallax = get_field('rsm_global_masthead_use_parallax_effect', 'option');
$rsm_global_boxed_layout = get_field('rsm_global_masthead_use_boxed_layout', 'option'); 


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
// Create switches to determine if masthead should be displayed
//---
$display_masthead = false;

if( $use_global_masthead_settings || $use_custom_masthead_settings ) {
	$display_masthead = true;
}
if( $rsm_page_masthead_disable == true ) {
	$display_masthead = false;
}

//--- 
// Determine Page title placement
//---
if ($use_custom_masthead_settings && $rsm_page_place_title_in_masthead) {
	//if custom settings are on and page title is set to place in masthead
	$place_page_title_in_masthead = true;
}
elseif ($use_custom_masthead_settings && !$rsm_page_place_title_in_masthead) {
	//if custom settings are on and page title is NOT set to place in masthead
	$place_page_title_in_masthead = false;
}
elseif( $use_global_masthead_settings && $rsm_global_page_title_in_masthead ) {
	//if GLOBAL settings are on and page title is set to place in masthead, 
	$place_page_title_in_masthead = true; 
}
else {
	$place_page_title_in_masthead = false; 
}

//---
// Determine HTML tag
//---

if( $place_page_title_in_masthead ) {
	$masthead_title_tag = 'h1';
} else {
	$masthead_title_tag = 'div';
}

//---
// Determine image
//---
// GLobal -- use featured image? if set to no, NO image is used, unless set in the page's settings.
if($rsm_page_no_masthead_image == true) {
	$feature_img = null;
}
elseif($rsm_page_masthead_image) {
	// custom masthead image
	$feature_img = $rsm_page_masthead_image;

} elseif(has_post_thumbnail($post_id)) {
	// feature image fallback
	$feature_img_id = get_post_thumbnail_id($post_id);
	$feature_img_src = wp_get_attachment_image_src( $feature_img_id, 'fullscreen'); //masthead
	$feature_img = $feature_img_src[0];
} else {
	// no image. check if global masthead image set?
	$feature_img = null; //get_bloginfo('template_directory').'/images/masthead-placeholder.jpg';
}

//---
// Determine any parent level classes
//---
$masthead_modifier_class = '';
if($rsm_page_no_masthead_image == true || !$rsm_page_masthead_image || !has_post_thumbnail($post_id) ) {
	$masthead_modifier_class .= 'no-masthead-image ';
}


//---
// Determine alignment
//---
if($use_custom_masthead_settings && $rsm_page_override_global_align == true && $rsm_page_title_alignment) {
	
	// custom page setting
	$content_alignment_classes = $rsm_page_title_alignment['vertical_align'].' '.$rsm_page_title_alignment['horizontal_align'];
}
elseif($use_global_masthead_settings && $rsm_global_title_alignment) {
	
	// global alignment setting
	$content_alignment_classes = $rsm_global_title_alignment['vertical_align'].' '.$rsm_global_title_alignment['horizontal_align'];

} else {
	// default fallback alignment class settings
	$content_alignment_classes = 'v-middle text-left';
}


//--- 
// Determine Effect
//---
$use_parallax = false;

if($rsm_global_masthead_parallax) {
	$use_parallax = true;
} else {
	$use_parallax = false;
}

//---
// Overlay settings
//---
if($rsm_page_custom_masthead_overlay['opacity']) {
	$calculate_masthead_opacity_decimal = ($rsm_page_custom_masthead_overlay['opacity'] / 100);
} else {
	$calculate_masthead_opacity_decimal = 0;
}
if($rsm_page_custom_masthead_overlay['colour']) {
	$custom_masthead_overlay_color = $rsm_page_custom_masthead_overlay['colour'];
} else {
	$custom_masthead_overlay_color = '#000';
}

/**
 * @todo Setup different style options: full-height, standard height
 */
?>

<?php if( $display_masthead ): ?>
	
	<?php if($rsm_page_custom_masthead_overlay): ?>
	<style type="text/css"> .entry-masthead:before{ background: <?php echo($custom_masthead_overlay_color); ?>; -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=<?php echo($rsm_page_custom_masthead_overlay['opacity']); ?>)"; filter: alpha(opacity=<?php echo($rsm_page_custom_masthead_overlay['opacity']); ?>); opacity: <?php echo($calculate_masthead_opacity_decimal); ?>; } </style>
	<?php endif; ?>

	<?php if($use_parallax) { ?>
		<div class="entry-masthead entry-masthead--parallax no-fouc <?php echo esc_attr($masthead_modifier_class); ?>">
	<?php } else { ?>
		<div class="entry-masthead no-fouc <?php echo esc_attr($masthead_modifier_class); ?>" style="background-image: url('<?php _e($feature_img); ?>');">
	<?php } ?>

	
		<div class="container">

			<div class="entry-masthead__inner v-align">
			
				<div class="entry-masthead__content <?php _e($content_alignment_classes); ?>">
					
					<?php
					/**
					 * Surtitle
					 */
					if($use_custom_masthead_settings && $rsm_page_masthead_surtitle) {
						echo '<div class="entry-masthead__surtitle">'.$rsm_page_masthead_surtitle.'</div>';
					} ?>

					<?php
					/**
					 * Title structure
					 */
					if($rsm_page_hide_title == false) {
						
						echo '<'.$masthead_title_tag.' class="h1 entry-masthead__title">';
							
							// determine which title text to use
							if($place_page_title_in_masthead) {
								if( !empty($rsm_page_custom_title) ) {
									echo $rsm_page_custom_title;
								} else {
									echo esc_html( get_the_title($post_id) );
								}
							} else {
								// use custom title, if exists. 
								if(!empty($rsm_page_masthead_custom_title)) {
									echo $rsm_page_masthead_custom_title;
								} /* else {
									//Fallback to default title if no custom title
									echo '<span class="fallback">'.esc_html( get_the_title($post_id) ).'</span>';
								} */
							}

						echo '</'.$masthead_title_tag.'>';
						
					} else {
						
						// hide the masthead title
						echo '<'.$masthead_title_tag.' class="entry-masthead__title sr-only">'.esc_html( get_the_title($post_id) ).'</'.$masthead_title_tag.'>';
					
					} ?>

					<?php
					/**
					 * Subtitle
					 */
					if($use_custom_masthead_settings && $rsm_page_masthead_subtitle) {
						echo '<div class="entry-masthead__subtitle">'.$rsm_page_masthead_subtitle.'</div>';
					} ?>

					<?php
					/*
					 If breadcrumbs...
					 */

					 //$rsm_global_breadcrumbs_in_masthead
					 ?>

				</div><!-- .entry-masthead__content -->

			</div><!-- .entry-masthead__inner -->
		
		</div><!-- .container -->

		<?php if($use_parallax) { ?> 
		<div class="entry-masthead__parallax-holder no-fouc">
			<div class="entry-masthead__parallax-image rellax" data-rellax-speed="-2" data-rellax-percentage="0.5" style="background-image: url('<?php _e($feature_img); ?>');"></div>
		</div> 
		<?php } ?>

	<?php if($use_parallax) { ?>
		</div><!-- .entry-masthead--parallax -->
	<?php } else { ?>
		</div><!-- .entry-masthead -->
	<?php } ?>

<?php endif; //$display_masthead ?>

<?php
/* If NO masthead is set, provide this element so we can still compensate for absolute header spacing in the CSS*/
if(!$display_masthead): ?>
	<div class="entry-masthead-placeholder"></div>
<?php endif; ?>