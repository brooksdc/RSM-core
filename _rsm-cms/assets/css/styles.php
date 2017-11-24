<?php
/*****************************************************
 * ADMIN STYLES
 * Add WP men icon here and customize your CPT admin styles
 */

function add_custom_admin_styles() {
?>
<?php
$plugin_url = plugin_dir_url( __FILE__ );
?>
<style>
/*#adminmenu .toplevel_page_acf-options-social-networks-and-tracking-codes div.wp-menu-image:before,
#adminmenu .menu-icon-rsm_testimonial div.wp-menu-image:before,
#adminmenu .menu-icon-rsm_team_member div.wp-menu-image:before,
#adminmenu .menu-icon-rsm_promotion div.wp-menu-image:before,
#adminmenu .menu-icon-rsm_project div.wp-menu-image:before,
#adminmenu .menu-icon-rsm_job_posting div.wp-menu-image:before {
    content: '';
    background: url('<?php echo $plugin_url ?>../images/admin-icon.png') no-repeat 0 0 transparent;
    background-size: 19px 19px;
    background-position: center;
}*/
#adminmenu .toplevel_page_acf-options-social-networks-and-tracking-codes div.wp-menu-image:before {
  content: "\f111";
  font-family: 'dashicons';
}
#adminmenu .menu-icon-rsm_testimonial div.wp-menu-image:before {
  content: '\f122';
  font-family: 'dashicons';
}
#adminmenu .menu-icon-rsm_team_member div.wp-menu-image:before {
  content: "\f336";
  font-family: 'dashicons';
}
#adminmenu .menu-icon-rsm_promotion div.wp-menu-image:before {
  content: "\f488";
  font-family: 'dashicons';
}
#adminmenu .menu-icon-rsm_project div.wp-menu-image:before {
  content: "\f233";
  font-family: 'dashicons';
}
#adminmenu .menu-icon-rsm_job_posting div.wp-menu-image:before {
  content: "\f109";
  font-family: 'dashicons';
}

/* ACF */
.acf-field-flexible-content {
  background-color: #d0f5d0;
}
.acf-flexible-content .layout .acf-fc-layout-handle {
  background-color: #90ee90;
}

.acf-field-group[data-name*="_col_layout_options"] {
  background: #ffffac;
}
.acf-field-group[data-name*="_col_layout_options"] .acf-field {
  background: lightyellow;
}

.acf-field.sub-header {
  background: #90ee90;
  position: relative;
  padding-top: 30px;
}
.acf-field.sub-header:after {
  content: "";
  display: block;
  border-top: 10px solid lightgreen;
  border-left: 10px solid transparent;
  border-right: 10px solid transparent;
  position: absolute;
  top: 100%;
  z-index: 1;
}
.acf-field.sub-header .acf-label {
  font-size: 14px;
  margin: 0;
}

#acf-custom-page-options.postbox {
  background: #e9e9e9;
}
.acf-table > tbody > tr > td {
  border-bottom-width: 10px;
}

.shortcode-well {
  background: #eee;
  display: block;
  padding: 5px;
  border-bottom: 1px solid #fff;
}

/* Thumbnails for layout style in options panel*/
.rsm-layout-ref {
  display: inline-block;
  margin-right: 10px;
}
.rsm-layout-ref > span {
  display: block;
  width: 144px;
  height: 107px;
  background-repeat: no-repeat;
  background-position: center;
  -webkit-background-size: 100% auto;
  background-size: 100% auto;
  border: 1px solid #ccc;
}
.rsm-layout-ref span.entry-point-a-thumb {
  background-image: url('<?php echo $plugin_url ?>../images/options/entry-point-layout-a.jpg');
}
.rsm-layout-ref span.entry-point-b-thumb {
  background-image: url('<?php echo $plugin_url ?>../images/options/entry-point-layout-b.jpg'); 
}
.rsm-layout-ref span.entry-point-c-thumb {
  background-image: url('<?php echo $plugin_url ?>../images/options/entry-point-layout-c.jpg'); 
}
.rsm-layout-ref span.entry-point-d-thumb {
  background-image: url('<?php echo $plugin_url ?>../images/options/entry-point-layout-d.jpg'); 
}
.rsm-layout-ref span.entry-point-d-thumb {
  background-image: url('<?php echo $plugin_url ?>../images/options/entry-point-layout-d.jpg'); 
}
.rsm-layout-ref span.header-layout-1-thumb {
  background-image: url('<?php echo $plugin_url ?>../images/options/header-layout-1.jpg'); 
}
.rsm-layout-ref span.header-layout-2-thumb {
  background-image: url('<?php echo $plugin_url ?>../images/options/header-layout-2.jpg'); 
}


</style> 
<?php }
add_action( 'admin_head', 'add_custom_admin_styles' ); ?>