<?php
/**
 * Primary Phone Shortcode Template.
 *
 * This template can be overriden by copying this file to your-theme/rsm-templates/
 *
 * @author 		RSM
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Don't allow direct access

// Data
$phone = get_field('primary_phone_number','option');
$phone_link = preg_replace("/[^0-9]/","", $phone);

// You should also check for unique post data so a special nuber can be include for adwords campaigns.
// create a custom field for that purpose and build into this shortcode.

// check if attributes are set
if( !isset($args['style']) || $args['style'] == 'textonly') {

	$phone_class = null; 
	$has_anchor = false;

} elseif ( $args['style'] == 'button' ) {

	$phone_class = 'btn btn-primary';
	$has_anchor = true;

} elseif ( $args['style'] == 'link' ) {

	$phone_class = null;
	$has_anchor = true;
}

if( !isset($args['icon']) ) {
	$icon_string = null;
} elseif ( $args['icon'] == 'true' ) {
	$icon_string = '<i class="icon fa fa-phone"></i>';
}

// output


	if($phone):

		if($has_anchor){
			echo '<a class="'.$phone_class.' rsm-primary-phone" href="tel:1'.$phone_link.'">'.$icon_string.' '.$phone.'</a>';
		} else {
			echo '<span class="rsm-primary-phone">'.$phone.'</span>';
		}
		
	endif;

