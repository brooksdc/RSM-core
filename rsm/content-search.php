<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package rsm_core_
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('search-result'); ?>>
	<header class="entry-header">
		<h2 class="entry-title"><a href="<?php get_permalink(); ?>" rel="bookmark"><?php search_title_highlight();?></a></h2>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php rsm_core_post_date(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php search_excerpt_highlight(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php rsm_core_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
