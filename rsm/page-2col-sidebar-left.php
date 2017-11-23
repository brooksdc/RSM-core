<?php
/**
 * Template Name: 2-col, Sidebar left
 */

global $primary_classes_rev, $secondary_classes_rev;


get_header(); ?>
	
	
	<div class="container">
		
		<div class="row">

			<div class="<?php _e($primary_classes_rev); ?>">

				<div id="primary" class="content-area">
					
					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part('content', 'page'); ?>

					<?php endwhile; // end of the loop. ?>

				</div><!-- #primary -->

			</div><!-- .col -->
			
			<div class="<?php _e($secondary_classes_rev); ?>">

				<?php get_sidebar(); ?>

			</div><!-- .col -->

		</div><!-- .row -->
	
	</div><!-- .container -->


<?php get_footer(); ?>
