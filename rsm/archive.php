<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package rsm_core_
 */


global $primary_classes, $secondary_classes;

get_header(); ?>
	

	<div class="container">
		
		<div class="row">
			
			<div class="<?php _e($primary_classes); ?>">
				
				<div id="primary" class="content-area">
					
					<?php if ( have_posts() ) : ?>

						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>
							
							<?php get_template_part( 'content', get_post_format() ); ?>

						<?php endwhile; ?>

						<?php the_posts_navigation(); ?>

					<?php else : ?>

						<?php get_template_part( 'content', 'none' ); ?>

					<?php endif; ?>

				</div><!-- #primary -->

			</div><!-- .col -->
			
			<div class="<?php _e($secondary_classes); ?>">
				
				<?php get_sidebar(); ?>

			</div><!-- .col -->

		</div><!-- .row -->
	
	</div><!-- .container -->
	
<?php get_footer(); ?>

	


