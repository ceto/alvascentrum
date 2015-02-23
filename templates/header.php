<header class="banner" role="banner">
  <div class="banner__inner">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
    </div>
    <div class="banner__searchblock">
      <?php get_template_part('templates/searchform'); ?>
    </div>

    <nav class="main-nav" role="navigation">
      <div class="mainnav-holder">
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav'));
        endif;
      ?>
      </div><!-- /.mainnav-holder -->
    </nav>
  </div>
</header>
