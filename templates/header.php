<header class="banner navbar navbar-default navbar-static-top" role="banner">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle">
        <span class="sr-only">MENÜ</span>
      </button>
      <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
    </div>

    <nav class="main-nav" role="navigation">
      <div class="col-holder">
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav'));
        endif;
      ?>
      </div><!-- /.col-holder -->
    </nav>

</header>
