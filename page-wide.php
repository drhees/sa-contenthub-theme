<?php
/*
Template Name: Wide Page | No Sidebar
*/
	if ( !defined('ABSPATH')) exit;
	get_header(); 
?>
	<?php 
		if (have_posts()) :
		while (have_posts()) :
		the_post(); 
	?>
	<div>					
		<h2><?php the_title(); ?></h2>
		<?php the_excerpt(); ?>
		<?php
			if ( has_post_thumbnail() ) {
				the_post_thumbnail('thumbnail', array('title' => esc_attr( $post->post_title ))); 
			}
			else {
				echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/featured-image.png" alt="' . the_title() . '" title="' . the_title() . '"/>';
			}
		?>

	</div>
	<?php 
		endwhile; 
		endif; 
	?>

	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Page Sidebar') ):  endif;?>
 
<?php get_footer(); ?>  