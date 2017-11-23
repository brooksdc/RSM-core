<?php
/**
 General 1-col layout
 */

$gen_content_1col_section_settings = get_sub_field('section_settings');
$gen_content_1col_content = get_sub_field('content');


// markup
if($gen_content_1col_content  ):
	echo '<section id="'.$gen_content_1col_section_settings['id'].'" class="section section--page-builder section--gen-content-1col '.$gen_content_1col_section_settings['class'].'">';

		echo '<div class="container">';
            echo $gen_content_1col_content;
        echo '</div>';

	echo '</section>';
endif;