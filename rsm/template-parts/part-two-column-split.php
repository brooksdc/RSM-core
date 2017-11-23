<?php
/**
 * 1:1 Split / 2-column split
 */

$rsm_two_col_split_col_1_content_type = get_sub_field('col_1_content_type');
$rsm_two_col_split_col_1_image = get_sub_field('col_1_image');
$rsm_two_col_split_col_1_content = get_sub_field('col_1_content');
$rsm_two_col_split_col_1_class = get_sub_field('col_1_class');
$rsm_two_col_split_col_1_use_bg_image = get_sub_field('col_1_use_bg_image');
$rsm_two_col_split_col_1_bg_image = get_sub_field('col_1_bg_image');
$rsm_two_col_split_col_1_bg_overlay_color = get_sub_field('col_1_bg_overlay_color');
$rsm_two_col_split_col_1_bg_overlay_opacity = get_sub_field('col_1_bg_overlay_opacity');
$rsm_two_col_split_col_1_box_link = get_sub_field('col_1_box_link');

$rsm_two_col_split_col_2_content_type = get_sub_field('col_2_content_type');
$rsm_two_col_split_col_2_image = get_sub_field('col_2_image');
$rsm_two_col_split_col_2_content = get_sub_field('col_2_content');
$rsm_two_col_split_col_2_class = get_sub_field('col_2_class');
$rsm_two_col_split_col_2_use_bg_image = get_sub_field('col_2_use_bg_image');
$rsm_two_col_split_col_2_bg_image = get_sub_field('col_2_bg_image');
$rsm_two_col_split_col_2_bg_overlay_color = get_sub_field('col_2_bg_overlay_color');
$rsm_two_col_split_col_2_bg_overlay_opacity = get_sub_field('col_2_bg_overlay_opacity');
$rsm_two_col_split_col_2_box_link = get_sub_field('col_2_box_link');

$rsm_two_col_split_expand_to_fullwidth = get_sub_field('expand_to_fullwidth');
$rsm_two_col_split_section_id = get_sub_field('section_id');
$rsm_two_col_split_section_class = get_sub_field('section_class');
$rsm_two_col_split_reverse_for_desktop = get_sub_field('reverse_columns_for_desktop');

//container setup
if($rsm_two_col_split_expand_to_fullwidth) {
	$two_col_split_container_class = 'container-fluid';
} else {
	$two_col_split_container_class = 'container';
}

// classes for reverse setup (push col 1 right, pull col 2 left)
if($rsm_two_col_split_reverse_for_desktop) {
	$col_1_reverse_classes = 'col-sm-push-12';
	$col_2_reverse_classes = 'col-sm-pull-12';
} else {
	$col_1_reverse_classes = null;
	$col_2_reverse_classes = null;
}

//overlay opacity setup
if($rsm_two_col_split_col_1_bg_overlay_opacity) {
	$calculate_col_1_opacity_decimal = ($rsm_two_col_split_col_1_bg_overlay_opacity / 100);
} else {
	$calculate_col_1_opacity_decimal = 0;
}
if($rsm_two_col_split_col_2_bg_overlay_opacity) {
	$calculate_col_2_opacity_decimal = ($rsm_two_col_split_col_2_bg_overlay_opacity / 100);
} else {
	$calculate_col_2_opacity_decimal = 0;
}

// overlay colour setup
if($rsm_two_col_split_col_1_bg_overlay_color) {
	$custom_col_1_overlay_color = $rsm_two_col_split_col_1_bg_overlay_color;
} else {
	$custom_col_1_overlay_color = '#000';
}
if($rsm_two_col_split_col_2_bg_overlay_color) {
	$custom_col_2_overlay_color = $rsm_two_col_split_col_2_bg_overlay_color;
} else {
	$custom_col_2_overlay_color = '#000';
}

//setup ID
if($rsm_two_col_split_section_id) {
	$two_col_section_id = $rsm_two_col_split_section_id;
} else {
	$two_col_section_id = 'p'.$key; //inherited from 'content-acf-builder-page.php'
}


