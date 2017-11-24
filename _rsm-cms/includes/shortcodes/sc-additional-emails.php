<?php
/**
 * SHORTCODE: Additional Emails.
 *
 * This shortcode will output the template
 * file from the templates/folder.
 *
 * @since 1.0.0
 */
function rsm_sc_additional_emails() {

	ob_start();
	rsm_get_template( 'rsm-additional-emails.php' );
	return ob_get_clean();
	

}
add_shortcode( 'rsm_additional_emails', 'rsm_sc_additional_emails' );
