  <article <?php post_class(); ?>>
    <header class="entry__header"> 
    	<?php if ( function_exists('yoast_breadcrumb') ) {
          yoast_breadcrumb('<p class="breadcrumbs">','</p>');
      } ?>
      <h1 class="page__title">
        <?php echo roots_title(); ?>
      </h1>
      

        <div class="header__meta">
          <?php get_template_part('templates/entry-meta'); ?>
          <?php //get_template_part('templates/entry-rovatok'); ?>
        </div>

        <div class="discl">
          <p><?php echo get_the_excerpt(); ?></p>
        </div>
    </header>
    <div class="entry__content">
      <?php the_content(); ?>
    </div>
    <aside class="sidebar" role="complementary">
      <div class="sidebar--inner">
        <?php 
          $parent_id = wp_get_post_parent_id( $post_ID );
            switch ($parent_id) {
              case 54:
                $submenu='alvaszavar_navigation';
                break;

              case 56:
                $submenu='gyogyitas_navigation';
                break;

              case 58:
                $submenu='alvas_navigation';
                break;
              
              default:
                $submenu='primary_navigation';
                break;
            }
        ?>
        
        <nav class="widget widget--sidebarnav" role="navigation">
          <figure class="navill">
            <?php echo get_the_post_thumbnail( $parent_id, 'tiny916'); ?> 
          </figure>
          <h3 class="subnav__title"><?php echo get_the_title( $parent_id ); ?></h3>
          <?php
            if (has_nav_menu($submenu)) :
              wp_nav_menu(array('theme_location' => $submenu, 'menu_class' => 'subnav'));
            endif;
          ?>
        </nav> 
       <?php include roots_sidebar_path(); ?>
      </div>
    </aside><!-- /.sidebar -->
    <footer>
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    </footer>
    <?php //comments_template('/templates/comments.php'); ?>
  </article>
