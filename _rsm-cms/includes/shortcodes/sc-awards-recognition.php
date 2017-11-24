<?php
/**
 * SHORTCODE: Awards / Recognition
 *
 * This shortcode will output the template
 * file from the templates/folder.
 *
 * @since 1.0.0
 */
function rsm_sc_awards_recognition() {

	ob_start();
	rsm_get_template( 'rsm-awards-recognition.php' );
	return ob_get_clean();

}
add_shortcode( 'rsm_awards_recognition', 'rsm_sc_awards_recognition' );
