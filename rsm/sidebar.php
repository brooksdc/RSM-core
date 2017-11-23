<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package rsm_core_
 */


?>

<div id="secondary" class="widget-area" role="complementary">
	
	<?php
	// determine sidebar to display

	if( is_home() || is_archive() ) {
		if( is_active_sidebar( 'blog-sidebar' ) ){
			dynamic_sidebar( 'blog-sidebar' );	
		}
	}
	elseif ( is_single() ) {
		dynamic_sidebar( 'blog-single-sidebar' );

		get_template_part('template-parts/aside-recent-posts');
	}
	elseif ( is_page() && is_active_sidebar( 'page-sidebar' ) ) {
		dynamic_sidebar( 'page-sidebar' );
	}
	?>


</div><!-- #secondary -->
