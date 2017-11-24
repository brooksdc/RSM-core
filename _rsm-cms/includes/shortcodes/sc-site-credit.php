<?php
/**
 * SHORTCODE: Site Credit.
 *
 * This shortcode will output the template
 * file from the templates/folder.
 *
 * @since 1.0.0
 */
function rsm_sc_site_credit() {

	ob_start();
	rsm_get_template( 'rsm-site-credit.php' );
	return ob_get_clean();
}
add_shortcode( 'rsm_site_credit', 'rsm_sc_site_credit' );
