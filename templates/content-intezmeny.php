

  <?php 
    global $response;
    echo $response;
    $parent_id = 66;
  ?>
    <article <?php post_class(); ?>>
      <header class="entry__header entry__header__int">
          <?php if ( function_exists('yoast_breadcrumb') ) {
              yoast_breadcrumb('<p class="breadcrumbs">','</p>');
          } ?>
        <h1 class="page__title"><?php the_title(); ?></h1>
        <div class="discl">
          <span class="intexp__finansz">
            <?php echo get_post_meta( $post->ID, '_addr_finansz', true ); ?>
          </span>
          <p><?php echo get_the_excerpt(); ?></p>
        </div>
      </header>
      <aside class="sidebar" role="complementary">
        <div class="sidebar--inner">

          <?php if( get_post_meta( $post->ID, '_addr_online', true ) ): ?>
            <section class="widget widget--openform widget--intezmeny">
              <div class="widget__body">
                <a href="#" id="openform" class="btn openform"><i class="ion ion-clipboard"></i> Online jelentkezés</a>
              </div>
            </section>
          <?php endif ?>

          <section class="widget widget--callme widget--intezmeny">
            <div class="widget__body">
              <h3 class="widget__title">Érdeklődjön telefonon</h3> 
              <p>
                <?php foreach ( (array) get_post_meta( $post->ID, '_addr_telefon', true ) as $key => $telszam ) {  ?>
                <?php if ($key>0) {echo 'vagy ';} ?>
                  <a class="telcsi telcsi-<?php echo $key; ?>" href="tel:<?php echo $telszam?>"><?php echo $telszam; ?></a>
                <?php } ?>
              </p>
            </div>
          </section>
          <section class="widget widget--intlogo widget--intezmeny">
            <div class="widget__body">
              <div class="side--logo">
                <?php the_post_thumbnail('tiny11'); ?>
              </div>
            </div>
          </section>
          <section class="widget widget--location widget--intezmeny">
            <div class="widget__body">
              <h3 class="widget__title">Hol található</h3>
              <p class="fulladdr">
                <?php echo get_post_meta( $post->ID, '_addr_fulladdr', true ); ?>
              </p>
              <?php if (get_post_meta( $post->ID, '_addr_addrdiscl', true )): ?>
                <p class="addrdsicl"><?php echo get_post_meta( $post->ID, '_addr_addrdiscl', true ); ?></p>
              <?php endif ?>
            </div>
          </section>

          <section class="widget widget--contact widget--intezmeny">
            <div class="widget__body">
              <h3 class="widget__title">Kapcsolat</h3>
              <p class="addrtel">Telefon: 
                <?php foreach ( (array) get_post_meta( $post->ID, '_addr_telefon', true ) as $key => $telszam ) {  ?>
                  <?php if ($key>0) {echo ', ';} ?>
                  <a class="telcsi-<?php echo $key; ?>" href="tel:<?php echo $telszam?>"><?php echo $telszam; ?></a><?php } ?>
              </p>
              <p class="addrmail">Email: <?php echo get_post_meta( $post->ID, '_addr_email', true ); ?></p>
              <p class="addrurl">Web: <?php echo get_post_meta( $post->ID, '_addr_url', true ); ?></p>
            </div>
          </section>

          <section class="widget widget--open widget--intezmeny">
            <div class="widget__body">
              <h3 class="widget__title">Rendelési idő</h3>            
              <?php echo wpautop(get_post_meta( $post->ID, '_addr_nyitva', true )); ?>
            </div>
          </section>

        </div>
      </aside><!-- /.sidebar -->
      <div class="entry__content int__content">
        <?php the_content(); ?>

        <?php if ($accordion = get_post_meta( get_the_ID(), '_data_accordion', true )) : ?>
          
          <section class="intezmeny__details">
            <div class="panel-group" id="detaacc-<?php echo get_the_ID(); ?>" role="tablist" aria-multiselectable="true">
              <?php foreach ( (array) $accordion as $key => $collapsible ) {  ?>
                <div class="panel">
                  <div class="panel-heading" role="tab" id="heading-<?php echo $key; ?>">
                    <h3 class="panel-title">
                      <a class="collapsed" data-toggle="collapse" href="#collapse-<?php echo $key; ?>" aria-expanded="false" aria-controls="collapsexample-<?php echo $key; ?>">
                        <?php echo $collapsible['title']; ?>
                        <span class="panel-icon"><i class="ion ion-ios-close-empty"></i></span>
                      </a>
                    </h3>
                  </div>
                  <div class="collapse panel-collapse" id="collapse-<?php echo $key; ?>" role="tabpanel" aria-labelledby="heading-<?php echo $key; ?>">
                    <div class="panel-body">
                      <?php echo wpautop($collapsible['content']); ?>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>
          </section>
        <?php endif; ?>
        
        <section class="mapblock">
          <h2>Térkép</h2>
          <div id="map-canvas"></div>
        </section>

      </div>



      <aside class="sidebar sidebar--lower" role="complementary">
        <div class="sidebar--inner">
          <nav class="widget widget--sidebarnav" role="navigation">
          <figure class="navill">
            <?php echo get_the_post_thumbnail( $parent_id, 'tiny916'); ?> 
          </figure>
            
            <!--h3 class="subnav__title">Intézmények</h3-->
            <?php
             /* if (has_nav_menu('intezmeny_navigation')) :
                wp_nav_menu(array('theme_location' => 'intezmeny_navigation', 'menu_class' => 'subnav'));
              endif;*/
             ?>
            </nav>
           <?php //include roots_sidebar_path(); ?>
          </div>
      </aside><!-- /.sidebar -->
      <footer>
        <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
      </footer>
      <?php // comments_template('/templates/comments.php'); ?>
    </article>







<!-- Google MAps -->
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
<script>

  function initialize() {
    var mapOptions = {
      zoom: 15,
      zoomControl: false,
      zoomControlOptions: {style: google.maps.ZoomControlStyle.DEFAULT,},
      disableDoubleClickZoom: true,
      mapTypeControl: true,
      mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,},
      scaleControl: true,
      scrollwheel: true,
      streetViewControl: true,
      draggable: true,
      overviewMapControl: true,
      overviewMapControlOptions: {opened: false,},
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      styles: [{featureType: "landscape",stylers: [{saturation: -100}, {lightness: 65}, {visibility: "on"}]}, {featureType: "poi",stylers: [{saturation: -100}, {lightness: 51}, {visibility: "simplified"}]}, {featureType: "road.highway",stylers: [{saturation: -100}, {visibility: "simplified"}]}, {featureType: "road.arterial",stylers: [{saturation: -100}, {lightness: 30}, {visibility: "on"}]}, {featureType: "road.local",stylers: [{saturation: -100}, {lightness: 40}, {visibility: "on"}]}, {featureType: "transit",stylers: [{saturation: -100}, {visibility: "simplified"}]}, {featureType: "administrative.province",stylers: [{visibility: "off"}]/** /},{featureType: "administrative.locality",stylers: [{ visibility: "off" }]},{featureType: "administrative.neighborhood",stylers: [{ visibility: "on" }]/**/}, {featureType: "water",elementType: "labels",stylers: [{visibility: "on"}, {lightness: -25}, {saturation: -100}]}, {featureType: "water",elementType: "geometry",stylers: [{hue: "#ffff00"}, {lightness: -25}, {saturation: -97}]}],
    }
    map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
    var image = '<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo_blue.png';

    geocoder = new google.maps.Geocoder();
    geocoder.geocode( { 'address': '<?php echo get_post_meta( $post->ID, '_addr_fulladdr', true ); ?>'}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
        map.setCenter(results[0].geometry.location);
        var marker = new google.maps.Marker({
            map: map,
            position: results[0].geometry.location,
            //icon: image
        });
      } else {
        console.log('Geocode was not successful for the following reason: ' + status);
      }
    });
  }

  google.maps.event.addDomListener(window, 'load', initialize);

</script>