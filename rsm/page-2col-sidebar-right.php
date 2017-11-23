<?php
/**
 * Template Name: 2-col, Sidebar right
 */

global $primary_classes, $secondary_classes;

get_header(); ?>
	
	
	<div class="container">
		
		<div class="row">
			
			<div class="<?php _e($primary_classes); ?>">
				
				<div id="primary" class="content-area">
					
					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part('content', 'page'); ?>

					<?php endwhile; // end of the loop. ?>

				</div><!-- #primary -->

			</div><!-- .col -->
			
			<div class="<?php _e($secondary_classes); ?>">
				
				<?php get_sidebar(); ?>

			</div><!-- .col -->

		</div><!-- .row -->
	
	</div><!-- .container -->


<?php get_footer(); ?>
