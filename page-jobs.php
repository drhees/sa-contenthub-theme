<?php
/*
Template Name: Jobs Page
*/
	if ( !defined('ABSPATH')) exit;
	get_header(); 
?>
<div class="wrap grid">
	<div class="grid__item one-whole main-content">
	<?php 
		if (have_posts()) :
		while (have_posts()) :
		the_post(); 
			the_content();  
		endwhile; 
		endif; 
	?>

		<hr />

	<?php
		$jobs_des = get_pages( array( 'child_of' => $post->ID, 'sort_column' => 'post_date', 'sort_order' => 'desc', 'exclude' => '14' ) );

	foreach( $jobs_des as $job_des ) {
		$content = $job_des->post_excerpt;
			if ( ! $content ) // Check for empty page
				continue;
		$content = apply_filters( 'the_excerpt', $content );
		?>
		<?php// Not Needed  
			// echo get_the_post_thumbnail( $job_des->ID ); 
		?>

		<div class="entry">
			<div class="entry__title">
				<h3 class="job-title"><?php echo $job_des->post_title; ?></h3>
				<?php echo $content; ?>
			</div>

			<div class="entry__link">
				<a href="<?php echo get_page_link( $job_des->ID ); ?>" class="link blue border-blue">
					Learn More »
				</a>
			</div>
		</div>
	<?php
	}	
	?>
	</div>
</div>

<?php get_footer(); ?>
