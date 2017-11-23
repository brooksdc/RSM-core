<?php
/**
 * @package rsm_core_
 */

?>
            

<article id="post-<?php the_ID(); ?>" <?php post_class('post-listing'); ?>>
	
	<header class="post-listing__entry-header">
		
		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="post-listing__entry-meta">
			
			<span class="post-listing__date"><?php rsm_core_post_date(); ?></span> | <span class="post-listing__author"><?php rsm_core_post_author(); ?></span> | <span class="post-listing__cats"><?php rsm_core_post_cats('Posted In: '); ?></span>
			
		</div><!-- .entry-meta -->
		<?php endif; ?>

		<?php 
		if(is_search()) { ?>
			<h2 class="post-listing__entry-title"><a href="<?php get_permalink(); ?>" rel="bookmark"><?php search_title_highlight();?></a></h2>
		
		<?php } else {
			the_title( sprintf( '<h2 class="post-listing__entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		}
		?>

	</header><!-- .entry-header -->

	<div class="post-listing__entry-content">
		
		<?php if(has_post_thumbnail()){
			echo '<a href="'.esc_attr( get_the_permalink() ).'" class="post-listing__image">';
				echo the_post_thumbnail('medium', array( 'class' => 'img-responsive' ) );
			echo '</a>';
		} ?>

		<?php if( is_search() ) {
			
			search_excerpt_highlight();
		
		} else {
			rsm_core_custom_excerpt(175);
			echo '<a href="'.esc_attr( get_the_permalink() ).'" class="btn btn-primary btn-small">Read full article</a>';

		} ?>

	</div><!-- .post-listing__entry-content -->

	
</article><!-- #post-## -->
