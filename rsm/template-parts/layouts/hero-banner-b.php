<?php
/**
 * Hero banner B - Parallax image with Message
 */

// 20171107. These are setup with the hero slides banner currently.
$rsm_hero_parallax_image = get_field('rsm_hero_banner_parallax_image'); 
$rsm_hero_include_message = get_field('rsm_hero_banner_include_message'); 
$rsm_hero_message = get_field('rsm_hero_message'); 

//spill($rsm_hero_parallax_image);

if($rsm_hero_parallax_image):
	echo '<section id="top" class="rsm-hero rsm-hero-banner-b rsm-hero--parallax">';
		
		echo '<div class="rsm-hero-banner-b__inner">';

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
							foreach($rsm_hero_message['button']['modifier_style'] as $class) {
								$button_classes .= $class.' ';
							}
							
						}
						if($rsm_hero_message['button']['size'] != 'default'){
							$button_classes .= $rsm_hero_message['button']['size'];
						}


						echo '<div class="rsm-hero__button-holder">';
							echo '<a class="rsm-hero__button btn '.$button_classes.'" href="'.$rsm_hero_message['button']['url']['url'].'">'.$rsm_hero_message['button']['label'];
								if(in_array('btn-hover-icon', $rsm_hero_message['button']['modifier_style']) && $rsm_hero_message['button']['hover_icon_html']) {
									echo '<span class="icon">'.$rsm_hero_message['button']['hover_icon_html'].'</span>';
								}
							echo '</a>';
						echo '</div>';
					}

				echo '</div>';
			echo '</div></div>'; //.container, .message-holder
		}

		echo '<div class="rsm-hero__image-holder no-fouc">';

			echo '<div class="rsm-hero__image rellax" data-rellax-speed="-2" data-rellax-percentage="0.5" style="background-image: url('.$rsm_hero_parallax_image['sizes']['fullscreen'].');"></div>';
		
		echo '</div>'; //.rsm-hero__image-holder

		echo '</div>'; //.rsm-hero-banner-b__inner

	echo '</section>';

	// Enqueue the script initializaton to load in footer.
	if(!function_exists('initialize_hero_banner_b_script')):
	function initialize_hero_banner_b_script() { ?>

		<script type="text/javascript">
			window.addEventListener('DOMContentLoaded', function() {
		        (function($) {
				    $(document).ready(function($){
				    	
				    	//create new rellax object
				    	/*var rellax = new Rellax('.rsm-hero__image-rellax', {
							speed: -2,
							center: false,
							round: true,
							percentage: 0.5,
						});*/

				    	$('.rsm-hero__message-holder').fadeIn(1000);
					}); //document.ready
				})(jQuery);
			});
		</script>
		<?php
	}
	endif;
	add_action('wp_footer', 'initialize_hero_banner_b_script', 20);

else:
	//if no slides, show the regular masthead.
	get_template_part('parts/masthead');

endif;