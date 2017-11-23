<?php
/**
 * RSM - Mosaic Gallery
 */

global $post;

// check if data is being passed in from content-acf-builder-page.php
if(!empty($page_builder_mosaic)){

	$rsm_mosaic_images = $page_builder_mosaic;
	$mosaic_section_settings = get_sub_field('section_settings');
	$mosaic_section_header = get_sub_field('section_header');
	$include_section_markup = true;

} else {

	$rsm_mosaic_images = get_field('rsm_mosaic_images');
	$mosaic_section_settings = false;
	$mosaic_section_header = false;
	$include_section_markup = false;

}

if($rsm_mosaic_images):

	// open section markup
	if($include_section_markup) {
		echo '<section id="'.$mosaic_section_settings['id'].'" class="section section--mosaic-gallery '.$mosaic_section_settings['class'].'">';

	        if($mosaic_section_header) {
	            echo '<div class="section__header '.$mosaic_section_header['alignment'].'"><div class="container">';
	                
	                if($mosaic_section_header['title_prefix']) {
	                    echo '<p class="section__title-prefix">'.$mosaic_section_header['title_prefix'].'</p>';
	                }
	                if($mosaic_section_header['title']) {
	                    echo '<'.$mosaic_section_header['title_structure']['tag'].' class="section__title '.$mosaic_section_header['title_structure']['class'].'">'.$mosaic_section_header['title'].'</'.$mosaic_section_header['title_structure']['tag'].'>';
	                }
	                if($mosaic_section_header['sub_title']) {
	                    echo '<p class="section__subtitle">'.$mosaic_section_header['sub_title'].'</p>';
	                }

	            echo '</div></div>'; // .container, .section__header
	        }

			echo '<div class="section__content"><div class="container">';
	}


			// standard gallery content
			// masonry : target the holder
			// waypoints : target the anchor/image

			echo '<div class="rsm-mosaic-gallery masonry gallery">';
				echo '<div class="rsm-mosaic-gallery__gridSizer"></div>';

				$i = 1;
				foreach($rsm_mosaic_images as $img) {
					
					//set up some classes to create unique layouts
					if( ($i == 1) || ($i == 4)  ) {
						$mosaic_item_class = 'mosaic-item--large';
					}
					elseif( ($i == 2) ) {
						$mosaic_item_class = 'mosaic-item--medium';
					}
					elseif( ($i == 3) || ($i == 5) ) {
						$mosaic_item_class = 'mosaic-item--small';
					}
					else {
						$mosaic_item_class = 'mosaic-item--undefined';
					}

					// order stacks in row format, so 1-2-3-4-5, but the masonry will make use of empty space, which is way element 5 is directly below element 3.

					echo '<div class="rsm-mosaic-gallery__item gallery-item '.$mosaic_item_class.'">';
						echo '<a class="anchor fadeIn-element" href="'.$img['sizes']['large'].'" title="'.$img['caption'].'" style="background-image: url('.$img['sizes']['medium'].');">';
						//lazyload version (not fading in)
						//echo '<a class="anchor lazy " href="'.$img['sizes']['large'].'" title="'.$img['caption'].'" data-src="'.$img['sizes']['medium'].'">';
							echo '<span class="sr-only">'.$img['alt'].'</span>';
						echo '</a>';
					echo '</div>';
					$i++;
				}

			echo '</div>'; //rsm-mosaic-gallery
			
			

	// close section markup
	if($include_section_markup){

			echo '</div></div>'; //.section__content, .container
		echo '</section>';
	}

endif;