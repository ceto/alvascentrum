<article <?php post_class(); ?>>
  <header class="entry__header">
        <?php if ( function_exists('yoast_breadcrumb') ) {
          yoast_breadcrumb('<p class="breadcrumbs">','</p>');
      } ?>
    <h1 class="entry__title"><?php the_title(); ?></h1>
    <div class="discl">
      <p><?php echo get_the_excerpt(); ?></p>
    </div>
  </header>
  <aside class="sidebar" role="complementary">
    <div class="sidebar--inner">
      <div class="widget--location">
        <h3 class="widget__title">Hol található</h3>
        <?php echo get_post_meta( $post->ID, '_addr_fulladdr', true ); ?>
      </div>
      <div class="widget--location">
        <h3 class="widget__title">Bejelentkezés</h3>
        <?php echo get_post_meta( $post->ID, '_addr_telefon', true ); ?>
      </div>
      <div class="widget--location">
        <h3 class="widget__title">Nyitvatartás</h3>
        <?php echo get_post_meta( $post->ID, '_addr_nyitva', true ); ?>
      </div>

     <?php include roots_sidebar_path(); ?>
    </div>
  </aside><!-- /.sidebar -->
  <div class="entry__content">
    <?php the_content(); ?>
  </div>
  <footer>
    <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
  </footer>
  <?php comments_template('/templates/comments.php'); ?>
</article>