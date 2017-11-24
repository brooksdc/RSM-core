<?php
/**
 * Additional Emails Shortcode Template.
 *
 * This template can be overriden by copying this file to your-theme/rsm-templates/
 *
 * @author 		RSM
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Don't allow direct access

$additional_email_addresses = get_field('additional_email_addresses', 'option');

if( !empty($additional_email_addresses) ):
	
	echo '<ul class="rsm-additional-emails key-value-list">';
	foreach($additional_email_addresses as $row){
		echo '<li>';
			echo '<span class="key">'.$row['email_label'].'</span>';
			echo '<span class="value">'.obfuscate( $row['email_address'] ).'</span>';
		echo '</li>';
	}
	echo '</ul>';
	
endif;