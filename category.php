<?php 
	if ( !defined('ABSPATH')) exit;
	get_header(); 
?>
<div class="wrap grid">
		<div class="grid__item two-thirds palm-one-whole lap-one-whole main-content"><!--
			--><div class="grid__item seven-eighths palm-one-whole lap-one-whole">
				<?php 
					if (have_posts()) :
					while (have_posts()) :
					the_post(); ?>
        <div class="entry">
            <div class="entry__title">
                <h3 class="job-title"><?php the_title(); ?></h3>
                <?php the_excerpt(); ?>
            </div>

            <div class="entry__link">
                <a href="<?php the_permalink(); ?>" class="link blue border-blue">
                    Keep Reading »
                </a>
            </div>
        </div>
				<?php
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
