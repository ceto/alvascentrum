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

  <?php if ( (is_page()) || (is_page_template('template-torzslista.php')) || (is_page_template('template-intezmenylista.php')) ) : ?>
    <?php get_template_part('templates/torzs','header'); ?>
  <?php endif; ?>
  
  <?php if ( is_home() || is_single() || is_archive() || is_search()) : ?>
    <?php get_template_part('templates/page','header'); ?>
  <?php endif; ?>



  <div class="col-holder">
    <main class="main <?php echo roots_display_sidebar()?'main--hassidebar':''; ?>" role="main">
      <?php include roots_template_path(); ?>
    </main><!-- /.main -->
    <?php if (roots_display_sidebar()) : ?>
      <aside class="sidebar" role="complementary">
        <?php include roots_sidebar_path(); ?>
      </aside><!-- /.sidebar -->
    <?php endif; ?>
  </div>

  <?php get_template_part('templates/footer'); ?>

</body>
</html>
