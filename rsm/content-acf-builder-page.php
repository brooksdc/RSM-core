<?php
/**
 ACF flexible fields
 Ref: https://www.advancedcustomfields.com/resources/flexible-content/
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <?php if(!is_front_page()) {
        get_template_part('template-parts/entry-header');
    } ?>

    <div class="entry-content">

        <?php
        if( have_rows('page_layout_blocks') ):

            // start a counter for this fleixble set to assign IDs, if necessary.
            $key = -1;

             // loop through the rows of data
            while ( have_rows('page_layout_blocks') ) : the_row();

                $key++;

                // NEW General Columns Section (UPDATE THIS TO THE NEW name in the flex fields list)
                // ** Requires ACF field group from Quantus build ***
                if( get_row_layout() == 'general_custom_col_section' ):
                    // using the unique KEY in these templates
                    include(locate_template('template-parts/part-general-col-layout.php'));

                // Custom post Query
                elseif( get_row_layout() == 'custom_post_query' ):

                     get_template_part('template-parts/part-custom-post-query');

                // 1:1 Block / 2-column Split
                elseif( get_row_layout() == '1:1_block_2_column_split' ):
                    // using the unique KEY in these templates
                    include(locate_template('template-parts/part-two-column-split.php'));

                // General tabs
                elseif( get_row_layout() == 'general_tabs' ):
                    // using the unique KEY in these templates
                    include(locate_template('template-parts/part-general-tabs.php'));

                // Global Content Parts
                // This option is a list of non-editable global parts for display
                elseif( get_row_layout() == 'global_content_part' ):

                    $global_part = get_sub_field('global_part');

                    if( $global_part == 'entry-points-a' ) :
                        get_template_part('template-parts/part-entry-points-a');
                    
                    elseif ( $global_part == 'instagram' ) :
                        get_template_part('template-parts/part-instagram');
                    
                    elseif ( $global_part == 'cta-bar-a' ) :
                        get_template_part('template-parts/part-cta-bar-a');

                    elseif ( $global_part == 'contact-info-block-a' ) :
                        get_template_part('template-parts/part-contact-info-block-a');

                    elseif ( $global_part == 'contact-options-bar' ) :
                        get_template_part('template-parts/part-contact-options-bar');

                    elseif ( $global_part == 'credibility-block' ) :
                        get_template_part('template-parts/part-credibility-block');

                    elseif ( $global_part == 'google-map-block' ) :
                        get_template_part('template-parts/part-google-map-block');

                    endif;


                // Mosaic Gallery section
                elseif( get_row_layout() == 'general_mosaic_gallery_section' ):

                    $page_builder_mosaic = get_sub_field('gallery');
                    include(locate_template('template-parts/part-mosaic-gallery.php'));

                // Entry Points
                elseif( get_row_layout() == 'entry_points_section' ):

                    get_template_part('template-parts/part-entry-points');

                endif;

            endwhile;

        endif;
        ?>

    </div><!-- .entry-content -->

</article><!-- #post-## -->