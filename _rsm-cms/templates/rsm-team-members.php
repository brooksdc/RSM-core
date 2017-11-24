<?php
/**
 * Team Members Shortcode Template.
 *
 * This template can be overriden by copying this file to your-theme/rsm-templates/
 *
 * @author 		RSM
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Don't allow direct access


$queryArgs = array(
	'post_type' => 'rsm_team_member',
	'posts_per_page' => -1
);
$query = new WP_Query($queryArgs);

// REQUIRES the team member shortcode for output.
if($query->have_posts()):

	echo '<section class="rsm-team-members">';
		echo '<div class="container">';
			echo '<div class="row">';
				while($query->have_posts()):
					$query->the_post();

					// this shortcode is already setup to grab the post ID within it as a fallback.
					echo '<div class="col-sm-8">';
						echo do_shortcode('[rsm_team_member]');
					echo '</div>';

				endwhile;
			echo '</div>';
		echo '</div>';
	echo '</section>';
endif;
wp_reset_postdata();


