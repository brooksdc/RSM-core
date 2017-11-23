<?php
/**
 * The article template used for seidebars and other "aside" type content.
 *
 * @package rsm_core_
 */

?>
            

<article id="post-<?php the_ID(); ?>" <?php post_class('aside-post'); ?>>
	
	<a class="anchor" href="<?php the_permalink(); ?>">
		
		<?php if(has_post_thumbnail()){
			echo '<div class="aside-post__image-holder">';
				echo the_post_thumbnail('thumbnail', array( 'class' => 'aside-post__image img-responsive' ) );
			echo '</div>';
		} ?>

		<header class="aside-post__header">
			<?php rsm_core_post_date(); ?>
			<h3 class="aside-post__title"><?php the_title(); ?></h3>
			<span class="aside-post__link" href="<?php the_permalink(); ?>">Read More <i class="fa fa-angle-right"></i></span>
		</header>
	</a>

</article><!-- #post-## -->
