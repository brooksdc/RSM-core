<?php
/**
 * The template used for displaying page content in single-rsm_team_member.php
 *
 * @package rsm_core_
 */
$team_member_full_bio = get_field('rsm_team_member_full_bio');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php get_template_part('template-parts/entry-header');	?>

	<div class="entry-content">
		
		<?php if($team_member_full_bio){
			echo $team_member_full_bio;
		} ?>
		
	</div><!-- .entry-content -->

</article><!-- #post-## -->
