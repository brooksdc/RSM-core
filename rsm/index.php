<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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

						<?php //the_posts_navigation(); ?>
						
						<?php
						/**
						 * Requires WP PageNavi plugin
						 */
						wp_pagenavi(); ?>

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

	

