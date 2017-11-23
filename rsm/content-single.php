<?php
/**
 * @package rsm_core_
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-full'); ?>>
	
	<header class="entry-header">
		
		<div class="entry-header__top">
			<div class="row">
				<div class="col-sm-12 entry-header__top__left"><?php rsm_core_post_cats('Posted In: '); ?></div>
				<div class="col-sm-12 entry-header__top__right"><?php rsm_core_post_date(); ?> | <?php rsm_core_post_author(); ?></div>
			</div>
		</div>

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-header__bottom">
			<?php get_template_part('template-parts/share-post'); ?>
		</div><!-- .entry-header__bottom -->

	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php if( has_post_thumbnail() ){
			echo the_post_thumbnail( 'medium', array( 'class' => 'feature-image img-responsive' ) );
		} ?>
		
		<?php the_content(); ?>
		
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php rsm_core_post_tags('In this article: '); ?>
		
		<?php rsm_author_vcard(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
