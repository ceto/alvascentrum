  <article <?php post_class(); ?>>
    <header class="entry__header"> 
    	<?php if ( function_exists('yoast_breadcrumb') ) {
          yoast_breadcrumb('<p class="breadcrumbs">','</p>');
      } ?>
      <h1>
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
    <footer>
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    </footer>
    <?php //comments_template('/templates/comments.php'); ?>
  </article>
