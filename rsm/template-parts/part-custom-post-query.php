<?php
/**
 RSM - Custom Post Query
 */

$custom_query_section_settings = get_sub_field('section_settings');
$custom_query_layout_template = get_sub_field('layout_template');
$custom_query_section_header = get_sub_field('section_header');
$custom_query_columns = get_sub_field('columns');
$custom_query_content = get_sub_field('query_settings');
$custom_query_button = get_sub_field('button');
//$custom_query_layout_style = get_sub_field('select_layout_style');

//spill($custom_query_section_settings);
//spill($custom_query_section_header);

//process custom query data
$exclude_id_array = array_map('intval', explode(',', $custom_query_content['exclude_ids']));

if( $exclude_id_array[0] != null ) {
	$post__not_in = $exclude_id_array;
} else {
	$post__not_in = null;
}

if($custom_query_content['post_type']){
	$post_type = $custom_query_content['post_type'];
} else {
	$post_type = 'post';
}

if($custom_query_content['number_of_posts']){
	$posts_per_page = $custom_query_content['number_of_posts'];
} else {
	$posts_per_page = 3;
}

// check if there is a specific template set
if($custom_query_layout_template) {
	$trim_filepath = str_replace('.php', '', $custom_query_layout_template);
	$template_path = $trim_filepath;
} else {
	$template_path = 'template-parts/layouts/custom-query-content-a';
}

// set column class based
if($custom_query_columns == 1) {
	$column_class = 'col-sm-24';
}
elseif($custom_query_columns == 2) {
	$column_class = 'col-sm-12';
}
elseif($custom_query_columns == 3) {
	$column_class = 'col-sm-8';
}
elseif($custom_query_columns == 4) {
	$column_class = 'col-sm-6';
}
elseif($custom_query_columns == 5) {
	$column_class = 'col-sm-4p8';
}
else {
	$column_class = 'col-sm-8';
}

// build args from data
$customQueryArgs = array(
	'post_type' => $post_type,
	'posts_per_page' => $posts_per_page,
	'post__not_in' => $post__not_in, //this gets trumped by $post__in
);
$customQuery = new WP_Query($customQueryArgs);
if($customQuery->have_posts()):
	
	// markup

	echo '<aside id="'.$custom_query_section_settings['id'].'" class="section section--custom-post-query'.$custom_query_section_settings['class'].'">';

        if($custom_query_section_header) {
            echo '<div class="section__header '.$custom_query_section_header['alignment'].'"><div class="container">';
                
                if($custom_query_section_header['title_prefix']) {
                    echo '<p class="section__title-prefix">'.$custom_query_section_header['title_prefix'].'</p>';
                }
                if($custom_query_section_header['title']) {
                    echo '<'.$custom_query_section_header['title_structure']['tag'].' class="section__title '.$custom_query_section_header['title_structure']['class'].'">'.$custom_query_section_header['title'].'</'.$custom_query_section_header['title_structure']['tag'].'>';
                }
                if($custom_query_section_header['sub_title']) {
                    echo '<p class="section__subtitle">'.$custom_query_section_header['sub_title'].'</p>';
                }

            echo '</div></div>'; // .container, .section__header
        }

        //spill($custom_query_content);

		echo '<div class="section__body">';
            
            // Determine which layout to load
			// Each layout uses the same data, the markup is all that changes.
			/*if($custom_query_layout_style == 'style-a') {
				include(locate_template('/template-parts/layouts/'));
			}
			elseif($custom_query_layout_style == 'style-b') {
				include(locate_template('/template-parts/layouts/'));
			}
			elseif($custom_query_layout_style == 'style-c') {
				include(locate_template('/template-parts/layouts/'));
			}
			elseif($custom_query_layout_style == 'style-d') {
				include(locate_template('/template-parts/layouts/'));
			}*/
			echo '<div class="container">';

				echo '<div class="row">';

					
					while($customQuery->have_posts()):
						$customQuery->the_post();

						//get post content
						echo '<div class="custom-query-item '.$column_class.'">';
							get_template_part($template_path);
						echo '</div>';

					endwhile;
					

				echo '</div>'; //.row

			echo '</div>'; //.container
            
		echo '</div>';
		

		if(isset($custom_query_button['link']['url'])) {
			echo '<div class="section__footer"><div class="container">';
				echo '<a href="'.$custom_query_button['link']['url'].'" class="'.$custom_query_button['classes'].'">'.$custom_query_button['label'].'</a>';
			echo '</div></div>';
		}

	echo '</aside>';
endif;
wp_reset_postdata();