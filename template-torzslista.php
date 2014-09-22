<?php
/*
Template Name: Törzsoldalak listázása
*/
?>
  <?php
    $act_id = get_the_ID();
    $act_cat = get_the_category();
  ?>
<?php	
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
