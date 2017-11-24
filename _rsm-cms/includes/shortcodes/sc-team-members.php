<?php
/**
 * SHORTCODE: Team Members. Display all
 *
 * This shortcode will output the template
 * file from the templates/folder.
 *
 * @since 1.0.0
 *
 * --> [rsm_team_members]
 *
 */
function rsm_sc_team_members($atts) {

	
	ob_start();
	rsm_get_template( 'rsm-team-members.php' );
	return ob_get_clean();

}
add_shortcode( 'rsm_team_members', 'rsm_sc_team_members' );

