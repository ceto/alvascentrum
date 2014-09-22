<?php while (have_posts()) : the_post(); ?>
  <div class="torzs-header">
    <div class="col-holder">



      <?php if (is_page() && ($post->post_parent)): ?>
        <a class="fejtorzslink" href="<?php echo get_permalink( $post->post_parent ); ?>" >
          <?php echo get_the_title( $post->post_parent ); ?>
        </a>
        <?php get_template_part('templates/entry-meta'); ?>
        <?php get_template_part('templates/entry-rovatok'); ?>
      <?php endif; ?>


      <h1>
        <?php echo roots_title(); ?>
      </h1>
      <?php if ( !is_search() && !is_home() && !is_archive() ): ?>
        <div class="discl">
          <?php the_excerpt() ?>
        </div>
      <?php elseif (is_category()) : ?>
        <div class="discl">
          <?php echo category_description(); ?>
        </div> 
      <?php endif; ?>
    </div><!-- /.col-holder -->
  </div>
<?php endwhile; ?>



