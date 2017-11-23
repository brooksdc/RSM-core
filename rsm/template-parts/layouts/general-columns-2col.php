<?php
/**
 * TWO-COL-FIXED. 
 * Layout choice for general column layout block
 */
global $primary_classes, $secondary_classes, $primary_classes_rev, $secondary_classes_rev;

$custom_col_section_settings_two_col = get_sub_field('two_col_layout_options');
$custom_col_two_col_primary_content = get_sub_field('two_col_primary_content');
$custom_col_two_col_primary_class = get_sub_field('two_col_primary_class');
$custom_col_two_col_secondary_content = get_sub_field('two_col_secondary_content');
$custom_col_two_col_secondary_class = get_sub_field('two_col_secondary_class');

// check if option is set to REVERSED
if($custom_col_section_settings_two_col['two_col_fixed_reverse'] == true) {
	$primary_col_layout_class = $primary_classes_rev;
    $secondary_col_layout_class = $secondary_classes_rev;
}
else {
    $primary_col_layout_class = $primary_classes;
    $secondary_col_layout_class = $secondary_classes;
}

// check for custom classes
$primary_col_custom_class = null;
$secondary_col_custom_class = null;

if($custom_col_two_col_primary_class) {
	$primary_col_custom_class = $custom_col_two_col_primary_class;
} 
if($custom_col_two_col_secondary_class) {
	$secondary_col_custom_class = $custom_col_two_col_secondary_class;
} 

// MARKUP
if($custom_col_two_col_primary_content || $custom_col_two_col_secondary_content):
	echo '<div class="'.$container_class.'">';
	            
	    echo '<div class="row">';

	        echo '<div class="'.$primary_col_layout_class.' '.$primary_col_custom_class.'">';
	            if ($custom_col_two_col_primary_content) {
	                echo $custom_col_two_col_primary_content;
	            }
	        echo '</div>';

	         echo '<div class="'.$secondary_col_layout_class.' '.$secondary_col_custom_class.'">';
	            if ($custom_col_two_col_secondary_content) {
	                echo $custom_col_two_col_secondary_content;
	            }
	        echo '</div>';
	    
	    echo '</div>';
	   
		
	echo '</div>';
endif;