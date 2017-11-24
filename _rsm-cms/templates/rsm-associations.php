<?php
/**
 * Associations / Accreditations Shortcode Template.
 *
 * This template can be overriden by copying this file to your-theme/rsm-templates/
 *
 * @author 		RSM
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Don't allow direct access

//data
$rsm_associations = get_field('rsm_associations', 'option');
$rsm_associations_greyscale = get_field('rsm_associations_images_greyscale', 'option');
$rsm_associations_colour_on_hover = get_field('rsm_associations_colour_on_hover', 'option');

// setup classes
$association_classes = '';

if($rsm_associations_greyscale) {
	$association_classes .= 'filter-greyscale ';
}
if($rsm_associations_colour_on_hover) {
	$association_classes .= 'filter-greyscale--reveal ';
}

//spill($rsm_associations);

if( $rsm_associations ):
	echo '<aside class="rsm-associations">';
	
		echo '<ul class="rsm-associations__list list--flex">';
		
			foreach($rsm_associations as $item):
				$item_image_id = $item['association_logo'];
				$image = wp_get_attachment_image($item_image_id, 'thumb-no-crop', false, array( 'class' => 'image' )); //should have a small image size (no crop). Set in init?
				$link = $item['association_url'];

				echo '<li class="'.$association_classes.'">';
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