<span class="byline author vcard"><?php echo __('Szerző:', 'roots'); ?> <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"><?php echo get_the_author(); ?></a></span> ·
<?php if ( (get_post_type() == 'page')  && ( $post->post_parent ) ) : ?>
				<a class="torzslink" href="<?php echo get_permalink( $post->post_parent ); ?>" >
					<?php echo get_the_title( $post->post_parent ); ?></a> · 
    	<?php elseif ( get_post_type() == 'intezmeny' ) : ?>
    		<a class="torzslink" href="<?php echo get_permalink(66); ?>" >
					<?php _e('Intézmények','roots') ?></a> ·
    	<?php endif; ?>
<time class="published" datetime="<?php echo get_the_time('c'); ?>"><?php echo get_the_date(); ?></time>
