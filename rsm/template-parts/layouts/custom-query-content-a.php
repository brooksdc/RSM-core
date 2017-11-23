<?php
/**
 * Custom query content - A
 */

if( has_post_thumbnail() ) {
	$image = get_the_post_thumbnail_url($post->ID, 'medium');
} else {
	$image = null;
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('content-query-listing'); ?>>
	
	<a class="anchor" href="<?php echo esc_attr( get_the_permalink() ); ?>">
		
		<div class="content-query-listing__image" style="background-image: url(<?php echo esc_attr($image); ?>);"></div>
		
		<div class="content-query-listing__text">
			<h4 class="content-query-listing__entry-title"><?php echo get_the_title(); ?></h4>
			<div class="content-query-listing__meta">
				<?php rsm_core_post_date(); ?>
			</div>
		</div>

	</a>
	
</article><!-- #post-## -->
