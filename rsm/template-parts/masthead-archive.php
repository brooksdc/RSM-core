<?php
/**
 * Dynamic masthead for Archive, Taxonomy and Search pages.
 *
 * Controlled by global settings set in options panel.
 */

$blog_id = get_option('page_for_posts');

//---
// Options data
//---
$rsm_archive_title_alignment = get_field('rsm_archive_title_alignment', 'option');


//---
// Determine image
//---
$feature_img = null;
/**
 * @todo add image to categories? 
 * @todo add image for 404?
 *
if($rsm_page_masthead_image) {
	// custom masthead image
	$feature_img = $rsm_page_masthead_image;
} elseif(has_post_thumbnail($post_id)) {
	// feature image fallback
	$feature_img_id = get_post_thumbnail_id($post_id);
	$feature_img_src = wp_get_attachment_image_src( $feature_img_id, 'masthead');
	$feature_img = $feature_img_src[0];
} else {
	// no image. check if global masthead image set?
	$feature_img = null; //get_bloginfo('template_directory').'/images/masthead-placeholder.jpg';
}
*/

//---
// Determine alignment
//---
if( $rsm_archive_title_alignment ) {
	
	// global alignment setting
	$content_alignment_classes = $rsm_archive_title_alignment['vertical_align'].' '.$rsm_archive_title_alignment['horizontal_align'];

} else {
	// default fallback alignment class settings
	$content_alignment_classes = 'v-middle text-left';
}


/**
 * @todo Setup different style options: full-height, standard height, parallax.
 */
?>

<div class="entry-masthead entry-masthead--archive" style="background-image: url('<?php _e($feature_img); ?>');">
	
	<div class="container">

		<div class="entry-masthead__inner v-align">
		
			<div class="entry-masthead__content <?php _e($content_alignment_classes); ?>">
				
				
				<?php
				/**
				 * Title
				 */
				if( is_home() ) {
					echo '<h1 class="entry-masthead__title">'.get_the_title( $blog_id ).'</h1>';
				}
				elseif ( is_archive() ) {
					rsm_archive_title('<h1 class="entry-masthead__title">', '</h1>');
					the_archive_description( '<div class="entry-masthead__description">', '</div>' );
				}
				elseif ( is_search() ) {

					if ($_GET['s'] == '') {
						echo '<h1 class="entry-masthead__title">Search | '.get_bloginfo('name').'</h1>';
					}
					elseif ( have_posts() ) {
						echo '<h1 class="entry-masthead__title">';
							printf( __( 'Search Results for "%s"', 'quantus' ), '<span>' . get_search_query() . '</span>');
						echo '</h1>';	
					}
					else {
						echo '<h1 class="entry-masthead__title">Nothing Found</h1>';
					}

					echo '<span class="entry-masthead__search-holder">';
						get_search_form();
					echo '</span>';
				}
				elseif ( is_404() ) {
					echo '<h1 class="entry-masthead__title">404. Page Not Found.</h1>';
				}
				?>


			</div><!-- .entry-masthead__content -->

		</div><!-- .entry-masthead__inner -->
	
	</div><!-- .container -->

</div><!-- .entry-masthead -->
