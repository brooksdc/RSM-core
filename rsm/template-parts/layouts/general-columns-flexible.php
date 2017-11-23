<?php
/**
 * FLEXIBLE COLUMNS. 
 * Layout choice for general column layout block
 */


$custom_col_section_settings_flex_col = get_sub_field('flex_col_layout_options');
$custom_col_flex_columns = get_sub_field('flex_columns');


if( $custom_col_section_settings_flex_col['flex_col_enable_vertical_alignment'] == true ) {
	$use_table_layout = true;
} else {
	$use_table_layout = false;
}


// vertical align
if($custom_col_section_settings_flex_col['flex_col_vertical_align'] == 'top'){
    $gen_content_flexible_vert_align_class = 'v-top';
}
elseif($custom_col_section_settings_flex_col['flex_col_vertical_align'] == 'bottom'){
    $gen_content_flexible_vert_align_class = 'v-bottom';
}
elseif($custom_col_section_settings_flex_col['flex_col_vertical_align'] == 'baseline'){
    $gen_content_flexible_vert_align_class = 'v-baseline';
}
else {
    $gen_content_flexible_vert_align_class = 'v-middle';
}

// turn off in disabled
if($use_table_layout) {
	$flex_container_classes = 'display-table '.$gen_content_flexible_vert_align_class;
	$flex_col_classes = 'display-table-cell';
} else {
	$flex_container_classes = null;
	$flex_col_classes = null;
}



// get column count to evenly distribute the widths
$col_count = count($custom_col_flex_columns); 
if($col_count == 1) {
    $flexible_col_auto_class = 'col-sm-24';
}
elseif($col_count == 2) {
    $flexible_col_auto_class = 'col-sm-12';
}
elseif($col_count == 3) {
    $flexible_col_auto_class = 'col-sm-8';
}
elseif($col_count == 4) {
    $flexible_col_auto_class = 'col-sm-6';
}
elseif($col_count == 5) {
    $flexible_col_auto_class = 'col-sm-4p8'; //this one doesn't fit
}
elseif($col_count == 6) {
    $flexible_col_auto_class = 'col-sm-4';
}


// markup
if( have_rows('flex_columns') ):

    echo '<div class="general-content-flexible '.$container_class.' '.$flex_container_classes.'">';
        echo '<div class="row">';

        // loop through rows
        while ( have_rows('flex_columns') ) : the_row();
            
            $flexible_col_width = get_sub_field('fixed_width');
            $flexible_col_content = get_sub_field('content');
            $flexible_col_custom_class = get_sub_field('class');

            if(!empty($flexible_col_width)) {
                $flexible_width_properties = 'width: '.$flexible_col_width.'%;';
            } else {
                 $flexible_width_properties = null;
            }                

            if(!empty($flexible_col_custom_class)) {
                $flexible_col_custom_class = $flexible_col_custom_class;
                
                //if there is a custom class set using 'col-', nullify the auto class.
                if (strpos($flexible_col_custom_class, 'col-') !== false) {
                    $flexible_col_auto_class = null;
                }
                
            } else {
                $flexible_col_custom_class = null;
            }

            echo '<div class="flexible-col '.$flex_col_classes.' '.$flexible_col_auto_class.' '.$flexible_col_custom_class.'" style="'.$flexible_width_properties.'">';
                echo '<div class="flexible-col__inner">';
                    echo $flexible_col_content;
                echo '</div>';
            echo '</div>';  

        endwhile;
        
       
        echo '</div>'; //.row
    echo '</div>';

endif;
