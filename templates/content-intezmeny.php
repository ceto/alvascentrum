<article <?php post_class(); ?>>
  <header>
		<a class="fejtorzslink" href="<?php echo get_permalink(66); ?>" >
			<?php _e('Intézmények','roots') ?>
		</a>
    <h1 class="entry-title"><?php the_title(); ?></h1>
  </header>
  <div class="entry-content">
    <?php the_content(); ?>
  </div>
  <footer>
    <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
  </footer>
  <?php comments_template('/templates/comments.php'); ?>
</article>