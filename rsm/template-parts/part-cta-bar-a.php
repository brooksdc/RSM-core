<?php
/**
 RSM - CTA Bar - A
 */

$cta_bar_a_settings = get_field('rsm_cta_bar_a_settings', 'options');
$cta_bar_a_title = get_field('rsm_cta_bar_a_title', 'options');
$cta_bar_a_button = get_field('rsm_cta_bar_a_button', 'options');
$cta_bar_a_image = get_field('rsm_cta_bar_a_image', 'options');


// markup
if( $cta_bar_a_title || $cta_bar_a_button ):

    
	echo '<section id="'.$cta_bar_a_settings['id'].'" class="section cta-bar-a '.$cta_bar_a_settings['class'].'">';

        echo '<div class="container">';

        	echo '<div class="cta-bar-a__content">';

        		if($cta_bar_a_title) {

        			echo '<'.$cta_bar_a_title['tag'].' class="cta-bar-a__title '.$cta_bar_a_title['class'].'">'.$cta_bar_a_title['text'].'</'.$cta_bar_a_title['tag'].'>';

        		}

                   
        		if($cta_bar_a_button) {

        			echo '<a class="btn '.$cta_bar_a_button['classes'].' cta-bar-a__btn" href="'.$cta_bar_a_button['link']['url'].'">'.$cta_bar_a_button['label'].'</a>';
        		}

        		if($cta_bar_a_image) {
	        		echo wp_get_attachment_image($cta_bar_a_image, 'med-no-crop', false, array( 'class' => 'cta-bar-a__image' ) );
	        	}

        	echo '</div>';

        echo '</div>';

	echo '</section>';
endif;