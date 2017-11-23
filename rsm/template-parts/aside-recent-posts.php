<?php
/**
 * Recent Posts widget for blog
 */
global $post;

$this_post = $post->ID;

$recentArgs = array(
	'post_type' => 'post',
	'posts_per_page' => 3,
	'post__not_in' => array($this_post),
);
$recentPosts = new WP_Query($recentArgs);
if($recentPosts->have_posts()): ?>
	
	<aside id="recent-posts" class="widget">
		<h3 class="widget__title">Recent Posts</h3>
		
		<?php while($recentPosts->have_posts()){
			$recentPosts->the_post();

			get_template_part('content', 'aside');

		} ?>
	</aside>

<?php
endif;
wp_reset_postdata();