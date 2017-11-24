<?php
/**
 * Business Hours Shortcode Template.
 *
 * This template can be overriden by copying this file to your-theme/rsm-templates/
 *
 * @author 		RSM
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Don't allow direct access

$business_hours = get_field('business_hours', 'option');

if( !empty($business_hours) ):
	
	echo '<ul class="rsm-business-hours key-value-list">';
	foreach($business_hours as $hours){
		echo '<li>';
			echo '<span class="key">'.$hours['hours_label'].'</span>';
			echo '<span class="value">'.$hours['hours_time'].'</span>';
		echo '</li>';
	}
	echo '</ul>';
	
endif;