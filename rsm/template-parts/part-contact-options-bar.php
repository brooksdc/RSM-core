<?php
/**
 * Contact Options Bar
 */

// global template part
$rsm_contact_options_bar_items = get_field('rsm_contact_options_bar_items', 'options');
$rsm_contact_options_bar_settings = get_field('rsm_contact_options_bar_settings', 'options');

if($rsm_contact_options_bar_settings['id'] != null ) {
	$rsm_contact_bar_id = $rsm_contact_options_bar_settings['id'];
} else {
	$rsm_contact_bar_id = null;
}
if($rsm_contact_options_bar_settings['class'] != null ) {
	$rsm_contact_bar_class = $rsm_contact_options_bar_settings['class'];
} else {
	$rsm_contact_bar_class = null;
}

$contact_options_bar_count_class = 'items-'.count($rsm_contact_options_bar_items);

if($rsm_contact_options_bar_items):

echo '<section id="'.$rsm_contact_bar_id.'" class="rsm-contact-options-bar '.$rsm_contact_bar_class.' '.$contact_options_bar_count_class.'">';
	echo '<div class="container display-table">';

		//items
		foreach($rsm_contact_options_bar_items as $item) {
			echo '<div class="rsm-contact-options-bar__item display-table-cell">';

				// setup link
				if( $item['choose_link_type'] == 'phone' && !empty($item['title']) ){
					$phone_string = do_shortcode($item['title']);
					$phone_link = preg_replace("/[^0-9]/","", $phone_string);
					$link = 'tel:+1'.$phone_link;
				}
				elseif( $item['choose_link_type'] == 'email' && !empty($item['title']) ){

					$email_title_data = $item['title'];

					if (strpos($email_title_data, '[rsm_primary_email]') !== false) {
					    // the email shortcode was used, pull directly from option data instead.
					    $primary_email_data = get_field('primary_email_address', 'option');
					    if($primary_email_data) {
					    	$email_string = $primary_email_data;
					    } else {
					    	$email_string = null;
					    }
					} else {
						$email_string = $email_title_data;
					}
					
					$link = 'mailto:'.$email_string;
				}
				elseif( $item['choose_link_type'] == 'url' && !empty($item['url']) ) {
					$link = $item['url'];
				}
				else {
					$link = null;
				}

				// setup image
				$image_classes = '';

				if( $item['icon_type'] == 'image' && !empty($item['image']) ) {

					//is retina?
					$image_src = wp_get_attachment_image_src($item['image'], 'thumb-no-crop');

					if($item['image_retina']){
						//get image meta by id
						$image_width = $image_src[1] / 2;
						$image_height = $image_src[2] / 2;
						$image_classes .= 'image--retina ';
					} else {
						$image_width = $image_src[1];
						$image_height = $image_src[2];
						$image_classes .= 'image--standard ';
					}

					$image_output = '<img src="'.$image_src[0].'" width="'.$image_width.'" height="'.$image_height.'">';

				}
				elseif( $item['icon_type'] == 'font-awesome' && !empty($item['font_awesome_icon_name']) ) {
					$image_classes .= 'image--icon ';
					$image_output = '<i class="fa '.$item['font_awesome_icon_name'].'"></i>';
				}
				elseif( $item['icon_type'] == 'svg-code' && !empty($item['svg_code']) ) {
					$image_classes .= 'image--svg ';
					$image_output = $item['svg_code'];
				
				}
				else {
					$image_output = null;
				}

				// OUTPUT
				if($link) {
					echo '<a class="anchor" href="'.$link.'">';
				} else {
					echo '<span class="anchor">';
				}

					echo '<span class="rsm-contact-options-bar__item__image '.$image_classes.'"><span class="v-middle">'.$image_output.'</span></span>';

					if($item['title_prefix']) {
						echo '<span class="rsm-contact-options-bar__item__title-prefix">'.do_shortcode($item['title_prefix']).'</span>';
					}

					if($item['title']) {
						echo '<span class="rsm-contact-options-bar__item__title">'.do_shortcode($item['title']).'</span>';
					}

				if(!$link) {
					echo '</span>';
				} else {
					echo '</a>';
				}


			echo '</div>'; //.rsm-contact-options-bar__item
		}

	echo '</div>';
echo '</section>';
endif;