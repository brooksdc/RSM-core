<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package rsm_core_
 */
?>

<section class="no-results not-found">
	
	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

		<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'quantus' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

	<?php elseif ( is_search() ) : ?>

		<p>Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>

	<?php else : ?>

		<p>It seems we can't find what you're looking for. Perhaps searching can help.</p>
		<?php get_search_form(); ?>

	<?php endif; ?>
	
</section><!-- .no-results -->
