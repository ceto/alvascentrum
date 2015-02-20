<article <?php post_class(); ?>>
  <header class="entry__header">
        <?php if ( function_exists('yoast_breadcrumb') ) {
          yoast_breadcrumb('<p class="breadcrumbs">','</p>');
      } ?>
    <h1 class="page__title"><?php the_title(); ?></h1>
    <div class="discl">
      <p><?php echo get_the_excerpt(); ?></p>
    </div>
  </header>
  <aside class="sidebar" role="complementary">
    <div class="sidebar--inner">
      <div class="widget widget--location">
        <h3 class="widget__title">Hol található</h3>
        <?php echo get_post_meta( $post->ID, '_addr_fulladdr', true ); ?>
      </div>
      <div class="widget widget--location">
        <h3 class="widget__title">Bejelentkezés</h3>
        <?php echo get_post_meta( $post->ID, '_addr_telefon', true ); ?>
      </div>
      <div class="widget widget--location">
        <h3 class="widget__title">Nyitvatartás</h3>
        <?php echo get_post_meta( $post->ID, '_addr_nyitva', true ); ?>
      </div>
    </div>
  </aside><!-- /.sidebar -->
  <div class="entry__content">
    <?php the_content(); ?>

    <?php if ($accordion = get_post_meta( get_the_ID(), '_data_accordion', true )) : ?>
      
      <section class="intezmeny__details">
        <div class="panel-group" id="detaacc-<?php echo get_the_ID(); ?>" role="tablist" aria-multiselectable="true">
          <?php foreach ( (array) $accordion as $key => $collapsible ) {  ?>
            <div class="panel">
              <div class="panel-heading" role="tab" id="heading-<?php echo $key; ?>">
                <h3 class="panel-title">
                  <a class="" data-toggle="collapse" href="#collapse-<?php echo $key; ?>" aria-expanded="false" aria-controls="collapsexample-<?php echo $key; ?>">
                    <?php echo $collapsible['title']; ?>
                  </a>
                </h3>
              </div>
              <div class="collapse panel-collapse" id="collapse-<?php echo $key; ?>" role="tabpanel" aria-labelledby="heading-<?php echo $key; ?>">
                <div class="panel-body">
                  <?php echo $collapsible['content']; ?>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </section>
    <?php endif; ?>


  </div>



  <aside class="sidebar sidebar--lower" role="complementary">
    <div class="sidebar--inner">
      <nav class="widget widget--sidebarnav" role="navigation">
        
        <h3 class="subnav__title">Intézmények</h3>
        <?php
          if (has_nav_menu('intezmeny_navigation')) :
            wp_nav_menu(array('theme_location' => 'intezmeny_navigation', 'menu_class' => 'subnav'));
          endif;
         ?>
        </nav>
       <?php include roots_sidebar_path(); ?>
      </div>
  </aside><!-- /.sidebar -->
  <footer>
    <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
  </footer>
  <?php // comments_template('/templates/comments.php'); ?>
</article>