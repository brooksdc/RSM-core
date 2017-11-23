<?php
/*
 Entry points – STYLE A layout
 */

echo '<div class="container flex-container">';    
       
// loop through rows
foreach ( $entry_points_content as $entry_point ):
		
	//spill($entry_point);

    // get post ID, get_title and featured image from there.
    // check if overrides are active, override and addon.
    
    // Determine the linked post ID
    if(!empty($entry_point['select_page_to_link'])){
        $id = $entry_point['select_page_to_link'];
        $permalink = get_the_permalink($entry_point['select_page_to_link']);
    } else {
        $id = null;
        $permalink = null;
    }
    
    // Determine if overrides are active
    if($entry_point['customize_defaults'] == true) {
        $customized = true;
    } else {
        $customized = false;
    }

    // Determine if we should be using a custom image
    if( $customized && $entry_point['overrides']['visual_style'] == 'image' && !empty($entry_point['overrides']['image'])) {
        $has_custom_image = true;
    } else {
        $has_custom_image = false;
    }

    // Determine image
    if(has_post_thumbnail($id)){
        $image = get_the_post_thumbnail_url($id, 'entry-point');
    }
    elseif( $has_custom_image ) {
        $image_obj = wp_get_attachment_image_src($entry_point['overrides']['image'], 'entry-point');
        $image = $image_obj[0];
    } else {
        $image = null;
    }

    // Determine if we should be using a custom title
    if( $customized && !empty($entry_point['overrides']['title'])) {
        $title = $entry_point['overrides']['title'];
    } else {
        $title = get_the_title($id);
    }

    // Determine if we should be using the sub text
    if( $customized && !empty($entry_point['overrides']['subtitle'])) {
        $subtitle = $entry_point['overrides']['subtitle'];
    } else {
        $subtitle = false;
    }

    // build classes for parent element
    $entry_point_classes = '';
    if( $image != null ) {
        $entry_point_classes .= 'has-image ';
    } 
    if($entry_point['overrides']['subtitle']){
        $entry_point_classes .= 'has-bottom-content ';
    } 

    // build inline styles
    $style_att = '';

    if($image) {
        $style_att .= 'background-image: url('.$image.');';
    } 
    if( $customized && $entry_point['overrides']['visual_style'] == 'color' && !empty($entry_point['overrides']['bg_color'])) {
        $bg_color = $entry_point['overrides']['bg_color'];
        $style_att .= 'background-color: '.$bg_color.';';

    }

	// set widths in SCSS
    echo '<div class="flex-col entry-point-holder">';
        echo '<div class="entry-point entry-point--'.$entry_point['content_type'].' '.$entry_point_classes.'">';

            if( $entry_point['content_type'] == 'text-block' ) {

           		echo $entry_point['text_content'];

            } else {


            	//spill($entry_point);
            	// anchor open
            	if( $permalink != null  ) {
            		echo '<a class="anchor" href="'.$permalink.'" style="'.$style_att.'">';
            	} else {
            		echo '<span class="anchor" style="'.$style_att.'">';
            	}
            		
            		echo '<span class="entry-point__inner">';
            		
                		/*if($entry_point['icon_html']) {
                			echo '<span class="entry-point__icon">'.$entry_point['icon_html'].'</span>';
                		}*/
                		if($title) {
                			echo '<span class="entry-point__title">'.$title.'</span>';
                		}
                		if($subtitle) {
                			echo '<span class="entry-point__subtitle">'.$subtitle.'</span>';
                		}

            		echo '</span>';

            	// anchor close
            	if(!$permalink) {
            		echo '</span>';
            	} else {
            		echo '</a>';
            	}

            }

        echo '</div>';
    echo '</div>';  

endforeach;

echo '</div>'; // .flex-container