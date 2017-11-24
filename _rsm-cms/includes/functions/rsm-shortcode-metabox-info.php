<?php
/*
 Add metaboxes to various custom Post types to display their dynamic shortcode for easy copy and paste.
 */

/*
 Testimonial
 */
function rsm_testimonial_sc_meta_box_markup()
{
	global $post;

    wp_nonce_field(basename(__FILE__), "meta-box-nonce");

    ?>
        <input name="meta-box-text" type="text" value="[rsm_testimonial id=<?php echo $post->ID; ?>]" readonly>
    <?php  
}

function add_rsm_testimonial_sc_meta_box()
{
    add_meta_box("rsm-testimonial-shortcode-metabox", "Display with shortcode:", "rsm_testimonial_sc_meta_box_markup", "rsm_testimonial", "side", "high", null);
}

add_action("add_meta_boxes", "add_rsm_testimonial_sc_meta_box");


/*
 Team member
 */
function rsm_team_member_sc_meta_box_markup()
{
	global $post;

    wp_nonce_field(basename(__FILE__), "meta-box-nonce");

    ?>
        <input name="meta-box-text" type="text" value="[rsm_team_member id=<?php echo $post->ID; ?>]" readonly>
    <?php  
}

function add_rsm_team_member_sc_meta_box()
{
    add_meta_box("rsm-testimonial-shortcode-metabox", "Display with shortcode:", "rsm_team_member_sc_meta_box_markup", "rsm_team_member", "side", "high", null);
}

add_action("add_meta_boxes", "add_rsm_team_member_sc_meta_box"); 