if($rsm_two_col_split_col_1_content || $rsm_two_col_split_col_2_content):
	
	// DYNAMIC STYLES
	if($rsm_two_col_split_col_1_use_bg_image || $rsm_two_col_split_col_2_use_bg_image): ?>
	
		<?php if($rsm_two_col_split_col_1_use_bg_image && $rsm_two_col_split_col_1_bg_image): ?>
			<style type="text/css">
				<?php echo '#'.$two_col_section_id; ?> .col--1 .anchor:before{ background: <?php echo($custom_col_1_overlay_color); ?>; -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=<?php echo($rsm_two_col_split_col_1_bg_overlay_opacity); ?>)"; filter: alpha(opacity=<?php echo($rsm_two_col_split_col_1_bg_overlay_opacity); ?>); opacity: <?php echo($calculate_col_1_opacity_decimal); ?>; }
			</style>
		<?php endif; ?>

		<?php if($rsm_two_col_split_col_2_use_bg_image && $rsm_two_col_split_col_2_bg_image): ?>
			<style type="text/css">
			<?php echo '#'.$two_col_section_id; ?> .col--2 .anchor:before{ background: <?php echo($custom_col_2_overlay_color); ?>; -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=<?php echo($rsm_two_col_split_col_2_bg_overlay_opacity); ?>)"; filter: alpha(opacity=<?php echo($rsm_two_col_split_col_2_bg_overlay_opacity); ?>); opacity: <?php echo($calculate_col_2_opacity_decimal); ?>; }
		</style>
		<?php endif; ?>
	
	<?php
	endif;

	// MARKUP
	echo '<section id="'.$two_col_section_id.'" class="section section--two-col-split '.$rsm_two_col_split_section_class.'">';
		echo '<div class="'.$two_col_split_container_class.'">';

			echo '<div class="row">';

				// COL 1
				$col_1_classes = '';
				if( $rsm_two_col_split_col_1_content_type == 'standard' && $rsm_two_col_split_col_1_use_bg_image && $rsm_two_col_split_col_1_bg_image ) {
	                $col_1_image_obj = wp_get_attachment_image_src($rsm_two_col_split_col_1_bg_image, 'large');
	                $col_1_image_atts = 'style="background-image: url('.$col_1_image_obj[0].');"';
	                $col_1_classes .= 'has-background-image ';
	            } else {
	            	$col_1_image_atts = null;
	            }

	            if( $rsm_two_col_split_col_1_content_type == 'image-only' && $rsm_two_col_split_col_1_image ) {
	            	$col_1_classes .= 'image-only ';
	            }

	            if( $rsm_two_col_split_col_1_box_link ) {
	            	$col_1_anchor_tag = 'a';
	            	$col_1_href = 'href="$rsm_two_col_split_col_1_box_link"';
	            } else {
	            	$col_1_anchor_tag = 'span';
	            	$col_1_href = null;
	            }

				echo '<div class="col col--1 '.$col_1_reverse_classes.' square-box-holder '.$rsm_two_col_split_col_1_class.'">';
					echo '<div class="square-box">';
						echo '<'.$col_1_anchor_tag.' '.$col_1_href.' class="anchor '.$col_1_classes.'" '.$col_1_image_atts.'>';

							echo '<span class="square-box__inner">';
								if($rsm_two_col_split_col_1_content) {
									//standard editor content
									echo $rsm_two_col_split_col_1_content;
								
								} else {
									//image only
									if($rsm_two_col_split_col_1_image) {
										echo wp_get_attachment_image($rsm_two_col_split_col_1_image, 'medium');
									}
								}
							echo '</span>';

						echo '</'.$col_1_anchor_tag.'>';
					echo '</div>';
				echo '</div>';


				// COL 2
				$col_2_classes = '';
				if( $rsm_two_col_split_col_2_content_type == 'standard' && $rsm_two_col_split_col_2_use_bg_image && $rsm_two_col_split_col_2_bg_image ) {
	                $col_2_image_obj = wp_get_attachment_image_src($rsm_two_col_split_col_2_bg_image, 'large');
	                $col_2_image_atts = 'style="background-image: url('.$col_2_image_obj[0].');"';
	                $col_2_classes .= 'has-background-image ';
	            } else {
	            	$col_2_image_atts = null;
	            }

	            if( $rsm_two_col_split_col_2_content_type == 'image-only' && $rsm_two_col_split_col_2_image ) {
	            	$col_2_classes .= 'image-only ';
	            }

	            if( $rsm_two_col_split_col_2_box_link ) {
	            	$col_2_anchor_tag = 'a';
	            	$col_2_href = 'href="$rsm_two_col_split_col_2_box_link"';
	            } else {
	            	$col_2_anchor_tag = 'span';
	            	$col_2_href = null;
	            }

				echo '<div class="col col--2 '.$col_2_reverse_classes.' square-box-holder '.$rsm_two_col_split_col_2_class.'">';
					echo '<div class="square-box">';
						echo '<'.$col_2_anchor_tag.' '.$col_2_href.' class="anchor '.$col_2_classes.'" '.$col_2_image_atts.'>';

							echo '<span class="square-box__inner">';
								if($rsm_two_col_split_col_2_content) {
									//standard editor content
									echo $rsm_two_col_split_col_2_content;
								
								} else {
									//image only
									if($rsm_two_col_split_col_2_image) {
										echo wp_get_attachment_image($rsm_two_col_split_col_2_image, 'medium');
									}
								}
							echo '</span>';

						echo '</'.$col_2_anchor_tag.'>';
					echo '</div>';
				echo '</div>';
					
				

			echo '</div>';

		echo '</div>'; //.container
	echo '</section>';
endif;