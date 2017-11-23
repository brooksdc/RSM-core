<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package rsm_core_
 */

//determine if featured image is already being used by the masthead element
$rsm_page_masthead_image = get_field('rsm_page_masthead_image', $post->ID);
$rsm_page_masthead_disable = get_field('rsm_page_disable_masthead', $post->ID);
$rsm_page_no_masthead_image = get_field('rsm_page_no_masthead_image', $post->ID);

//if masthead is disabled, show feat img
//if masthead "no image" is set, show feat img
//if masthead custom image set, show feat img
//otherwise, masthead uses featured image, don't show here.
if($rsm_page_masthead_image || $rsm_page_masthead_disable || $rsm_page_no_masthead_image) {
	$display_feat_img = true;
} else {
	$display_feat_img = false;
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php get_template_part('template-parts/entry-header');	?>

	<div class="entry-content">
		
		<?php
		/**
		 * @todo Will this still create a meta tag for social even if it's not included here?
		 * It should, but test that out. There should be a true/false option to set this per page, Default being on.
		 */
		if($display_feat_img):
			if(has_post_thumbnail()){
				echo '<figure class="wp-caption featured-image">';
					echo the_post_thumbnail('medium', array( 'class' => '' ));
					$post_thumbnail_id = get_post_thumbnail_id();

					$feat_img_meta = wp_get_attachment($post_thumbnail_id);
					if($feat_img_meta) {
						echo '<figcaption class="wp-caption-text">'.$feat_img_meta['caption'].'</figcaption>';
					}
				echo '</figure>';
			}
		endif;
		?>

		<?php the_content(); ?>
		
		

	</div><!-- .entry-content -->

</article><!-- #post-## -->
