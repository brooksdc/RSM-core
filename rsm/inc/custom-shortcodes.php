<?php
/**
 * Custom Shortcodes built to work with this theme
 * @todo Find a good way to build in options for setting a custom title, link text and url.
 */

/*********************************************************************
 * RSM - TESTIMONIAL CAROUSEL. Initialize an owl carousel.

 * Display options:
 *
 * [rsm_testimonial_carousel ids="70,60"] //sets specific IDs
 * [rsm_testimonial_carousel max="3"] //pull all IDs, but limits to a max count
 * [rsm_testimonial_carousel] //display all 
 */
if( !function_exists('register_testimonial_carousel_shortcode') ):
function register_testimonial_carousel_shortcode($atts){

    extract(shortcode_atts(array(
        'type' => 'rsm_testimonial', //any posts by default (options: 'post', 'page', 'any', or custom post type name)
        'ids' => '',
        'max' => null, //set a maximum number of posts if no ID is set (will pull latest posts)
        ), $atts));
    //convert string to integers...
   	$id_array = array_map('intval', explode(',', $ids));


   	if($id_array[0] == null && !isset($atts['max'])) {
   		//no IDs set, no max set
   		$posts_per_page = -1;
   		$post__in = null;

   	} elseif( $id_array[0] == null && $atts['max'] ) {
   		//has no ID, but a MAX set
   		$posts_per_page = $atts['max'];
   		$post__in = null;

   	} elseif( $id_array[0] != null ) {
   		// has IDs set, overrides max
   		$post__in = $id_array;
   		$posts_per_page = null;
   	}

    $testimonialLoop = new WP_Query( array( 
        'post_type' => 'rsm_testimonial',
        'post__in' => $post__in,
        'posts_per_page' => $posts_per_page,
        'orderby' => 'post__in', 
    ) );


    ob_start();

    //get posts in array
    $posts = $testimonialLoop->get_posts();


    	//creat unique ID for carousel based on post IDs included...
    	$unique_carousel_id = 'rsm-';
    	$i = 0;
    	foreach($posts as $post) {
    		$unique_carousel_id .= $post->ID;
    		//add extra count number to help make number more unique.
    		$unique_carousel_id .= $i; 
    		$i++;
    	}

		// determine which the first image in slideshow
		$array_key = array_keys($posts);

		if(count($array_key) >= 1) { ?>
		
		<aside class="aside aside-rsm-testimonial-carousel">

			<div class="aside__content">
				<div class="rsm-testimonial-carousel-holder">
					<div id="<?php _e($unique_carousel_id); ?>" class="rsm-testimonial-carousel owl-carousel owl-carousel--post-rotator">
						
				        <!-- Wrapper for slides -->
				        <?php foreach($posts as $post_id => $post):
				        	
				        	// slides
				        	echo '<div class="item">';
				        		echo do_shortcode('[rsm_testimonial id='.$post->ID.']');
				        	echo '</div>';
				        	
						endforeach; ?>
					
					</div><!--shortcode-carousel-carousel-->
				</div><!-- .rsm-tesetimonial-carousel-holder -->
			</div><!-- .aside__content -->

		</aside>
		<?php }

		// Enqueue the script initializaton to load in footer...
		// @todo: this should be built to handle multiple instances on a page, because you know that will happen.
		// Needs to have a dynamic function name so they don't conflict.
		if(!function_exists('initialize_testimonial_carousel')):
		function initialize_testimonial_carousel() { ?>

			<script type="text/javascript">
				window.addEventListener('DOMContentLoaded', function() {
			        (function($) {
					    $(document).ready(function($){
					    	//---
						    // initialize Owl carousel
						    //---
							var testimonial_owl = $('.owl-carousel--post-rotator');

						    testimonial_owl.owlCarousel({
								items: 1,
								autoplay: true,
								autoplayTimeout: 3000,
								animateOut: 'fadeOut',
								animateIn: 'fadeIn',
								loop: true, //if there is only one post, this will create a bug if set to true.
								dots: true,
								nav: true,
								navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
								onInitialize : function(element){
									//randomize owl items function
									testimonial_owl.children().sort(function(){
										return Math.round(Math.random()) - 0.5;
									}).each(function(){
										$(this).appendTo(testimonial_owl);
									});
								},
						    });
						});
					})(jQuery);
				});
			</script>
			<?php
		}
		endif;
		add_action('wp_footer', 'initialize_testimonial_carousel', 20);
			
	wp_reset_postdata();
    $content = ob_get_contents();
    ob_end_clean();
    return $content;

}
add_shortcode( 'rsm_testimonial_carousel', 'register_testimonial_carousel_shortcode' );
endif;