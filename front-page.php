<?php 
	if ( !defined('ABSPATH')) exit;
	get_header(); 
?>
<div class="root container"> 
	
	<div class="HomeSlider">
		HomeSlider >> Need to find plugin
	</div>

	<div class="FrontPage">
		<div class="left">

		<div class="Section">
			<h3 class="SectionTitle">
				Latest Post
				<span class="SectionTitleRight">
					<form action="<?php bloginfo('url'); ?>/" method="get">
						<?php
						$select = wp_dropdown_categories('show_option_none=Select category&show_count=1&orderby=name&echo=0');
						$select = preg_replace("#<select([^>]*)>#", "<select$1 onchange='return this.form.submit()'>", $select);
						echo $select;
						?>
					 </form>
				</span>
			</h3>
				
			<?php
			 $postslist = get_posts('numberposts=2');
			 foreach ($postslist as $post) :
			    setup_postdata($post);
			?>
			<div class="FrontPost">
				<?php
				if ( has_post_thumbnail() ) {
					the_post_thumbnail();
				} 
				 ?>
				<h4 class="FrontPostTitle"><?php the_title(); ?></h4>
				<h5><?php $author = get_the_author();  echo "$author";?> <?php echo get_the_date(); ?></h5>
				<?php the_excerpt() ?>

				<h6 class="FrontPostInfo"><?php comments_number( 'no commentss', 'one comments', '% commentss' ); ?> * <?php echo getPostViews(get_the_ID()); ?></h6>
			</div>
			<?php endforeach ?>
		</div>
 


		<div class="Section Videos">
			<h3 class="SectionTitle">
				Videos
				<span class="SectionTitleRight">
					<a href="#">View All Videos >></a>
				</span>
			</h3>
			<?php
				$catquery = new WP_Query( 'cat=257&posts_per_page=1' );
				while($catquery->have_posts()) : $catquery->the_post();
			?>

			<div class="FrontPost">
				<a href="<?php the_permalink() ?>" rel="bookmark">
					<?php
					if ( has_post_thumbnail() ) {
						the_post_thumbnail();
						// OR
						// the_post_thumbnail('large-thumb');
					} 
					 ?>
				</a>
				<h4 class="FrontPostTitle"><?php the_title(); ?></h4>
				<h6 class="FrontPostInfo"><?php comments_number( 'no commentss', 'one comments', '% commentss' ); ?> * <?php echo getPostViews(get_the_ID()); ?></h6>
			</div>
			<?php endwhile; ?>
		</div>


		<div class="Section Polls">
			<h3 class="SectionTitle">
				Polls
				<span class="SectionTitleRight">
					<a href="#">View recent polls >></a>
				</span>
			</h3>

			<div class="FrontPost">
				 <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Page Pools') ):  endif;?>
			</div>
		 
		</div>

		<div class="Section">
			<h3 class="SectionTitle">
				In The Media
				<span class="SectionTitleRight">
					<a href="#">View More >></a>
				</span>
			</h3>
			<?php
				$catquery = new WP_Query( 'cat=73&posts_per_page=1' );
				while($catquery->have_posts()) : $catquery->the_post();
			?>

			<div class="FrontPost">
				<a href="<?php the_permalink() ?>" rel="bookmark">
					<?php
					if ( has_post_thumbnail() ) {
						the_post_thumbnail();
					} 
					 ?>
				</a>
				<h4 class="FrontPostTitle"><?php the_title(); ?></h4>
				<h6 class="FrontPostInfo"><?php comments_number( 'no commentss', 'one comments', '% commentss' ); ?> * <?php echo getPostViews(get_the_ID()); ?></h6>
			</div>
			<?php endwhile; ?>
		</div>

		<!-- END OF LEFT SIDE -->
		</div>
		

		<div class="right">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Page Content') ):  endif;?>
		</div>
	</div>

</div>
<?php get_footer(); ?>
