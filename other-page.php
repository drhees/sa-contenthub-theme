<?php 
/*
Template Name: Other Sidebar Page
*/
	if ( !defined('ABSPATH')) exit;
	get_header(); 
?>
<div class="wrap grid">
		<div class="grid__item two-thirds palm-one-whole lap-one-whole main-content"><!--
			--><div class="grid__item seven-eighths palm-one-whole lap-one-whole">
				<?php 
					if (have_posts()) :
					while (have_posts()) :
					the_post(); 
			 		the_content();  
					endwhile; 
					endif; 
				?>
			</div><!--
		--></div><!--

	--><div class="grid__item one-third palm-one-whole lap-one-whole sidebar">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Other Page Sidebar') ):  endif;?>
	</div>
</div>

<?php get_footer(); ?>
