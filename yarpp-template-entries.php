<?php
/*
YARPP Template: Related Entries
Description: Requires a theme which supports post thumbnails
Author: Gabor Szabó <szabogabi@gmail.com>
*/ ?>

	<h3 class="related__title">Kapcsolódó tartalmak</h3>
	<?php if (have_posts()):?>
		<section class="related__entries__items">
			<?php while (have_posts()) : the_post(); ?>
				<?php get_template_part('templates/content'); ?>
			<?php endwhile; ?>
		</section>
		<?php else: ?>
		<p>Nincsnek kapcsolósó tartalmak</p>
	<?php endif; ?>
