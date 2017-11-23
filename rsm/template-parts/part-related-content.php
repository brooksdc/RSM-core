<?php
/**
 * RSM Related Content
 */

$rsm_related_content = get_field('rsm_related_content');
$rsm_related_content_section_title = get_field('rsm_related_content_section_title');
$rsm_related_content_section_subtitle = get_field('rsm_related_content_section_subtitle');

if($rsm_related_content):
	echo '<aside class="rsm-related-content section">';
		echo '<div class="container">';

			if($rsm_related_content_section_title || $rsm_related_content_section_subtitle) {
				echo '<div class="section__header">';

					if($rsm_related_content_section_title) {
						echo '<h3 class="section__title">'.$rsm_related_content_section_title.'</h3>';
					}
					if($rsm_related_content_section_subtitle) {
						echo '<p class="section__subtitle">'.$rsm_related_content_section_subtitle.'</p>';
					}

				echo '</div>';
			}

			echo '<div class="row">';

				foreach($rsm_related_content as $post) {
					//spill($post);
					echo '<div class="col-sm-8">';
						echo '<article class="rsm-related-content__item">';
							
							echo '<a href="'.esc_attr( get_the_permalink($post->ID) ).'" class="anchor">';
								if( has_post_thumbnail($post->ID) ){
									echo get_the_post_thumbnail($post->ID, 'entry-point', array('class' => 'image') );
								}
								echo '<h4 class="title">'.get_the_title($post->ID).'</h4>';
							echo '</a>';

						echo '</article>';
					echo '</div>';
				}

			echo '</div>';
		echo '</div>';
	echo '</aside>';
endif;