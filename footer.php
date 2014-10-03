<?php
/**
 * The template for displaying the footer.
 *
 */
?>
    </div><!--.container-->
      <footer id="footer" class="footer">
      <?php get_template_part( 'footer/footer', 'widgets' ); ?>
      <?php get_template_part( 'footer/footer', 'copyright' ); ?>
        <a class="arrow-up" href="#"><i class="fa fa-angle-up"></i></a>
      </footer><!--.footer-->
  </section><!--.main-container-->
</div>
<?php 
$tracking_code = ot_get_option( 'tracking_code' );
echo $tracking_code;
wp_footer();
?>
</body>
</html>