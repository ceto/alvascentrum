<?php
/*
Template Name: Törzsoldalak listázása
*/
?>
<?php $current_id=get_the_id(); ?>
<aside class="sidebar" role="complementary">
  <div class="sidebar--inner">
  	<?php 
          switch ($current_id) {
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
            <?php echo get_the_post_thumbnail( $current_id, 'tiny916'); ?> 
          </figure>
          <!-- <h3 class="subnav__title"><?php echo get_the_title( $current_id ); ?></h3> -->
          <?php /*
            if (has_nav_menu($submenu)) :
              wp_nav_menu(array('theme_location' => $submenu, 'menu_class' => 'subnav'));
            endif; */
          ?>
        </nav> 
  </div>
</aside><!-- /.sidebar -->

<div class="archiveblock">
	<?php
	  $act_id = get_the_ID();
	  $act_cat = get_the_category();

		$the_pages = new WP_Query( array(
			'post_type' => 'page',
			'post__not_in' => array($act_id),
			'cat' => $act_cat[0]->term_id,		
			//'post_parent' => get_the_ID(),
			'posts_per_page' => -1
		));
	?>

	<?php while ($the_pages->have_posts()) : $the_pages->the_post(); ?>
	  <?php get_template_part('templates/content', 'torzsexp'); ?>
	<?php endwhile; ?>
</div>


<aside class="sidebar sidebar--lower" role="complementary">
  <div class="sidebar--inner">
    <?php include roots_sidebar_path(); ?>
  </div>
</aside><!-- /.sidebar -->
