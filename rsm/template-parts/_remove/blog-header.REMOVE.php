<?php
/*
 This can be included on the index page to set the blog index page title.
 */
 
$blog_id = get_option('page_for_posts');

if($blog_id){
	$blog_custom_title = get_field( 'custom_header_headline' );

	if($blog_custom_title) {
		$blog_headline = $blog_custom_title;
	} else {
		$blog_headline = get_the_title($blog_id);
	}
} else {
	//if no blog page set
	$blog_headline = 'Blog';
}
?>

<header class="blog-header">
	
	<h1 class="entry-title"><?php echo $blog_headline; ?></h1>
	
</header><!-- .entry-header -->

<?php get_template_part('template-parts/breadcrumbs'); ?>