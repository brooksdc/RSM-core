<?php
/**
 * The template for displaying individual TEAM MEMBER pages.
 *
 *
 * @package rsm_core_
 */
global $primary_classes_rev, $secondary_classes_rev;

get_header(); ?>
	
	
	<div class="container">

		<div id="primary" class="content-area <?php echo esc_attr( $primary_classes_rev );?>">
			
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part('content', 'single-rsm-team-member'); ?>

			<?php endwhile; // end of the loop. ?>

			
		</div><!-- #primary -->

		<div id="secondary" class="<?php echo esc_attr( $secondary_classes_rev );?>">
			<?php

			if(has_post_thumbnail()){
				echo '<figure class="wp-caption featured-image">';
					echo the_post_thumbnail('thumbnail', array( 'class' => '' ));
					$post_thumbnail_id = get_post_thumbnail_id();

					$feat_img_meta = wp_get_attachment($post_thumbnail_id);
					if($feat_img_meta) {
						echo '<figcaption class="wp-caption-text">'.$feat_img_meta['caption'].'</figcaption>';
					}
				echo '</figure>';
			} ?>
		</div><!-- #secondary -->

	</div><!-- .container -->


<?php get_footer(); ?>
