<?php
/**
 * General Flexible Column Layout
 */
global $post;

$custom_col_section_settings = get_sub_field('section_settings');
$custom_col_section_header = get_sub_field('section_header');
$custom_col_layout_style = get_sub_field('layout_style');

$dynamic_id = 'p'.$post->ID.'_'.$key;

// determine ID (required)
if($custom_col_section_settings['id']) {
	$section_id = $custom_col_section_settings['id'];
} else {
	$section_id = $dynamic_id;
}

//---
// Background CSS setup
//---
?>
<style type="text/css">
	
	<?php if($custom_col_section_settings['background_style'] != 'none' ) {

		if($custom_col_section_settings['background_color']) { 
			echo '#'.$section_id.' { background-color: '.$custom_col_section_settings['background_color'].'; }';
		}
		if($custom_col_section_settings['background_image']) { 
			$custom_col_section_bg_src = wp_get_attachment_image_src($custom_col_section_settings['background_image'], 'fullscreen');

			echo '#'.$section_id.' .section__background-image { background-image: url('.$custom_col_section_bg_src[0].'); }';
		}
		if($custom_col_section_settings['background_overlay_color']) { 

			if($custom_col_section_settings['background_overlay_opacity']) {
				$calculate_opacity_decimal = ($custom_col_section_settings['background_overlay_opacity'] / 100);
			} else {
				$calculate_opacity_decimal = 0;
			}
			echo '#'.$section_id.' .section__background-image:after { background-color: '.$custom_col_section_settings['background_overlay_color'].'; filter: alpha(opacity='.$custom_col_section_settings['background_overlay_opacity'].'); opacity: '.$calculate_opacity_decimal.' }';
		}
	} 
	?>
	</style>
<?php

// Check if the fullwidth option is set. NOTE: This vairable is used in the nested template files.
if( $custom_col_section_settings['stretch_content_to_fullwidth'] == true ) {
	$container_class = 'container-fluid';
} else {
	$container_class = 'container';
}

// Add extra classes to specific image or parallax in markup
$section_modifier_class = null;
if( !empty($custom_col_section_settings['background_image'] )) {

	if( $custom_col_section_settings['background_style'] == 'image' ) {
		$section_modifier_class = 'has-background-image';
	}
	elseif( $custom_col_section_settings['background_style'] == 'parallax' ) {
		$section_modifier_class = 'has-background-parallax';
	}

} 

// markup
echo '<section id="'.$section_id.'" class="section section--custom-columns '.$section_modifier_class.' '.$custom_col_section_settings['class'].'">';
	
	// section title
    if($custom_col_section_header['title'] || $custom_col_section_header['sub_title']) {
        echo '<div class="section__header '.$custom_col_section_header['alignment'].'">';
        	echo '<div class="'.$container_class.'">';
            
                if($custom_col_section_header['title_prefix']) {
                    echo '<p class="section__title-prefix">'.$custom_col_section_header['title_prefix'].'</p>';
                }
                if($custom_col_section_header['title']) {
                    echo '<'.$custom_col_section_header['title_structure']['tag'].' class="section__title '.$custom_col_section_header['title_structure']['class'].'">'.$custom_col_section_header['title'].'</'.$custom_col_section_header['title_structure']['tag'].'>';
                }
                if($custom_col_section_header['sub_title']) {
                    echo '<p class="section__subtitle">'.$custom_col_section_header['sub_title'].'</p>';
                }

            echo '</div>'; // .container
        echo '</div>'; // .section__header
    }
	
    // variable layout content 
    echo '<div class="section__content">';
    	
    	if($custom_col_layout_style == 'one-col') {
    		include(locate_template('template-parts/layouts/general-columns-1col.php'));
    	}
    	elseif($custom_col_layout_style == 'two-col-fixed') {
    		include(locate_template('template-parts/layouts/general-columns-2col.php'));
    	}
    	elseif($custom_col_layout_style == 'flex-cols') {
    		include(locate_template('template-parts/layouts/general-columns-flexible.php')); 
    	}

    echo '</div>'; // .section-content
        
   

	// custom section background setup
    if( $custom_col_section_settings['background_style'] != 'none' && !empty($custom_col_section_settings['background_image']) ) {

        echo '<div class="section__background-holder">';
			
			if( $custom_col_section_settings['background_style'] == 'parallax' ) {

				echo '<div class="section__background-image rellax" data-rellax-speed="-2" data-rellax-percentage="0.5"></div>';
			} 
			elseif ( $custom_col_section_settings['background_style'] == 'image' ) {

				echo '<div class="section__background-image"></div>';
			}
			
		echo '</div>';
	}
	

echo '</section>';
