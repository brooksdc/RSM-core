<?php
/*
 * use this snippet if you want to have a masthead image created from the featured image of the page, or fallback to placeholder.
 */

	global $post;
	//determine if masthead should use placeholder or feature image
	if(has_post_thumbnail()) {
		$feature_img_id = get_post_thumbnail_id();
		$feature_img_src = wp_get_attachment_image_src( $feature_img_id, 'masthead');
		$feature_img = $feature_img_src[0];
	} else {
		$feature_img = get_bloginfo('template_directory').'/images/masthead-placeholder.jpg';
	}
	?>
	<div class="entry-masthead" style="background-image: url('<?php _e($feature_img); ?>');"></div>