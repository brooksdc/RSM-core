<?php
//custom page option meta
$custom_header_headline_tag = get_field('custom_header_headline_tag');
$custom_header_headline = get_field( 'custom_header_headline');
$custom_header_hide_title = get_field( 'custom_header_hide_title');

$custom_section_title = get_field( 'custom_section_title');

//conditional to use <h1> tag or not on page title
$use_default_h1 = true;
if($custom_header_headline_tag == 'no') {
	$use_default_h1 = false;
}

/*// live/local testing setup
$site_url = get_site_url();
if (strpos($site_url, '.com') !== FALSE) {
	//live site

} else {
	//local dev
}*/
?>

<header class="entry-header">


	<?php if($custom_header_hide_title != 'on') {
		if(!empty($custom_header_headline)) {
			if($use_default_h1) {
				echo '<h1 class="entry-title sr-only">'.get_the_title().'</h1>';	
			}
			echo '<div class="h1 entry-title">'.$custom_header_headline.'</div>';
		} else {
			if($use_default_h1) {
				echo '<h1 class="entry-title">'.get_the_title().'</h1>';
			} else {
				echo '<div class="entry-title h1">'.get_the_title().'</div>';
			}
		}
	} else {
		the_title( '<h1 class="entry-title sr-only">', '</h1>' );
	} ?>

</header><!-- .entry-header -->

<?php get_template_part('template-parts/breadcrumbs'); ?>
