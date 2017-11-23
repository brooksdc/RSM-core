<?php
/**
 * The template for displaying all pages.
 *
 * The template name label for this can be changed using the rsm_change_default_template_name() function
 * in /inc/extras.php
 *
 * @package rsm_core_
 */


get_header(); ?>
	
	
	<div class="container">
		
		<div id="primary" class="content-area">
			
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part('content', 'page'); ?>

			<?php endwhile; // end of the loop. ?>

			
		</div><!-- #primary -->
	
	</div><!-- .container -->


<?php get_footer(); ?>
