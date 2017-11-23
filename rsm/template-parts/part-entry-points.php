<?php
/**
 RSM - Entry Points
 */

$entry_points_section_settings = get_sub_field('section_settings');
$entry_points_section_header = get_sub_field('section_header');
//$entry_points_content = get_sub_field('entry_points'); //RETIRED
$entry_points_content = get_sub_field('entry_points_obj'); // NEW post object version.
$entry_points_layout_style = get_sub_field('select_layout_style');

//spill($entry_points_section_settings);
//spill($entry_points_section_header);

//---
// Background CSS setup
//---
if($entry_points_section_settings['background_style'] != 'none') { ?>

	<style type="text/css">

	<?php	
	if($entry_points_section_settings['background_color']) { 
		echo '.section--entry-points .section__background-holder { background-color: '.$entry_points_section_settings['background_color'].'; }';
	}
	if($entry_points_section_settings['background_image']) { 
		$entry_points_section_bg_src = wp_get_attachment_image_src($entry_points_section_settings['background_image'], 'fullscreen');

		echo '.section--entry-points .section__background-image { background-image: url('.$entry_points_section_bg_src[0].'); }';
	}
	if($entry_points_section_settings['background_image'] && $entry_points_section_settings['background_overlay_color']) { 

		if($entry_points_section_settings['background_overlay_opacity']) {
			$calculate_opacity_decimal = ($entry_points_section_settings['background_overlay_opacity'] / 100);
		} else {
			$calculate_opacity_decimal = 0;
		}
		echo '.section--entry-points .section__background-image:after { background-color: '.$entry_points_section_settings['background_overlay_color'].'; filter: alpha(opacity='.$entry_points_section_settings['background_overlay_opacity'].'); opacity: '.$calculate_opacity_decimal.' }';
	}
    ?>
	
	</style>
	<?php
}



// markup
if( $entry_points_content ):

    
	echo '<section id="'.$entry_points_section_settings['id'].'" class="section section--entry-points entry-points-'.$entry_points_layout_style.' '.$entry_points_section_settings['class'].'">';

        if($entry_points_section_header['title'] || $entry_points_section_header['sub_title']) {
            echo '<div class="section__header '.$entry_points_section_header['alignment'].'"><div class="container">';
                
                if($entry_points_section_header['title_prefix']) {
                    echo '<p class="section__title-prefix">'.$entry_points_section_header['title_prefix'].'</p>';
                }
                if($entry_points_section_header['title']) {
                    echo '<'.$entry_points_section_header['title_structure']['tag'].' class="section__title '.$entry_points_section_header['title_structure']['class'].'">'.$entry_points_section_header['title'].'</'.$entry_points_section_header['title_structure']['tag'].'>';
                }
                if($entry_points_section_header['sub_title']) {
                    echo '<p class="section__subtitle">'.$entry_points_section_header['sub_title'].'</p>';
                }

            echo '</div></div>'; // .container, .section__header
        }

        //spill($entry_points_content);

		echo '<div class="section__body">';
            
            // Determine which layout to load
			// Each layout uses the same data, the markup is all that changes.
			if($entry_points_layout_style == 'style-a') {
				include(locate_template('/template-parts/layouts/entry-point-style-a.php'));
			}
			elseif($entry_points_layout_style == 'style-b') {
				include(locate_template('/template-parts/layouts/entry-point-style-b.php'));
			}
			elseif($entry_points_layout_style == 'style-c') {
				include(locate_template('/template-parts/layouts/entry-point-style-c.php'));
			}
			elseif($entry_points_layout_style == 'style-d') {
				include(locate_template('/template-parts/layouts/entry-point-style-d.php'));
			}
            
		echo '</div>';
		

        // custom section background
        if( $entry_points_section_settings['background_style'] != 'none' && !empty($entry_points_section_settings['background_image']) ) {

	        echo '<div class="section__background-holder">';
				
				if( $entry_points_section_settings['background_style'] == 'parallax' ) {

					echo '<div class="section__background-image rellax" data-rellax-speed="-2" data-rellax-percentage="0.5"></div>';
				} 
				elseif ( $entry_points_section_settings['background_style'] == 'image' ) {

					echo '<div class="section__background-image"></div>';
				}
				
			echo '</div>';
		}

	echo '</section>';
endif;