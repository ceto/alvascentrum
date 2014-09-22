<article <?php post_class('torzsexp'); ?>>
  <header>
    <h2 class="torzs--title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  </header>
  <div class="torzs--summary">
    <?php the_excerpt(); ?>
  </div>
</article>