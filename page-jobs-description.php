<?php
/*
Template Name: Jobs Description
*/
	if ( !defined('ABSPATH')) exit;
	get_header(); 
?>


<div class="wrap grid">
	<div class="grid__item two-thirds palm-one-whole lap-one-whole main-content">
		<?php 
			if (have_posts()) :
			while (have_posts()) :
			the_post(); 
	 		the_content();  
			endwhile; 
			endif; 
		?>
			  <ol class="split results cf back-apply">
		       <li>
		       	<b class="split__title"><a href="/jobs" class="link blue">« Back to Jobs List</a></b> 
		       	<a href="/jobs/apply" class="link blue border-blue">APPLY NOW »</a>
		       	</li>
		   </ol>​
	</div><!--

	--><div class="grid__item one-third palm-one-whole lap-one-whole sidebar">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Jobs-Description Sidebar') ):  endif;?>
	</div>
</div>

<?php get_footer(); ?>
