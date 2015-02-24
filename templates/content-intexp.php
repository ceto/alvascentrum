<article <?php post_class('intexp'); ?>>
  <header class="intexp__header">
  	<figure class="intexp__logo">
  		<?php the_post_thumbnail('tiny11'); ?>
  	</figure>
    <h2 class="intexp__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <span class="intexp__finansz">
    	<?php echo get_post_meta( $post->ID, '_addr_finansz', true ); ?>
    </span>
  </header>
  <div class="intexp__summary">
    <?php the_excerpt(); ?>
  </div>
</article>