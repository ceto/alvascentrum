  <article <?php post_class(); ?>>
  	<header class="entry__header"> 
    	<?php if ( function_exists('yoast_breadcrumb') ) {
          yoast_breadcrumb('<p class="breadcrumbs">','</p>');
      } ?>
      <h1 class="page__title">
        <?php echo roots_title(); ?>
      </h1>
      

        <div class="header__meta">
          <?php get_template_part('templates/entry-meta'); ?>
          <?php //get_template_part('templates/entry-rovatok'); ?>
        </div>

        <div class="discl">
          <p><?php echo get_the_excerpt(); ?></p>
        </div>
    </header>
    <div class="entry__content">
      <?php the_content(); ?>


      <footer class="related__entries">

      <?php 
           
          yarpp_related(
            array(
              // Pool options: these determine the "pool" of entities which are considered
              'post_type' => array('post', 'page' ),
              'show_pass_post' => false, // show password-protected posts
              'past_only' => false, // show only posts which were published before the reference post
              'exclude' => array('54','56','58'), // a list of term_taxonomy_ids. entities with any of these terms will be excluded from consideration.
              'recent' => false, // to limit to entries published recently, set to something like '15 day', '20 week', or '12 month'.
              // Relatedness options: these determine how "relatedness" is computed
              // Weights are used to construct the "match score" between candidates and the reference post
              'weight' => array(
                            'body' => 2,
                            'title' => 2, // larger weights mean this criteria will be weighted more heavily
                            'tax' => array(
                                      'category' => 1,
                                      'post_tag' => 3,
                                     )
                          ),

              // 'require_tax' => array(
              //     'projects' => 1
              // ),  

              'threshold' => 5,
              'template' => 'yarpp-template-entries.php',
              'limit' => 3, // maximum number of results
              'order' => 'score DESC'
            ),
            get_the_ID(), 
            true // (optional) true to echo the HTML block; false to return it
          ); 

        ?>
      </footer>


    	<footer class="entry-footer">
      	<?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    	</footer>
    	<?php //comments_template('/templates/comments.php'); ?>
    </div>


		<aside class="sidebar" role="complementary">
      <div class="sidebar--inner"> 
			 <?php include roots_sidebar_path(); ?>
      </div>
		</aside><!-- /.sidebar -->
		
  </article>
