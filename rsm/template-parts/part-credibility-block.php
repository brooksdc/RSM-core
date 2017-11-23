<?php
/**
 RSM - Credibility Block
 Global Template Part
 */


//$rsm_credibility_block_section_settings = get_field('rsm_credibility_block_section_settings', 'option');
$rsm_credibility_block_section_id = get_field('rsm_credibility_block_section_id', 'option');
$rsm_credibility_block_section_class = get_field('rsm_credibility_block_section_class', 'option');

$rsm_credibility_block_use_section_title = get_field('rsm_credibility_block_use_section_title', 'option');
//$rsm_credibility_block_section_header = get_field('rsm_credibility_block_section_header', 'option');
$rsm_credibility_block_header_title_prefix = get_field('rsm_credibility_block_header_title_prefix', 'option');
$rsm_credibility_block_header_title = get_field('rsm_credibility_block_header_title', 'option');
$rsm_credibility_block_header_subtitle = get_field('rsm_credibility_block_header_subtitle', 'option');
$rsm_credibility_block_header_alignment = get_field('rsm_credibility_block_header_alignment', 'option');
$rsm_credibility_block_header_title_tag = get_field('rsm_credibility_block_header_title_tag', 'option');
$rsm_credibility_block_header_title_class = get_field('rsm_credibility_block_header_title_class', 'option');

//$rsm_credibility_block_column_setup = get_field('rsm_credibility_block_column_setup', 'option');
$rsm_credibility_block_column_align = get_field('rsm_credibility_block_column_align', 'option');
$rsm_credibility_block_column_content = get_field('rsm_credibility_block_column_content', 'option');

// vertical align
if($rsm_credibility_block_column_align == 'top'){
    $gen_content_flexible_vert_align_class = 'v-top';
} elseif($rsm_credibility_block_column_align == 'bottom'){
    $gen_content_flexible_vert_align_class = 'v-bottom';
} else {
    $gen_content_flexible_vert_align_class = 'v-middle';
}


// get column count to evenly distribute the widths
$col_count = count($rsm_credibility_block_column_content); 
if($col_count == 1) {
    $flexible_col_auto_class = 'col-sm-24';
}
elseif($col_count == 2) {
    $flexible_col_auto_class = 'col-sm-12';
}
elseif($col_count == 3) {
    $flexible_col_auto_class = 'col-sm-8';
}
/*elseif($col_count == 4) {
    $flexible_col_auto_class = 'col-sm-6';
}
elseif($col_count == 5) {
    $flexible_col_auto_class = 'col-sm-4p8'; //this one doesn't fit
}
elseif($col_count == 6) {
    $flexible_col_auto_class = 'col-sm-4';
}*/


// markup
if( have_rows('rsm_credibility_block_column_content', 'option') || $rsm_credibility_block_use_section_title ):

    

	echo '<section id="'.$rsm_credibility_block_section_id.'" class="section section--page-builder section--credibility-block '.$rsm_credibility_block_section_class.'">';

        if($rsm_credibility_block_use_section_title && $rsm_credibility_block_header_title) {
            echo '<div class="section__header '.$rsm_credibility_block_header_alignment.'"><div class="container">';
                
                if($rsm_credibility_block_header_title_prefix) {
                    echo '<p class="section__title-prefix">'.$rsm_credibility_block_header_title_prefix.'</p>';
                }
                if($rsm_credibility_block_header_title) {
                    echo '<'.$rsm_credibility_block_header_title_tag.' class="section__title '.$rsm_credibility_block_header_title_class.'">'.$rsm_credibility_block_header_title.'</'.$rsm_credibility_block_header_title_tag.'>';
                }
                if($rsm_credibility_block_header_subtitle) {
                    echo '<p class="section__subtitle">'.$rsm_credibility_block_header_subtitle.'</p>';
                }

            echo '</div></div>'; // .container, .section__header
        }

		echo '<div class="container display-table '.$gen_content_flexible_vert_align_class.'">';
            echo '<div class="row">';

            // loop through rows
            while ( have_rows('rsm_credibility_block_column_content', 'option') ) : the_row();
                
                $flexible_col_width = get_sub_field('fixed_width');
                $flexible_col_content = get_sub_field('content');
                $flexible_col_custom_class = get_sub_field('col_class');

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

                echo '<div class="flexible-col display-table-cell '.$flexible_col_auto_class.' '.$flexible_col_custom_class.'" style="'.$flexible_width_properties.'">';
                    echo '<div class="flexible-col__inner">';
                        echo $flexible_col_content;
                    echo '</div>';
                echo '</div>';  

            endwhile;
            
           
            echo '</div>'; //.row
        echo '</div>';
	echo '</section>';
endif;
