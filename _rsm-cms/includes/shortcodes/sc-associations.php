<?php
/**
 * SHORTCODE: Associations
 *
 * This shortcode will output the template
 * file from the templates/folder.
 *
 * @since 1.0.0
 */
function rsm_sc_associations() {

	ob_start();
	rsm_get_template( 'rsm-associations.php' );
	return ob_get_clean();

}
add_shortcode( 'rsm_associations', 'rsm_sc_associations' );
