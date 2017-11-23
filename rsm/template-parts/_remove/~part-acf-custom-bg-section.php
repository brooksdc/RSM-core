<?php
/**
 RSM - Single Column with Custom Background
 */

$custom_bg_section_settings = get_sub_field('section_settings');
$custom_bg_section_header = get_sub_field('section_header');
$custom_bg_section_content = get_sub_field('section_content');


//---
// Background CSS setup
//---
//spill($custom_bg_section_settings);


?>
<style type="text/css">
	
	<?php if($custom_bg_section_settings['background_style'] != 'none' ) {

		if($custom_bg_section_settings['background_color']) { 
			echo '#'.$custom_bg_section_settings['id'].' { background-color: '.$custom_bg_section_settings['background_color'].'; }';
		}
		if($custom_bg_section_settings['background_image']) { 
			$custom_bg_section_bg_src = wp_get_attachment_image_src($custom_bg_section_settings['background_image'], 'fullscreen');

			echo '#'.$custom_bg_section_settings['id'].' .section__background-image { background-image: url('.$custom_bg_section_bg_src[0].'); }';
		}
		if($custom_bg_section_settings['background_overlay_color']) { 

			if($custom_bg_section_settings['background_overlay_opacity']) {
				$calculate_opacity_decimal = ($custom_bg_section_settings['background_overlay_opacity'] / 100);
			} else {
				$calculate_opacity_decimal = 0;
			}
			echo '#'.$custom_bg_section_settings['id'].' .section__background-image:after { background-color: '.$custom_bg_section_settings['background_overlay_color'].'; filter: alpha(opacity='.$custom_bg_section_settings['background_overlay_opacity'].'); opacity: '.$calculate_opacity_decimal.' }';
		}
	} 

	if($custom_bg_section_settings['max_width'] != null) {

		echo '#'.$custom_bg_section_settings['id'].' .container { max-width: '.$custom_bg_section_settings['max_width'].'%; }';
	}
	?>
	</style>
<?php




// markup
if( $custom_bg_section_content ):

    
	echo '<section id="'.$custom_bg_section_settings['id'].'" class="section section--custom-background section--single-col-custom-bg '.$custom_bg_section_settings['class'].'">';

        if($custom_bg_section_header) {
            echo '<div class="section__header '.$custom_bg_section_header['alignment'].'"><div class="container">';
                
                if($custom_bg_section_header['title_prefix']) {
                    echo '<p class="section__title-prefix">'.$custom_bg_section_header['title_prefix'].'</p>';
                }
                if($custom_bg_section_header['title']) {
                    echo '<'.$custom_bg_section_header['title_structure']['tag'].' class="section__title '.$custom_bg_section_header['title_structure']['class'].'">'.$custom_bg_section_header['title'].'</'.$custom_bg_section_header['title_structure']['tag'].'>';
                }
                if($custom_bg_section_header['sub_title']) {
                    echo '<p class="section__subtitle">'.$custom_bg_section_header['sub_title'].'</p>';
                }

            echo '</div></div>'; // .container, .section__header
        }

        //spill($custom_bg_entry_points);

		echo '<div class="container">';
            
            echo '<div class="section__content">';
            	echo $custom_bg_section_content;
            echo '</div>';
            
        echo '</div>'; // .container

        
		// custom section background
        if( $custom_bg_section_settings['background_style'] != 'none' && !empty($custom_bg_section_settings['background_image']) ) {

	        echo '<div class="section__background-holder">';
				
				if( $custom_bg_section_settings['background_style'] == 'parallax' ) {

					echo '<div class="section__background-image rellax" data-rellax-speed="-2" data-rellax-percentage="0.5"></div>';
				} 
				elseif ( $custom_bg_section_settings['background_style'] == 'image' ) {

					echo '<div class="section__background-image"></div>';
				}
				
			echo '</div>';
		}
		

	echo '</section>';
endif;