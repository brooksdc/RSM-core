<?php
/**
 General FLEXIBLE layout

 DISPLAY: FLEX VERSION.
 Retired for now.
 */


$gen_content_flexible_section_settings = get_sub_field('section_settings');
$gen_content_flexible_use_title = get_sub_field('use_section_title');
$gen_content_flexible_section_header = get_sub_field('section_header');
$gen_content_flexible_columns = get_sub_field('column_setup');
//$gen_content_flexible_column_content = get_sub_field('column_content');

// vertical align
if($gen_content_flexible_columns['vertical_align'] == 'top'){
    $gen_content_flexible_vert_align_class = 'flex-col--v-top';
} elseif($gen_content_flexible_columns['vertical_align'] == 'bottom'){
    $gen_content_flexible_vert_align_class = 'flex-col--v-bottom';
} else {
    $gen_content_flexible_vert_align_class = 'flex-col--v-middle';
}

// reverse
if($gen_content_flexible_columns['reverse_order_mobile']){
    $gen_content_flexible_order_class = 'mobile-reverse';
} else {
    $gen_content_flexible_order_class = null;
}


// markup
if( have_rows('column_content') || $gen_content_flexible_use_title ):

    

	echo '<section id="'.$gen_content_flexible_section_settings['id'].'" class="section section--page-builder section--gen-content-flexible '.$gen_content_flexible_section_settings['class'].'">';

        if($gen_content_flexible_use_title && $gen_content_flexible_section_header) {
            echo '<div class="section__header '.$gen_content_flexible_section_header['alignment'].'"><div class="container">';
                
                if($gen_content_flexible_section_header['title_prefix']) {
                    echo '<p class="section__title-prefix">'.$gen_content_flexible_section_header['title_prefix'].'</p>';
                }
                if($gen_content_flexible_section_header['title']) {
                    echo '<'.$gen_content_flexible_section_header['title_structure']['tag'].' class="section__title '.$gen_content_flexible_section_header['title_structure']['class'].'">'.$gen_content_flexible_section_header['title'].'</'.$gen_content_flexible_section_header['title_structure']['tag'].'>';
                }
                if($gen_content_flexible_section_header['sub_title']) {
                    echo '<p class="section__subtitle">'.$gen_content_flexible_section_header['sub_title'].'</p>';
                }

            echo '</div></div>'; // .container, .section__header
        }

		echo '<div class="container flex-container '.$gen_content_flexible_order_class.'">';
            
            // loop through rows
            while ( have_rows('column_content') ) : the_row();
                
                $flexible_col_width = get_sub_field('fixed_width');
                $flexible_col_content = get_sub_field('content');
                $flexible_col_class = get_sub_field('col_class');

                if(!empty($flexible_col_width)) {
                    $flexible_width_properties = 'width: '.$flexible_col_width.'%; flex: 0 1 '.$flexible_col_width.'%;';
                } else {
                     $flexible_width_properties = null;
                }

                if(!empty($flexible_col_class)) {
                    $flexible_col_class = $flexible_col_class;
                } else {
                    $flexible_col_class = null;
                }

                echo '<div class="flex-col '.$gen_content_flexible_vert_align_class.' '.$flexible_col_class.'" style="'.$flexible_width_properties.'">';
                    echo '<div class="flex-col--inner">';
                        echo $flexible_col_content;
                    echo '</div>';
                echo '</div>';  

            endwhile;
            
           
			
        echo '</div>';
	echo '</section>';
endif;
