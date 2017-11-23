<?php
/**
 * General tabs
 */

$rsm_general_tabs = get_sub_field('tabs');
$rsm_general_tabs_id = get_sub_field('section_id');
$rsm_general_tabs_class = get_sub_field('section_class');


if($rsm_general_tabs):
	echo '<section id="'.$rsm_general_tabs_id.'" class="section section--general-tabs '.$rsm_general_tabs_class.'">';
		echo '<div class="container">';

			$tab_count = count($rsm_general_tabs);
			
			echo '<div class="rsm-general-tabs">';
				// navigation
				$nav_i = 0;
				echo '<ul class="rsm-general-tabs__nav nav nav-pills" role="tablist">';
				foreach($rsm_general_tabs as $id => $nav) {
					
					if($nav_i == 0) {
						$active_class = 'active';
					} else {
						$active_class = null;
					}

					echo '<li role="presentation" class="'.$active_class.'"><a href="#t'.$id.'" aria-controls="t'.$id.'" role="tab" data-toggle="tab">'.$nav['tab_label'].'</a></li>';

					$nav_i++;
				}
				echo '</ul>';

				// tab content
				$tab_i = 0;
				echo '<div class="rsm-general-tabs__content tab-content">';
					foreach($rsm_general_tabs as $id => $tab) {

						if($tab_i == 0) {
							$active_class = 'in active';
						} else {
							$active_class = null;
						}

						echo '<div role="tabpanel" class="tab-pane fade '.$active_class.'" id="t'.$id.'">';
							echo '<h3 class="tab-pane__title">'.$tab['tab_label'].'</h3>';
							echo $tab['tab_content'];
						echo '</div>';

						$tab_i++;
					}
				echo '</div>';
			echo '</div>'; //.tabs

		echo '</div>';
	echo '</section>';
endif;