<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package rsm_core_
 */

if ( ! function_exists( 'the_posts_navigation' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 */
function the_posts_navigation() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation posts-navigation" role="navigation">
		<div class="sr-only"><?php _e( 'Posts navigation', 'quantus' ); ?></div>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( 'Older posts', 'quantus' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts', 'quantus' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;


if( ! function_exists( 'infinite_post_navigation' ) ):
/**
 *  Infinite next and previous post looping in WordPress
 */
function infinite_post_navigation() {
	/**
	 *  Infinite next and previous post looping in WordPress
	 */
	?>
	<nav class="navigation post-navigation" role="navigation">
		<div class="sr-only"><?php _e( 'Post navigation', 'video_marketing' ); ?></div>
		<div class="nav-links row">
			<div class="col-sm-12 nav-links__left">
				<?php
				if( get_adjacent_post(false, '', true) ) { 
					previous_post_link( '<div class="nav-previous">%link</div>', '%title' );
				} else { 
				    $first = new WP_Query('posts_per_page=1&order=DESC'); $first->the_post();
				    	//echo '<a href="' . get_permalink() . '">&larr; Previous Post</a>';
				    	echo '<div class="nav-previous"><a href="'.esc_attr( get_the_permalink() ).'" rel="prev">'.get_the_title().'</a></div>';
				  	wp_reset_query();
				};
				?> 
			</div>
			<div class="col-sm-12 nav-links__right">
				<?php   
				if( get_adjacent_post(false, '', false) ) { 
					next_post_link( '<div class="nav-next">%link</div>', '%title' );
				} else { 
					$last = new WP_Query('posts_per_page=1&order=ASC'); $last->the_post();
				    	//echo '<a href="' . get_permalink() . '">Next Post &rarr;</a>';
						echo '<div class="nav-next"><a href="'.esc_attr( get_the_permalink() ).'" rel="next">'.get_the_title().'</a></div>';
				    wp_reset_query();
				};
				?>
			</div>
		</div><!-- .nav-links -->
	</nav><!-- .navigation --> 
	<?php
}
endif;


if ( ! function_exists( 'the_post_navigation_custom' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 */
function the_post_navigation_custom() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
	
		<div class="sr-only"><?php _e( 'Post navigation', 'video_marketing' ); ?></div>
		<div class="nav-links row">
			<div class="col-sm-12 nav-links__left">
				<?php previous_post_link( '<div class="nav-previous">%link</div>', '%title' ); ?>
			</div>
			<div class="col-sm-12 nav-links__right">
				<?php next_post_link( '<div class="nav-next">%link</div>', '%title' ); ?>
			</div>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;


if ( ! function_exists( 'rsm_core_posted_on_by' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function rsm_core_posted_on_by() {
	$time_string = '<time class="entry-date published updated" itemprop="datePublished" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" itemprop="datePublished" datetime="%1$s">%2$s</time><time class="updated sr-only" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date( 'F j, Y' ) ), //set PHP date format here
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date( 'F j, Y' ) ) //set PHP date format here
	);

	$posted_on = sprintf(
		_x( '%s', 'post date', 'quantus' ),
		$time_string
	);

	$byline = sprintf(
		_x( 'by %s', 'post author', 'quantus' ),
		'<span class="author vcard">' . esc_html( get_the_author() ) . '</span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>';

}
endif;

if ( ! function_exists( 'rsm_core_post_date' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time ONLY.
 */
function rsm_core_post_date() {
	$time_string = '<time class="entry-date published updated" itemprop="datePublished" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" itemprop="datePublished" datetime="%1$s">%2$s</time><time class="updated sr-only" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date( 'F j, Y' ) ), //set PHP date format here
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date( 'F j, Y' ) ) //set PHP date format here
	);

	$posted_on = sprintf(
		_x( '%s', 'post date', 'quantus' ),
		$time_string
	);

	echo '<span class="posted-on">' . $posted_on . '</span>';

}
endif;

if ( ! function_exists( 'rsm_core_post_author' ) ) :
/**
 * Prints HTML with meta information for the post author ONLY.
 */
function rsm_core_post_author() {
	
	$byline = sprintf(
		_x( 'by %s', 'post author', 'quantus' ),
		'<span class="author vcard">' . esc_html( get_the_author() ) . '</span>'
	);

	echo '<span class="byline"> ' . $byline . '</span>';

}
endif;

if ( ! function_exists( 'rsm_core_post_cats' ) ) :
/**
 * Prints HTML with meta information for the post categories
 */
function rsm_core_post_cats($label = null) {

	// Check if a label is declared in the function call
	if($label) {
		$cat_label = $label;
	} else {
		$cat_label = null; //'Posted in:'
	}

	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( __( ', ', 'quantus' ) );
		if ( $categories_list && rsm_core_categorized_blog() ) {
			printf( '<span class="cat-links">' . __( '<span class="title">'.$cat_label.'</span> %1$s', 'quantus' ) . '</span>', $categories_list );
		}
	}

}
endif;

if ( ! function_exists( 'rsm_core_post_tags' ) ) :
/**
 * Prints HTML with meta information for the post tags.
 */
function rsm_core_post_tags($label = null) {

	// Check if a label is declared in the function call
	if($label) {
		$tag_label = $label;
	} else {
		$tag_label = null; //'Tagged:'
	}

	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {
		
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', __( ', ', 'quantus' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . __( '<span class="title">'.$tag_label.'</span> %1$s', 'quantus' ) . '</span>', $tags_list );
		}
	}

}
endif;


if ( ! function_exists( 'rsm_core_custom_excerpt' ) ) :
/**
 * Prints excerpt string with custom length
 */
function rsm_core_custom_excerpt($length = null) {

	// Check if a character count is declared in the function call
	if($length) {
		$string_length = $length;
	} else {
		$string_length = 175;
	}

	// custom excerpt
	$custom_excerpt = get_the_content();
	$excerpt_string = strip_tags($custom_excerpt);
	if (strlen($excerpt_string) > $string_length) {

	    // truncate string
	    $stringCut = substr($excerpt_string, 0, $string_length);
		// make sure it ends in a word so assassinate doesn't become ass...
	    $excerpt_string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
	} 

	echo '<p>'.$excerpt_string.'</p>';

}
endif;


if ( ! function_exists( 'rsm_core_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function rsm_core_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( __( ', ', 'quantus' ) );
		if ( $categories_list && rsm_core_categorized_blog() ) {
			printf( '<span class="cat-links">' . __( 'Posted in %1$s', 'quantus' ) . '</span>', $categories_list );
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', __( ', ', 'quantus' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . __( 'Tagged %1$s', 'quantus' ) . '</span>', $tags_list );
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( __( 'Leave a comment', 'quantus' ), __( '1 Comment', 'quantus' ), __( '% Comments', 'quantus' ) );
		echo '</span>';
	}

	edit_post_link( __( 'Edit', 'quantus' ), '<span class="edit-link">', '</span>' );
}
endif;



/**
 * Customized verion of core function the_archive_title()
 */
if ( ! function_exists( 'rsm_archive_title' ) ) :
function rsm_archive_title( $before = '', $after = '' ) {
	$title = rsm_get_archive_title();

	if ( ! empty( $title ) ) {
		echo $before . $title . $after;
	}
}
endif;

/**
 * Customized version of core function get_the_archive_title()
 */
if ( ! function_exists( 'rsm_get_archive_title' ) ) :
function rsm_get_archive_title() {
	if ( is_category() ) {
		/* translators: Category archive title. 1: Category name */
		$title = sprintf( __( '<span class="archive-label">Category</span> %s' ), single_cat_title( '', false ) );
	} elseif ( is_tag() ) {
		/* translators: Tag archive title. 1: Tag name */
		$title = sprintf( __( '<span class="archive-label">Tag</span> %s' ), single_tag_title( '', false ) );
	} elseif ( is_author() ) {
		/* translators: Author archive title. 1: Author name */
		$title = sprintf( __( '<span class="archive-label">Author</span> %s' ), '<span class="vcard">' . get_the_author() . '</span>' );
	} elseif ( is_year() ) {
		/* translators: Yearly archive title. 1: Year */
		$title = sprintf( __( 'Year: %s' ), get_the_date( _x( 'Y', 'yearly archives date format' ) ) );
	} elseif ( is_month() ) {
		/* translators: Monthly archive title. 1: Month name and year */
		$title = sprintf( __( 'Month: %s' ), get_the_date( _x( 'F Y', 'monthly archives date format' ) ) );
	} elseif ( is_day() ) {
		/* translators: Daily archive title. 1: Date */
		$title = sprintf( __( 'Day: %s' ), get_the_date( _x( 'F j, Y', 'daily archives date format' ) ) );
	} elseif ( is_tax( 'post_format' ) ) {
		if ( is_tax( 'post_format', 'post-format-aside' ) ) {
			$title = _x( 'Asides', 'post format archive title' );
		} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
			$title = _x( 'Galleries', 'post format archive title' );
		} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
			$title = _x( 'Images', 'post format archive title' );
		} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
			$title = _x( 'Videos', 'post format archive title' );
		} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
			$title = _x( 'Quotes', 'post format archive title' );
		} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
			$title = _x( 'Links', 'post format archive title' );
		} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
			$title = _x( 'Statuses', 'post format archive title' );
		} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
			$title = _x( 'Audio', 'post format archive title' );
		} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
			$title = _x( 'Chats', 'post format archive title' );
		}
	} elseif ( is_post_type_archive() ) {
		/* translators: Post type archive title. 1: Post type name */
		$title = sprintf( __( 'Archives: %s' ), post_type_archive_title( '', false ) );
	} elseif ( is_tax() ) {
		$tax = get_taxonomy( get_queried_object()->taxonomy );
		/* translators: Taxonomy term archive title. 1: Taxonomy singular name, 2: Current taxonomy term */
		$title = sprintf( __( '%1$s: %2$s' ), $tax->labels->singular_name, single_term_title( '', false ) );
	} else {
		$title = __( 'Archives' );
	}

	/**
	 * Filters the archive title.
	 *
	 * @since 4.1.0
	 *
	 * @param string $title Archive title to be displayed.
	 */
	return apply_filters( 'rsm_get_archive_title', $title );
}
endif;


/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function rsm_core_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'rsm_core_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'rsm_core_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so rsm_core_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so rsm_core_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in rsm_core_categorized_blog.
 */
function rsm_core_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'rsm_core_categories' );
}
add_action( 'edit_category', 'rsm_core_category_transient_flusher' );
add_action( 'save_post',     'rsm_core_category_transient_flusher' );


/**
 * Display post author v-card
 */
if( !function_exists('rsm_author_vcard') ):
function rsm_author_vcard() {

	echo '<aside id="author-vcard">';
		echo '<div class="author-vcard__inner">';
			echo get_avatar( get_the_author_meta( 'ID' ), 95, '', get_the_author_meta( 'display_name' ) );
			echo '<h4 class="name">'.get_the_author_meta('display_name').'</h4>';
			echo '<p class="bio">'.get_the_author_meta('description').'</p>';
		echo '</div><!--.v-center-->';
	echo '</aside><!--author-vcard-->';

}
endif;
