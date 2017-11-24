<?php
/**
 * CTA Aside Box Shortcode Template.
 *
 * This template can be overriden by copying this file to your-theme/rsm-templates/
 *
 * @author 		RSM
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Don't allow direct access

//data
$rsm_cta_aside_box_title = get_field('rsm_cta_aside_box_title', 'option');
$rsm_cta_aside_box_subtitle = get_field('rsm_cta_aside_box_subtitle', 'option');
$rsm_cta_aside_box_content = get_field('rsm_cta_aside_box_content', 'option');
$rsm_cta_aside_box_button_link = get_field('rsm_cta_aside_box_button_link', 'option');
$rsm_cta_aside_box_button_text = get_field('rsm_cta_aside_box_button_text', 'option');
$rsm_cta_aside_box_button_classes = get_field('rsm_cta_aside_box_button_classes', 'option');
$rsm_cta_aside_box_id = get_field('rsm_cta_aside_box_id', 'option');
$rsm_cta_aside_box_class = get_field('rsm_cta_aside_box_class', 'option');

if($rsm_cta_aside_box_id) {
	$this_aside_id = $rsm_cta_aside_box_id;
} else {
	$this_aside_id = null;
}

if($rsm_cta_aside_box_class) {
	$this_aside_class = $rsm_cta_aside_box_class;
} else {
	$this_aside_class = null;
}

if( $rsm_cta_aside_box_title || $rsm_cta_aside_box_content):
	echo '<aside id="'.$this_aside_id.'" class="aside rsm-cta-aside-box '.$this_aside_class.'">';
		
		echo '<div class="aside__inner">';

		if($rsm_cta_aside_box_title || $rsm_cta_aside_box_subtitle) {
			echo '<div class="aside__header">';
				if($rsm_cta_aside_box_title) {
					echo '<h3 class="aside__title">'.$rsm_cta_aside_box_title.'</h3>';
				}
				if($rsm_cta_aside_box_subtitle) {
					echo '<p class="aside__subtitle">'.$rsm_cta_aside_box_subtitle.'</p>';
				}
			echo '</div>';
		}

		if($rsm_cta_aside_box_content){
			echo '<div class="aside__content">'.$rsm_cta_aside_box_content.'</div>';
		}

		if($rsm_cta_aside_box_button_link){
			echo '<div class="aside__footer">';

				if($rsm_cta_aside_box_button_text) {
					$button_text = $rsm_cta_aside_box_button_text;
				} else {
					$button_text = 'Click here';
				}

				if($rsm_cta_aside_box_button_classes) {
					$button_classes = $rsm_cta_aside_box_button_classes;
				} else {
					$button_classes = 'btn-default';
				}

				echo '<a href="'.$rsm_cta_aside_box_button_link.'" class="btn '.$button_classes.'">'.$button_text.'</a>';

			echo '</div>';
		}

		echo '</div>';
	
	echo '</aside>';

endif;