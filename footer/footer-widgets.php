  <?php $footer_widget = ot_get_option( 'footer_widget', ''); ?>
    <?php if( $footer_widget == 'on' ): ?>
    <section class="footer-main-container">   
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
              <?php 
                    $logo = ot_get_option( 'logo', '' );
        			      $footer_logo = ot_get_option( 'footer_logo', '');
                    $footer_logo_display = ot_get_option( 'footer_logo_display', 'on' );
                    if( $footer_logo_display == 'on' ):
        			 ?>
                <h3 class="footer-logo">
                <a href="<?php echo home_url(); ?>">
            			<?php if( $footer_logo !='' ): ?>
            			<img alt="footer logo" src="<?php echo $footer_logo; ?>" />
            			<?php elseif($logo !=''): ?>
            			<img alt="footer logo" src="<?php echo $logo; ?>" />
            			<?php else: ?>
            			<img alt="footer logo" src="<?php echo get_template_directory_uri(); ?>/images/footerlogo.png" />
            			<?php endif; ?>
            			</a>
                </h3>
                <?php endif; ?>
              <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
			           <?php dynamic_sidebar( 'footer-1' ); ?>
              <?php endif; ?>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
			  <?php dynamic_sidebar( 'footer-2' ); ?>
              <?php else: ?>
              <?php $args = array('before_widget' =>'<div class="footer-widget">', 'after_widget' => '</div>', 'before_title' => '<h3 class="title"><span>', 'after_title' => '</span></h3>'); ?>
              <?php the_widget( 'WP_Widget_Categories', '', $args ); ?> 
            <?php endif; ?>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
			  <?php dynamic_sidebar( 'footer-3' ); ?>
              <?php else: ?>            
              <?php $args = array('before_widget' =>'<div class="footer-widget">', 'after_widget' => '</div>', 'before_title' => '<h3 class="title"><span>', 'after_title' => '</span></h3>'); ?>
              <?php the_widget( 'WP_Widget_Archives', '', $args ); ?> 
            <?php endif; ?>          
            </div><!--.col-lg-4-->
         </div>
      </div><!--.container .footer-main-->     
    </section><!--.footer-main-container-->
  <?php endif; ?>  