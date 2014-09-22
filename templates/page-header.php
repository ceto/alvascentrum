  <div class="page-header">
    <h1>
      <?php echo roots_title(); ?>
    </h1>
    <?php if ( !is_search() && !is_home() && !is_archive() ): ?>
    	<div class="discl">
    		<?php the_content() ?>
    	</div>
    <?php elseif (is_category()) : ?>
  		<div class="discl">
  			<?php echo category_description(); ?>
  		</div> 
    <?php endif; ?>
  </div>

