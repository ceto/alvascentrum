<?php while (have_posts()) : the_post(); ?>
  <div class="torzs__header">
      <?php if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb('<p class="breadcrumbs">','</p>');
      } ?>


      <h1 class="page__title">
        <?php echo roots_title(); ?>
      </h1>


      <?php if ( (is_page() && ($post->post_parent)) ): ?>
        <div class="header__meta">
          <?php get_template_part('templates/entry-meta'); ?>
          <?php //get_template_part('templates/entry-rovatok'); ?>
        </div>
      <?php endif; ?>

      <?php if ( !is_search() && !is_home() && !is_archive() ): ?>
        <div class="discl">
          <?php the_excerpt() ?>
        </div>
      <?php elseif (is_category()) : ?>
        <div class="discl">
          <?php echo category_description(); ?>
        </div> 
      <?php endif; ?>
  </div>
<?php endwhile; ?>



