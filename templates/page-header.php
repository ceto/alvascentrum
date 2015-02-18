<div class="page__header">
    <?php if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb('<p class="breadcrumbs">','</p>');
    } ?>
    <h1 class="page__title">
      <?php echo roots_title(); ?>
    </h1>
    <?php if ( is_category() ) : ?>
  		<div class="discl">
  			<?php echo category_description(); ?>
  		</div> 
    <?php endif; ?>

    <?php if ( is_single() ): ?>
      <div class="header__meta">
        <?php get_template_part('templates/entry-meta'); ?>
        <?php //get_template_part('templates/entry-rovatok'); ?>
      </div>
    <?php endif; ?>

    <?php if ( is_home() ): ?>
      <div class="discl">
        <p>Nulla vitae elit libero, a pharetra augue. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Nullam id dolor id nibh ultricies vehicula ut id elit. </p>
      </div>
    <?php endif; ?>
</div>

