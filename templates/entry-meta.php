<span class="byline author vcard"><?php echo __('Szerző:', 'roots'); ?> <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"><?php echo get_the_author(); ?></a></span> ·
<?php if (get_post_type() == 'post') : ?>
	<span class="torzslink">
		Kategória:
		<?php the_category( ', ' , 'multiple' ); ?> 	
	</span>
	 ·
 <?php endif; ?>
<time class="published" datetime="<?php echo get_the_time('c'); ?>"><?php echo get_the_date(); ?></time>
