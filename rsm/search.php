<?php
/**
 * The template for displaying search results pages.
 *
 * @package rsm_core_
 */


global $primary_classes, $secondary_classes;

get_header(); ?>
	

	<div class="container">
		
		<div class="row">
			
			<div class="<?php _e($primary_classes); ?>">
				
				<div id="primary" class="content-area">
					
					<?php if($_GET['s'] == ''): ?>
			
						<!-- something here if search is empty... -->

					<?php elseif ( have_posts() ) : ?>
							
						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>

							<?php
							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
							get_template_part( 'content', 'search' );
							?>

						<?php endwhile; ?>

						<?php the_posts_navigation(); ?>

					<?php else : ?>
						
						
						<!--NO SEARCH RESULTS PAGE -->
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

	


