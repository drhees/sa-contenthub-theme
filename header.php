<?php
/**
 * The Header for our theme.
 *
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php caps_fabicon_ico(); ?>
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
    <![endif]-->
    <script>var ajax_url = '<?php echo admin_url( 'admin-ajax.php' );?>';</script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >
<div class="main">
  <section class="header">
    <div class="main-header-part">
      <div class="container">
       
              <div class="logo col-lg-6 col-md-6 col-sm-6 col-xs-12"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo '<img src="'.get_template_directory_uri().'/images/logo.png" alt="LOGO" />'; ?></a></div>
          <?php 
              $header_top = ot_get_option( 'top_nav_bar_disable', 'on' );
              
              if($header_top == 'on'){
                get_template_part('header/header', 'top'); 
              }      
          ?>
         
          <?php 
            $ad_image = ot_get_option('ad_image');
          ?>
          
            <?php if($ad_image != ''){ ?><div class="header-ads"><a href="<?php echo ot_get_option('ad_link'); ?>"><img src="<?php echo $ad_image; ?>" alt="banner ads" /></a></div><?php } ?>
            <?php echo ot_get_option('ad_script', '');  ?>
         

       
      </div>
    </div> <!--/.main-header-part -->
    <div class="main-menu-header">
          <div class="navbar-header">              
              <a class="toggleMenu" href="#" style="display: none; "> <i class="fa fa-list"></i></a>
           </div>
          <?php 
              $home_icon_display = ot_get_option( 'home_icon_display', 'on' );              
              $home_icon_link = ( $home_icon_display == 'on' )? '<li class="home-icon"><a href="' .get_bloginfo( 'url' ). '"><i class="fa fa-home"></i></a></li>' : '';
                
              $args = array(
                            'theme_location'  => 'header',
                            'menu_class'      => 'nav nav-stacked mg-menu',
                            'items_wrap'      => '<ul id="%1$s" class="%2$s">' .$home_icon_link. '%3$s</ul>',
                            'fallback_cb'     => 'caps_default_main_menu',
                            'container'       => '',    );
                    
              
                caps_nav_menu( $args );
            ?>
            
            <?php
                $search_icon_display = ot_get_option( 'search_icon_display', 'on' );
                if( $search_icon_display == 'on' ):
                  $placeholder_text = ot_get_option( 'placeholder_text' );
              ?>
            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 search-col">              
              <form class="form-search" action="<?php echo home_url(); ?>">
                <input type="text" class="input-medium search-query" name="s" placeholder="<?php echo $placeholder_text; ?>"><a href="#" class="search"><i class="fa fa-search"></i><i class="fa fa-times"></i></a>
              </form>
            </div>
          <?php endif; ?>

        
    </div> <!--/.menu-header -->
  </section><!--/.navbar -->
  
  <section class="main-container">
    <div class="container">

      