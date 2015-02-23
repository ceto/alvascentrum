<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

  <!--[if lt IE 8]>
    <div class="alert alert-warning">
      <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?>
    </div>
  <![endif]-->

  <?php
    do_action('get_header');
    get_template_part('templates/header');
  ?>
  <div class="document" role="document">
    <a class="doc__brand" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>

    <a href="#" class="navbar-toggle">Menü</a>

      <?php if ( (is_page_template('template-torzslista.php')) || (is_page_template('template-intezmenylista.php')) ) : ?>
        <?php get_template_part('templates/torzs','header'); ?>
      <?php endif; ?>


      <main class="main <?php echo ( !is_front_page() )?'main--hassidebar':''; ?>" role="main">
          <?php include roots_template_path(); ?>
      </main><!-- /.main -->

    <?php get_template_part('templates/footer'); ?>
  </div><!-- /.document -->

  <?php wp_footer(); ?>

</body>
</html>
