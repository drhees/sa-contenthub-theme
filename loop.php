<?php
    if ( !defined('ABSPATH')) exit;
    get_header(); 
?>
    <?php 
        if (have_posts()) :
        while (have_posts()) :
        the_post(); 
    ?>
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

    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Page Sidebar') ):  endif;?>
 
<?php get_footer(); ?>  