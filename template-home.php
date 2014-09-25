<?php
/*
Template Name: Home Page
*/
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', get_post_format()); ?>
<?php endwhile; ?>
