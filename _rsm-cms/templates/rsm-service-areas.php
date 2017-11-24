<?php
/**
 * Service Areas Shortcode Template.
 *
 * This template can be overriden by copying this file to your-theme/rsm-templates/
 *
 * @author 		RSM
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Don't allow direct access

//data
$rsm_service_areas = get_field('rsm_service_areas', 'option');
$rsm_service_areas_text_above = get_field('rsm_service_areas_text_above', 'option');
$rsm_service_areas_text_below = get_field('rsm_service_areas_text_below', 'option');


if( $rsm_service_areas || $rsm_service_areas_text_above || $rsm_service_areas_text_below):
	echo '<aside class="rsm-service-areas">';
	
		if($rsm_service_areas_text_above) {
			echo '<div class="rsm-service-areas__top">'.$rsm_service_areas_text_above.'</div>';
		}

		if( $rsm_service_areas ) :
			echo '<ul class="rsm-service-areas__list list--map-markers">';
			
				foreach($rsm_service_areas as $area):
					$area_name = $area['area_name'];
					$link = $area['link'];

					echo '<li>';
						if( $link ){
							echo '<a href="'.$link.'" class="anchor">'.$area_name.'</a>';
						} else {
							echo '<span class="anchor">'.$area_name.'</span>';
						}
					echo '</li>';
				endforeach;
				
			echo '</ul>';
		endif;

		if($rsm_service_areas_text_below) {
			echo '<div class="rsm-service-areas__bottom">'.$rsm_service_areas_text_below.'</div>';
		}
	
	echo '</aside>';

endif;