<?php if (roots_display_sidebar()): ?>
<aside class="site-bottom">
	<div class="wrapper wrapper--wide">
		<div class="sidebar--footer">
    	<?php dynamic_sidebar('sidebar-fblocks'); ?>
    </div>
  </div>	
</aside>
<?php endif ?>

<footer class="sitefooter" role="contentinfo">
  <div class="wrapper wrapper--wide">
		<div class="sitefooter--inner">
    	<?php dynamic_sidebar('sidebar-footer'); ?>
    </div>
  </div>
</footer>


