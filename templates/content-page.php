<article <?php post_class(); ?>>
  <header>
  	<?php if ( $post->post_parent ) : ?>
			<a class="fejtorzslink" href="<?php echo get_permalink( $post->post_parent ); ?>" >
				<?php echo get_the_title( $post->post_parent ); ?>
			</a>
  	<?php endif; ?>
    <h1 class="entry-title"><?php the_title(); ?></h1>
    <?php get_template_part('templates/entry-meta'); ?>
    <?php get_template_part('templates/entry-rovatok'); ?>
  </header>
  <div class="entry-content">
    <?php the_content(); ?>
  </div>
  <footer>
    <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
  </footer>
  <?php comments_template('/templates/comments.php'); ?>
</article>