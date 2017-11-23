<?php

// header col class for this layout
/*if ( rsm_header_col_count() == 1 ) {
	$header_col_class = 'col-sm-24';
}
elseif ( rsm_header_col_count() == 2 ) {
	$header_col_class = 'col-sm-12';
}
else {
	$header_col_class = null;
}*/

$header_container = get_field('rsm_header_container_setting', 'option');
if($header_container == 'fluid') {
	$header_container_class = 'container-fluid';
} else {
	$header_container_class = 'container';
}
?>

<header role="banner" class="site-header header-layout-1" id="masthead">
	
	<?php /* Widgetized Top Bar */ ?>
	<?php if( is_active_sidebar( 'header-dropin-1' ) || is_active_sidebar( 'header-dropin-2' ) ) :?>
		<div class="site-header__top">
			<div class="<?php _e($header_container_class); ?>">
				
				<div class="display-table">
					<?php if( is_active_sidebar( 'header-dropin-1' ) ): ?>
						<div class="display-table-cell site-header__utility-col header-dropin-1">
							<?php dynamic_sidebar( 'header-dropin-1' ); ?>
						</div>
					<?php endif; ?>

					<?php if( is_active_sidebar( 'header-dropin-2' ) ): ?>
						<div class="display-table-cell site-header__utility-col header-dropin-2">
							<?php dynamic_sidebar( 'header-dropin-2' ); ?>
						</div>
					<?php endif; ?>
				</div><!-- .display-table -->
				
			</div><!-- .container -->
		</div><!-- .site-header__top -->
	<?php endif; ?>
	
	<div class="site-header__main site-header__sticky-block">
		<div class="<?php _e($header_container_class); ?>">
			
			<div class="display-table">
				<div class="site-header__branding">
					<?php echo do_shortcode('[rsm_header_logo]'); ?>
				</div><!-- .site-header__branding -->
				
				<nav class="site-header__navigation" role="navigation" >
					
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'menu', 'container' => false, 'fallback_cb' => false ) ); ?>

					
					<div class="screen-reader-text skip-link"><a title="Skip to content" href="#content">Skip to content</a></div>

				</nav><!-- #site-navigation -->
			</div><!-- .display-table -->
			
			<?php /* Buttons for mobile menu panels */ ?>
			<button href="#" data-activates="primary-menu-slide-out" class="menu-collapse btn-flat btn--menu"><span class="bar"></span><span class="bar"></span><span class="bar"></span></button>

			<button href="#" data-activates="utility-slide-out" class="utility-collapse btn-flat btn--utility"><span class="dot"></span><span class="dot"></span><span class="dot"></span></button>
		
		</div><!--.container-->
	</div><!-- .site-header__main -->

</header><!--.site-header-->


<?php
// Enqueue the script initializaton to load in footer.
if(!function_exists('initialize_header_1_sticky_function')):
function initialize_header_1_sticky_function() { ?>

	<script type="text/javascript">
		window.addEventListener('DOMContentLoaded', function() {
	        (function($) {
			    $(document).ready(function($){
			    	
			    	

			    	/**
				     * Sticky header with WAYPOINTS option
				     * Use this if you want the header to be "picked up" at a certain point on the page. 
				       
				       TARGET: The element you want the browser to watch for. An offset of 0 means when the traget hits the top of the viewport
					   
					   STICKYEL: The selector that you're adding the class to or manipulating when the TARGET IS HIT. Make sure to add the appropriate CSS.
					  */
				    
					  //var siteHeaderTopBarHeight = $('.site-header__top').height();
				      var target = $('.site-header__main');
				      var stickyEl = $('.site-header__main');

				      // Sticky header on scroll
				      $(target).waypoint(function(direction) {
				        if (direction === 'down') {
				          $(stickyEl).addClass('sticky');
				        } else {
				          $(stickyEl).removeClass('sticky');
				        }
				      }, {
				        offset: 0 //offset from top of viewport. Pixels.
				      });

				      // Additional events can happen at a different offset
				      $(target).waypoint(function(direction) {
				        if (direction === 'down') {
				          $(stickyEl).addClass('is-scrolling');
				        } else {
				          $(stickyEl).removeClass('is-scrolling');
				          //$(stickyEl).addClass('transition-out');
				          //setTimeout(function(){
				            //$(stickyEl).removeClass('is-scrolling transition-out');
				          //}, 150);
				        }
				      }, {
				        offset: '-250' //pixels 
				      });
					 
				    
				});
			})(jQuery);
		});
	</script>
	<?php
}
endif;
add_action('wp_footer', 'initialize_header_1_sticky_function', 20);
