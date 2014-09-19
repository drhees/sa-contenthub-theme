<?php 
	if ( !defined('ABSPATH')) exit;
	get_header(); 
?>
<div class="wrap grid">
		<div class="grid__item two-thirds palm-one-whole lap-one-whole main-content"><!--
			--><div class="grid__item seven-eighths palm-one-whole lap-one-whole">
			<center><h1>404</h1></center>
			<br />
			<h1>Sorry, but we can't seem to find the page you are looking for.</h1>
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
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Page Sidebar') ):  endif;?>
	</div>
</div>

<?php get_footer(); ?>
