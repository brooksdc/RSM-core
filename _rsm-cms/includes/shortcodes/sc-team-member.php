<?php
/**
 * SHORTCODE: Team Member. (Requires ID to be set)
 *
 * This shortcode will output the template
 * file from the templates/folder.
 *
 * @since 1.0.0
 *
 * --> [rsm_team_member id=##]
 *
 */
function rsm_sc_team_member($atts) {

	// setup attriutes for use in get_template function
	extract( shortcode_atts( array(
		'id' => null,
	), $atts ) );

	if(!empty($atts)) {
		$args = array( 'id' => $atts['id']);
	} else {
		$args = null;
	}
	
	ob_start();
	rsm_get_template( 'rsm-team-member.php', $args );
	return ob_get_clean();

}
add_shortcode( 'rsm_team_member', 'rsm_sc_team_member' );

