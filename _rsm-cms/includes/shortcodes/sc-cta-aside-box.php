<?php
/**
 * SHORTCODE: CTA Aside Box.
 *
 * This shortcode will output the template
 * file from the templates/folder.
 *
 * @since 1.0.0
 */
function rsm_sc_cta_aside_box() {

	ob_start();
	rsm_get_template( 'rsm-cta-aside-box.php' );
	return ob_get_clean();

}
add_shortcode( 'rsm_cta_aside_box', 'rsm_sc_cta_aside_box' );
