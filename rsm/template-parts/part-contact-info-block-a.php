<?php
/**
 RSM - Contact Info Block - A
 */

$contact_info_a_settings = get_field('rsm_contact_info_a_settings', 'options');

$contact_info_a_phone = get_field('rsm_contact_info_a_phone_settings', 'options');
$contact_info_a_phone_include = $contact_info_a_phone['include_phone'];
$contact_info_a_phone_label = $contact_info_a_phone['label_above_phone'];
$contact_info_a_phone_link = $contact_info_a_phone['make_phone_link'];

$contact_info_a_service_areas = get_field('rsm_contact_info_a_service_areas', 'options');
$contact_info_a_service_areas_include = $contact_info_a_service_areas['include_service_areas'];
$contact_info_a_service_areas_title = $contact_info_a_service_areas['title'];

$contact_info_a_business_hours = get_field('rsm_contact_info_a_business_hours', 'options');
$contact_info_a_business_hours_include = $contact_info_a_business_hours['include_business_hours'];
$contact_info_a_business_hours_title = $contact_info_a_business_hours['title'];

$contact_info_a_payment_types = get_field('rsm_contact_info_a_payment_types', 'options');
$contact_info_a_payment_types_include = $contact_info_a_payment_types['include_payment_types'];
$contact_info_a_payment_types_title = $contact_info_a_payment_types['title'];


if($contact_info_a_phone_link) {
        $phone_shortcode_atts = 'style="link" icon="true"';
} else {
        $phone_shortcode_atts = null; 
}

// markup
if( $contact_info_a_phone_include || $contact_info_a_service_areas_include || $contact_info_a_business_hours_include || $contact_info_a_payment_types_include ):

    
	echo '<section id="'.$contact_info_a_settings['id'].'" class="section contact-info-block-a '.$contact_info_a_settings['class'].'">';

        echo '<div class="container flex-container">';

        	if($contact_info_a_phone_include) {
                        echo '<div class="flex-col flex-block contact-info-block-a__phone">';
                                echo '<div class="flex-col--inner">';
                                        if(!empty($contact_info_a_phone_label)) {
                                                echo '<span class="contact-info-block-a__phone-label">'.$contact_info_a_phone_label.'</span>';
                                        }
                                        echo do_shortcode('[rsm_primary_phone '.$phone_shortcode_atts.']');
                                echo '</div>';
                        echo '</div>';
                }

                if($contact_info_a_service_areas_include) {
                        echo '<div class="flex-col contact-info-block-a__service-areas">';
                                echo '<div class="flex-col--inner">';
                                        if(!empty($contact_info_a_service_areas_title)) {
                                                echo '<h4 class="contact-info-block-a__title">'.$contact_info_a_service_areas_title.'</h4>';
                                        }
                                        echo do_shortcode('[rsm_service_areas]');
                                echo '</div>';
                        echo '</div>';
                }

                if($contact_info_a_business_hours) {
                        echo '<div class="flex-col contact-info-block-a__business-hours">';
                                echo '<div class="flex-col--inner">';
                                        if(!empty($contact_info_a_business_hours_title)) {
                                                echo '<h4 class="contact-info-block-a__title">'.$contact_info_a_business_hours_title.'</h4>';
                                        }
                                        echo do_shortcode('[rsm_business_hours]');
                                echo '</div>';
                        echo '</div>';
                }

                if($contact_info_a_payment_types) {
                        echo '<div class="flex-col contact-info-block-a__payment-types">';
                                echo '<div class="flex-col--inner">';
                                        if(!empty($contact_info_a_payment_types_title)) {
                                                echo '<h4 class="contact-info-block-a__title">'.$contact_info_a_payment_types_title.'</h4>';
                                        }
                                        echo do_shortcode('[rsm_payment_types]');
                                echo '</div>';
                        echo '</div>';
                }

        echo '</div>';

	echo '</section>';
endif;