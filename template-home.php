<?php
/*
Template Name: Home Page
*/
?>
<div class="home__header">
    <div class="inner">
      <h1>Alváscentrum.hu</h1>
      <p class="intro">Választ adunk az alvászavarokkal kapcsolatos kérdéseire</p>
      <a href="#home__sections" class="home__start">
        Merüljön el a tartalomban...
      </a>
    </div><!-- /.inner -->
</div>
<?php if ($sections = get_post_meta( get_the_ID(), '_homedata_sections', true )) : ?>
	<div id="home__sections" class="home__sections">
		<?php foreach ( (array) $sections as $key => $section ) {  ?>
			<section class="home__section home__section--<?php echo $key; ?>">
				<?php	$thumb_array = wp_get_attachment_image_src($section['image_id'], 'tiny169', true); ?>
				<figure class="home__section__ill">
					<img src="<?php echo $thumb_array[0]; ?>" alt="<?php echo $section['title']; ?>">
				</figure>
				
				<div class="home__section__textcontainer">
					<h3 class="home__section__title">
						<?php echo $section['title']; ?>
					</h3>
					<div class="home__section__content">
						<?php echo wpautop($section['content']); ?>
				</div>
				</div>

			</section>
		<?php } ?>
	</div>
<?php endif; ?>
