<?php if ( !defined('ABSPATH')) exit; ?>
<!doctype html>
<head>
    <title>
      <?php 
      	if (is_front_page () ) { bloginfo('name');  echo ' - ' ; bloginfo( 'description', 'display' );}
      	elseif (is_page() ) { single_post_title(); echo ' - ';  bloginfo('name');}
      	elseif ( is_category() ) { single_cat_title(); echo ' - ' ; bloginfo('name'); }
      	elseif (is_single() ) { single_post_title(); echo ' - ' ; bloginfo('name');}
      	else { wp_title('',true);  echo ' - ' ; bloginfo( 'description', 'display' ); echo ' - ' ; bloginfo('name');} 
      ?>
    </title>

 

  <link title="<?php  bloginfo( 'name' ); ?>" rel="alternate" type="application/rss+xml" href="<?php bloginfo( 'url' ); ?>/feed/rss/" />
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  <meta name="rating" content="general" />
  <meta name="robots" content="index" />
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">

  <?php wp_head(); ?>
  <?php flush(); ?>

  <link rel="stylesheet" media="screen" href="<?php bloginfo('template_directory'); ?>/style.css" />

  <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/custom.js"></script>
</head>

<body <?php body_class(); ?>>

<div class="top-bar">
  <div class="top-bar__logo">
  <a href="/" title="<?php bloginfo('name');  echo ' - ' ; bloginfo( 'description', 'display' ); ?>">
    <img src="<?php bloginfo('template_directory'); ?>/images/logo.png" />
  </a>
  </div>

  <div class="top-bar__menu">
    <?php //wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
    <div class="headerlinks">
      <span><?php wp_register(' ', ' '); ?></span>
      <span><?php wp_loginout(' ', ' '); ?></span>
    </div>
  </div>
</div>



<div class="SiteSidebar">
  <?php wp_nav_menu( array( 'theme_location' => 'side-menu' ) ); ?>
  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Page Widgets') ):  endif;?>
</div>
