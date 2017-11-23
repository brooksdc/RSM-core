<?php
/**
 General 2-col layout
 */

$gen_content_2col_section_settings = get_sub_field('section_settings');
$gen_content_2col_columns = get_sub_field('column_setup');
$gen_content_2col_left_block = get_sub_field('left_block');
$gen_content_2col_right_block = get_sub_field('right_block');

// vertical align
if($gen_content_2col_columns['vertical_align'] == 'top'){
    $gen_content_2col_vert_align_class = 'flex-col--v-top';
} elseif($gen_content_2col_columns['vertical_align'] == 'bottom'){
    $gen_content_2col_vert_align_class = 'flex-col--v-bottom';
} else {
    $gen_content_2col_vert_align_class = 'flex-col--v-middle';
}

// column layout
if($gen_content_2col_columns['layout'] == '13-23'){
    // 1/3, 2/3
    $gen_content_2col_left_block_layout = 'col-sm-8';
    $gen_content_2col_right_block_layout = 'col-sm-16';
}
elseif($gen_content_2col_columns['layout'] == '12-12'){
    // 1/2, 1/2
    $gen_content_2col_left_block_layout = 'col-sm-12';
    $gen_content_2col_right_block_layout = 'col-sm-12';
} else{
    // 2/3, 1/3
    $gen_content_2col_left_block_layout = 'col-sm-16';
    $gen_content_2col_right_block_layout = 'col-sm-8';
}

// reverse
if($gen_content_2col_columns['reverse']){
    $gen_content_2col_order_class = 'mobile-reverse';
} else {
    $gen_content_2col_order_class = null;
}

// markup
if( $gen_content_2col_left_block || $gen_content_2col_right_block ):
	echo '<section id="'.$gen_content_2col_section_settings['id'].'" class="section section--page-builder section--gen-content-2col '.$gen_content_2col_section_settings['class'].'">';

		echo '<div class="container flex-container '.$gen_content_2col_direction_class.' '.$gen_content_2col_order_class.'">';
            
            if($gen_content_2col_left_block) {
                echo '<div class="flex-col left-block '.$gen_content_2col_left_block_layout.' '.$gen_content_2col_vert_align_class.'">';
                    echo '<div class="flex-col--inner">';
                        echo $gen_content_2col_left_block;
                    echo '</div>';
                echo '</div>';  
            }
            
            if($gen_content_2col_right_block) {
                echo '<div class="flex-col right-block '.$gen_content_2col_right_block_layout.' '.$gen_content_2col_vert_align_class.'">';
                    echo '<div class="flex-col--inner">';
                        echo $gen_content_2col_right_block;
                    echo '</div>';
                echo '</div>';
            }
			
        echo '</div>';
	echo '</section>';
endif;