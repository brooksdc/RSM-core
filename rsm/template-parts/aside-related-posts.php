<?php
/**
 * Related posts based on Tags
 */

$orig_post = $post;
global $post;
$tags = wp_get_post_tags($post->ID);
 
if ($tags):

    $tag_ids = array();
    foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;

    $args = array(
        'tag__in' => $tag_ids,
        'post__not_in' => array($post->ID),
        'posts_per_page'=> 3, // Number of related posts to display.
        'ignore_sticky_posts'=>1
    );
     
    $relatedContent = new WP_Query( $args );

    if($relatedContent->have_posts()): ?>
    
    <aside id="related-posts" class="aside">
    
        <div class="aside__header">
            <h3 class="aside__title">Related Content</h3>
        </div>
        
        <div class="aside__body">
            <div class="row">
                <?php while( $relatedContent->have_posts() ):
                    $relatedContent->the_post(); ?>
                 
                    <div class="col-sm-8">
                        <?php get_template_part('content', 'aside'); ?>
                    </div><!-- .col -->
             
                <?php endwhile; ?>
            </div><!-- .row -->
        </div><!-- .aside__related__body -->

    </aside> <!--#related-posts-->  
<?php
    endif;
endif;
$post = $orig_post;
wp_reset_query();
?>
