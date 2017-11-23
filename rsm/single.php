<?php
/**
 * The template for displaying all single posts.
 *
 * @package rsm_core_
 */
global $primary_classes;

function single_post_scripts() {
	wp_enqueue_style( 'js-socials-css', get_template_directory_uri() . '/assets/js/plugins/jssocials/jssocials.css' );
	wp_enqueue_style( 'js-socials-css-flat', get_template_directory_uri() . '/assets/js/plugins/jssocials/jssocials-theme-flat.css' );
	wp_enqueue_script( 'js-socials-js',  get_template_directory_uri() . '/assets/js/plugins/jssocials/jssocials.min.js', array('jquery'), '', true );
}
add_action( 'wp_enqueue_scripts', 'single_post_scripts', 20 );

get_header(); ?>
	
	<div class="single__main-content">

		<div class="container">

			<div class="row">
				
				<div class="<?php _e($primary_classes); ?>">
					
					<div id="primary" class="content-area">
						
						<?php while ( have_posts() ) : the_post(); ?>

							<?php get_template_part( 'content', 'single' ); ?>

							<?php the_post_navigation_custom(); ?>

							<?php /*
								// If comments are open or we have at least one comment, load up the comment template
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif; 
							*/?>

						<?php endwhile; // end of the loop. ?>

					</div><!-- #primary -->

				</div><!-- .col -->
				
				<div class="<?php _e($secondary_classes); ?>">
					
					<?php get_sidebar(); ?>

				</div><!-- .col -->

			</div><!-- .row -->
		
		</div><!-- .container -->

	</div><!-- .single__main-content -->

	<div class="single__below-content">

		<div class="container">
			<?php get_template_part('template-parts/aside-related-posts'); ?>
		</div>

	</div><!-- .single__below-content -->

<?php get_footer(); ?>

	
