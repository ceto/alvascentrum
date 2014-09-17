<article <?php post_class(); ?>>
  <header>
    
    <h2 class="entry-title">
    	<?php if ( (get_post_type() == 'page')  && ( $post->post_parent ) ) : ?>
				<a class="torzslink" href="<?php echo get_permalink( $post->post_parent ); ?>" >
					<?php echo get_the_title( $post->post_parent ); ?></a>: 
    	<?php elseif ( get_post_type() == 'intezmeny' ) : ?>
    		<a class="torzslink" href="<?php echo get_permalink(66); ?>" >
					<?php _e('Intézmények','roots') ?></a>:
    	<?php endif; ?>
    	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </h2>
    <?php get_template_part('templates/entry-meta'); ?>
  </header>
  <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div>
</article>
