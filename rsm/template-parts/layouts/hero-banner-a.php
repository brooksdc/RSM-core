<?php
/**
 * Hero banner A - Owl Carousel with static Message
 */

$rsm_hero_images = get_field('rsm_hero_banner_a_images'); 
$rsm_hero_include_message = get_field('rsm_hero_banner_include_message'); 
$rsm_hero_message = get_field('rsm_hero_message'); 
$rsm_hero_banner_boxed_layout = get_field('rsm_hero_banner_boxed_layout');

if($rsm_hero_banner_boxed_layout) {
	$rsm_hero_width_class = 'use-boxed-layout';
} else {
	$rsm_hero_width_class = null;
}
//spill($rsm_hero_images);

if($rsm_hero_images):
	echo '<section id="top" class="rsm-hero rsm-hero-banner-a no-fouc '.$rsm_hero_width_class.'">';

		if( $rsm_hero_include_message ) {
			echo '<div class="rsm-hero__message-holder" style="display: none;"><div class="container">';
				echo '<div class="rsm-hero__message">';

					if($rsm_hero_message['title_prefix']) {
						echo '<p class="rsm-hero__title-prefix">'.$rsm_hero_message['title_prefix'].'</p>';
					}
					if($rsm_hero_message['title']) {
						echo '<p class="rsm-hero__title h1">'.$rsm_hero_message['title'].'</p>';
					}
					if($rsm_hero_message['subtitle']) {
						echo '<p class="rsm-hero__subtitle">'.$rsm_hero_message['subtitle'].'</p>';
					}
					
					if($rsm_hero_message['button']['url'] != null && $rsm_hero_message['button']['label']) {

						$button_classes = '';
						if($rsm_hero_message['button']['base_style']){
							$button_classes .= $rsm_hero_message['button']['base_style'].' ';
						}
						if($rsm_hero_message['button']['modifier_style'] != 'none'){
							$button_classes .= $rsm_hero_message['button']['modifier_style'].' ';
						}
						if($rsm_hero_message['button']['size'] != 'default'){
							$button_classes .= $rsm_hero_message['button']['size'];
						}

						echo '<div class="rsm-hero__button-holder">';
							echo '<a class="btn '.$button_classes.'" href="'.$rsm_hero_message['button']['url']['url'].'">'.$rsm_hero_message['button']['label'];
								if($rsm_hero_message['button']['modifier_style'] == 'btn-hover-icon' && $rsm_hero_message['button']['hover_icon_html']) {
									echo '<span class="icon">'.$rsm_hero_message['button']['hover_icon_html'].'</span>';
								}
							echo '</a>';
						echo '</div>';
					}

				echo '</div>';
			echo '</div></div>'; //.container, .message-holder
		}

		echo '<div class="owl-carousel">';

			foreach($rsm_hero_images as $slide) {
				//echo '<div class="slide" style="background-image: url('.$slide['sizes']['hero'].');"></div>';
				echo '<div class="slide owl-lazy" data-src="'.$slide['sizes']['fullscreen'].'"></div>';
				
			}

		echo '</div>'; //.owl-carousel

	echo '</section>';

	// Enqueue the script initializaton to load in footer.
	if(!function_exists('initialize_hero_banner_carousel')):
	function initialize_hero_banner_carousel() { ?>

		<script type="text/javascript">
			window.addEventListener('DOMContentLoaded', function() {
		        (function($) {
				    $(document).ready(function($){
				    	//---
					    // initialize Owl carousel
					    //---
						var hero_owl = $('.rsm-hero .owl-carousel');

					    hero_owl.owlCarousel({
							items: 1,
							loop: true,
							autoplay: true,
							lazyLoad: true,
							autoplayTimeout: 5000,
							nav: true,
							navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
							dots: false,
							animateOut: 'fadeOut',
							animateIn: 'fadeIn',
							onInitialize : function(element){ 
								/*//randomize owl items function
								hero_owl.children().sort(function(){
									return Math.round(Math.random()) - 0.5;
								}).each(function(){
									$(this).appendTo(hero_owl);
								});*/
								$('.rsm-hero__message-holder').fadeIn(1000);
							},
					    });
					});
				})(jQuery);
			});
		</script>
		<?php
	}
	endif;
	add_action('wp_footer', 'initialize_hero_banner_carousel', 20);

else:
	//if no slides, show the regular masthead.
	get_template_part('parts/masthead');

endif;