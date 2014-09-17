<?php
/*
Template Name: Intézmények listázása
*/
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
<?php endwhile; ?>

<?php 
	$the_pages = new WP_Query( array(
		'post_type' => 'intezmeny',
		'posts_per_page' => -1
	));
?>

<?php while ($the_pages->have_posts()) : $the_pages->the_post(); ?>
  <?php get_template_part('templates/content', 'torzsexp'); ?>
<?php endwhile; ?>

