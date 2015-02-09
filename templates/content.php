<article <?php post_class('archiveitem'); ?>>
  <header class="archiveitem__header">
    <h2 class="archiveitem__title">
    	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </h2>
    <div class="header__meta">
    	<?php get_template_part('templates/entry-meta'); ?>
    </div>
  </header>
  <div class="archiveitem__summary">
    <?php the_excerpt(); ?>
  </div>
</article>
