<?php
/**
 Default 2-col Layout
 */
global $primary_classes, $secondary_classes, $primary_classes_rev, $secondary_classes_rev;

$general_2col_layout_config = get_sub_field('general_2col_layout_config');
$general_2col_layout_id = get_sub_field('general_2col_layout_id');
$general_2col_layout_class = get_sub_field('general_2col_layout_class');
$general_2col_layout_primary = get_sub_field('general_2col_layout_primary');
$general_2col_layout_secondary = get_sub_field('general_2col_layout_secondary');


// layout classes
// if sidebar-left is used, set it up some that column is only left on desktop and bottom on mobile.
if($general_2col_layout_config == 'sidebar-left'){
    $primary_col_class = $primary_classes_rev;
    $secondary_col_class = $secondary_classes_rev;
}
elseif ($general_2col_layout_config == 'split') {
    $primary_col_class = 'col-sm-12';
    $secondary_col_class = 'col-sm-12';
}
else {
    $primary_col_class = $primary_classes;
    $secondary_col_class = $secondary_classes;
}

// markup
if( $general_2col_layout_primary || $general_2col_layout_secondary ):
    
    echo '<section id="'.$general_2col_layout_id.'" class="section section--page-builder section--2col-layout '.$general_2col_layout_class.'">';

        echo '<div class="container">';
            
            echo '<div class="row">';

                echo '<div class="'.$primary_col_class.'">';
                    if ($general_2col_layout_primary) {
                        echo $general_2col_layout_primary;
                    }
                echo '</div>';

                 echo '<div class="'.$secondary_col_class.'">';
                    if ($general_2col_layout_secondary) {
                        echo $general_2col_layout_secondary;
                    }
                echo '</div>';
            
            echo '</div>';
           
			
        echo '</div>';
	echo '</section>';

endif;
