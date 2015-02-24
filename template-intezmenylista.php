<?php
/*
Template Name: Intézmények listázása
*/
?>
<?php $current_id=get_the_id(); ?>

<aside class="sidebar" role="complementary">
  <div class="sidebar--inner">
    <nav class="widget widget--sidebarnav" role="navigation">
      <figure class="navill">
       	<?php 

       	echo get_the_post_thumbnail($current_id,'tiny916'); ?> 
      </figure>
	    <!-- <h3 class="subnav__title">Intézmények</h3> -->
	    <?php /*
	      if (has_nav_menu('intezmeny_navigation')) :
	        wp_nav_menu(array('theme_location' => 'intezmeny_navigation', 'menu_class' => 'subnav'));
	      endif; */
	     ?>
	  </nav>
  </div>
</aside><!-- /.sidebar -->


<div class="archiveblock">
	<?php 
		$the_pages = new WP_Query( array(
			'post_type' => 'intezmeny',
			'posts_per_page' => -1
		));
	?>

	<?php while ($the_pages->have_posts()) : $the_pages->the_post(); ?>

	  <?php get_template_part('templates/content', 'intexp'); ?>
	<?php endwhile; ?>
</div>

<aside class="sidebar sidebar--lower" role="complementary">
  <div class="sidebar--inner">
    <?php include roots_sidebar_path(); ?>
  </div>
</aside><!-- /.sidebar -->
