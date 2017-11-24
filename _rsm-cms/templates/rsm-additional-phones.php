<?php
/**
 * Additional Phones Shortcode Template.
 *
 * This template can be overriden by copying this file to your-theme/rsm-templates/
 *
 * @author 		RSM
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Don't allow direct access

$additional_phone_numbers = get_field('additional_phone_numbers', 'option');

if( !empty($additional_phone_numbers) ):
	
	echo '<ul class="rsm-additional-phones key-value-list">';
	foreach($additional_phone_numbers as $row){
		echo '<li>';
			echo '<span class="key">'.$row['phone_label'].'</span>';
			echo '<span class="value">'.$row['phone_number'].'</span>';
		echo '</li>';
	}
	echo '</ul>';
	
endif;