<?php
/**
 * Primary Email Shortcode Template.
 *
 * This template can be overriden by copying this file to your-theme/rsm-templates/
 *
 * @author 		RSM
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Don't allow direct access

// Data
$email = get_field('primary_email_address','option');

// check if attributes are set
if( !isset($args['style']) || $args['style'] == 'textonly') {

	$element_class = null; 
	$has_anchor = false;

} elseif ( $args['style'] == 'button' ) {

	$element_class = 'btn btn-primary';
	$has_anchor = true;

} elseif ( $args['style'] == 'link' ) {

	$element_class = null;
	$has_anchor = true;
}

if( !isset($args['icon']) ) {
	$icon_string = null;
} elseif ( $args['icon'] == 'true' ) {
	$icon_string = '<i class="icon fa fa-envelope"></i>';
} else {
	$icon_string = null;
}

// output
if($email):

	if($has_anchor){
		echo '<a class="'.$element_class.' rsm-primary-email" href="mailto:'.$email.'">'.$icon_string.' '.obfuscate($email).'</a>';
	} else {
		echo '<span class="rsm-primary-email">'.obfuscate($email).'</span>';
	}
	
endif;
