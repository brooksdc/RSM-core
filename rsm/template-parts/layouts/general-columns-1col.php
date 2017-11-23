<?php
/**
 * SINGLE COLUMN
 * Layout choice for general column layout block
 */

$custom_col_single_col_content = get_sub_field('single_col_content');
$custom_col_single_col_max_width = get_sub_field('single_col_max_width');
$custom_col_single_col_class = get_sub_field('single_col_class');

if(!empty($custom_col_single_col_max_width)) {
	$style_atts = 'max-width: '.$custom_col_single_col_max_width.'%';
} else {
	$style_atts = null;
}

if(!empty($custom_col_single_col_class)){
	$column_class = $custom_col_single_col_class;
} else {
	$column_class = null;
}

echo '<div class="'.$container_class.'" style="'.$style_atts.'">';
            
    echo '<div class="single-column-content '.$column_class.'">';
    	echo $custom_col_single_col_content;
    echo '</div>';

echo '</div>'; // .container
