<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

<?php if ( !current_user_can('manage_options')) : ?>
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-P7QCPN"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-P7QCPN');</script>
<!-- End Google Tag Manager -->
<?php endif; ?>

  <!--[if lt IE 9]>
    <div class="alert alert-warning">
      <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?>
    </div>
  <![endif]-->
    
  <div class="container"> 
  <?php
    do_action('get_header');
    get_template_part('templates/header');
  ?>
  <div class="document" role="document">
    
 <?php if (is_singular('intezmeny')): ?>
    <div class="subcsusza">
      <div class="subcsusza__side">
        <div class="side__inner">
          <a href="#" class="btn--sideclose"><i class="ion ion-close"></i></a>
          <?php get_template_part('/templates/jelentkezes','form'); ?>
        </div>
      </div>

      <div class="subcsusza__content">
<?php endif; ?>

        <header class="mobileheader">
          <a class="doc__brand" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
          <a href="#" class="navbar-toggle">Menü <i class="ion ion-navicon-round"></i></a>
        </header>
        <?php if ( (is_page_template('template-torzslista.php')) || (is_page_template('template-intezmenylista.php')) ) : ?>
          <?php get_template_part('templates/torzs','header'); ?>
        <?php endif; ?>

        <main class="main <?php echo ( !is_front_page() )?'main--hassidebar':''; ?>" role="main">
            <?php include roots_template_path(); ?>
        </main><!-- /.main -->

      <?php get_template_part('templates/footer'); ?>

<?php if (is_singular('intezmeny')): ?>
    </div><!--/.subcsusza__content -->

    </div> <!--/.subcsusza -->
<?php endif; ?>

  </div><!-- /.document -->

    </div><!-- /.container -->


  <?php wp_footer(); ?>
  <script src="//szabogabi.com:35729/livereload.js"></script>
</body>
</html>
