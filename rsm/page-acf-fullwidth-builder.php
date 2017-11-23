<?php
/**
 * Template Name: ACF Page Builder (Fullwidth)
 */

global $primary_classes, $secondary_classes;

get_header(); ?>
	
	<div id="primary" class="content-area">
		
		<?php while ( have_posts() ) : the_post(); ?>
			
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<div class="entry-content">
					
					<?php get_template_part('content', 'acf-builder-page'); ?>

				</div><!-- .entry-content -->

			</article><!-- #post-## -->

		<?php endwhile; // end of the loop. ?>

	</div><!-- #primary -->

<?php get_footer(); ?>
