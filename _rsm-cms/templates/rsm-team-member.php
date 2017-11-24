<?php
/**
 * Team Member Shortcode Template.
 *
 * This template can be overriden by copying this file to your-theme/rsm-templates/
 *
 * @author 		RSM
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Don't allow direct access


// check if ID attributes is set

if( !isset($args['id']) ) {
	$id = null;
} else {
	$id = $args['id'];
}
$post = get_post($id);

$team_member_position = get_field('rsm_team_member_position', $id);
$team_member_credentials = get_field('rsm_team_member_credentials', $id);
$team_member_short_bio = get_field('rsm_team_member_short_bio', $id);
$team_member_full_bio = get_field('rsm_team_member_full_bio', $id);
$team_member_contact_options = get_field('rsm_team_member_contact_options', $id);

// categories
$team_member_cats = wp_get_post_terms( $id, 'rsm_team_member_dept' ); 

// output
if($post):
	
	// converting this to the post ID here so it can be used with standard queries that don't have an ID set.
	$id = $post->ID;

	echo '<div id="team-member-'.$id.'" class="rsm-team-member">';
	
		if( has_post_thumbnail($id) ) {
			echo '<span class="rsm-team-member__image-holder">';
				echo get_the_post_thumbnail($id, 'thumbnail', array( 'class' => 'rsm-team-member__image' ));
			echo '</span>';
		}	

		echo '<div class="rsm-team-member__bottom">';

		
		if($team_member_cats) {
			echo '<span class="rsm-team-member__depts">';
			$i = 0;
			$count_cats = count($team_member_cats); 
			foreach($team_member_cats as $cat){
				$this_cat = get_term($cat);

				if($i >= 1 && $i != $count_cats) { 
					echo ', ';
				}
				echo $this_cat->name;

				$i++;
			}
			echo '</span>';
		}

		echo '<h3 class="rsm-team-member__name">'.$post->post_title;
			if($team_member_credentials) {
				echo ', <span class="credentials">'.$team_member_credentials.'</span>';
			}
		echo '</h3>';

		if($team_member_position) {
			echo '<p class="rsm-team-member__position">'.$team_member_position.'</p>';
		}

		if($team_member_short_bio) {
			echo '<div class="rsm-team-member__summary">'.$team_member_short_bio.'</div>';
		}

		if( $team_member_contact_options['email'] || $team_member_contact_options['phone'] ){

			echo '<ul class="rsm-team-member__contact list--inline list--bar-after">';
				foreach($team_member_contact_options as $li) {
					
					if( !empty($li) ){
						
						if($li['phone']) {
							echo '<li>'.do_shortcode($li).'</li>';
						}
						elseif($li['email']){
							echo '<li>'.obfuscate($li).'</li>'; //this function stops everything below it here for some reason.
						}
						
					}
				}
			echo '</ul>';
		}

		echo '</div>'; // .rsm-team-member__bottom

	echo '</div>';
	
endif;
