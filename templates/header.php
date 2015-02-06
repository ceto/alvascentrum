<header class="banner" role="banner">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
    </div>

    <nav class="main-nav" role="navigation">
      <div class="mainnav-holder">
      <h1 class="nav-title">Tartalomjegyzék</h1>
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav'));
        endif;
      ?>
      </div><!-- /.mainnav-holder -->
    </nav>

</header>
