<?php
/**
 * Awards / Recognition Shortcode Template.
 *
 * This template can be overriden by copying this file to your-theme/rsm-templates/
 *
 * @author 		RSM
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Don't allow direct access

//data
$rsm_recognition = get_field('rsm_recognition', 'option');
$rsm_recognition_greyscale = get_field('rsm_recognition_greyscale', 'option');
$rsm_recognition_colour_on_hover = get_field('rsm_recognition_colour_on_hover', 'option');

// setup classes
$recognition_classes = '';

if($rsm_recognition_greyscale) {
	$recognition_classes .= 'filter-greyscale ';
}
if($rsm_recognition_colour_on_hover) {
	$recognition_classes .= 'filter-greyscale--reveal ';
}

if( $rsm_recognition ):
	echo '<aside class="rsm-awards-recognition">';
	
		echo '<ul class="rsm-awards-recognition__list list--flex">';
		
			foreach($rsm_recognition as $item):
				$item_image_id = $item['image'];
				$image = wp_get_attachment_image($item_image_id, 'thumb-no-crop', false, array( 'class' => 'image' )); //should have a small image size (no crop). Set in init?
				$link = $item['link'];

				echo '<li class="'.$recognition_classes.'">';
					if( $link ){
						echo '<a href="'.$link.'" class="anchor" target="_blank">'.$image.'</a>';
					} else {
						echo '<span class="anchor">'.$image.'</span>';
					}
				echo '</li>';
			endforeach;
			
		echo '</ul>';
	
	echo '</aside>';

endif;