
    <?php 
      if (is_page_template('home.php') || is_page_template('models.php') ) {
        $visible = 'visible';
      } else {
        $visible = '';
      }
      $mapVisible = (is_page_template('home.php')) ? true : false;

      
    ?>
    <section class="section section-contact <?php echo $visible;?>">
      <article class="contact" id="contact">
        <div class="contact__container">
          <h3 class="contact__title t-uppercase"><?php echo _e( 'Solicitar Información', 'sky-tulum' );?></h3>
          <?php 
          echo do_shortcode( '[contact-form-7 id="64" id="110" title="Solicitar información"]' ); 
          ?>
        </div>
      </article><img class="section-contact__img" src="<?php get_asset('assets/img/moon.png')?>" alt="alt">
    </section>
    <!-- yep 1  -->
    <?php if($mapVisible):?>
      <!-- yep 2 -->
      <style>
        .map-home{
          height:80vh;width:100%
        }
      </style>
      <section id="map" class=".map-home" styles="">
      </section>
    <?php endif;?>
    <!-- yep 3 -->

    <div class="particles" id="particles" data-jsonsrc="<?php get_asset('assets/particlesjs-config.json')?>">
        <div class="particles__bg"></div>
      </div>
  </main>
    <?php  if ( $GLOBALS[ 'nextLink' ]!=  '' ): ?>
      <a href="<?php echo $GLOBALS[ 'nextLink' ]; ?>" class="post__btn--next"><i class="icon-arrow-right"></i></a>
    <?php  endif; ?>
    <?php  if ( $GLOBALS[ 'prevLink' ] !=  '' ): ?>
      <a href="<?php echo $GLOBALS[ 'prevLink' ]; ?>" class="post__btn--prev"><i class="icon-arrow-left"></i></a>
    <?php  endif; ?>
    <button class="up-btn" id="btnUp"><i class="icon-up"></i> <span class="up-btn__text"><?php esc_html_e('Inicio','sky-tulum'); ?></span>  </button>
  <footer class="footer">
    <!-- <section class="footer__section notices-ft">
      <h2 class="footer__title notices-ft__title"><?php esc_html_e('Noticias','sky-tulum'); ?></h2>
      <?php 
      $args = array(
        'posts_per_page' => 2,
        'offset' => 0,
        'cat' => $cat->cat_ID,
        'orderby' => 'ID',
        'order' => 'DESC',
        'post_type' => 'post',
        'post_status' => 'publish',
        'suppress_filters' => true 
      );
      
      $posts = new WP_Query($args);
      
      ?>
      <?php
      if( $posts->have_posts() ): while( $posts->have_posts() ) : $posts->the_post();
      $post_id = get_the_ID();
      // $post_meta = get_post_meta( $post->ID,  'specs_custom_field', true );
      ?>
      <article class="notice-item">
        <h3 class="notice-item__title"><a class="notice-item" href="<?php the_permalink(); ?>" target="blank"><?php the_title(); ?></a></h3>
        <p class="notice-item__text">
          <time class="notice-item__date" datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished" ><?php echo get_the_date(); ?></time>
        </p>
      </article>
      <?php 
      endwhile;
      endif
      ?>
    </section> -->
    <section class="footer__section subscribe">
      <h2 class="footer__title subscribe__title contact__title"><?php echo _e( 'Suscribirse', 'sky-tulum' );?></h2>

      <?php echo do_shortcode( '[contact-form-7 id="111" title="Suscribete"]' ); ?>
    </section>
    <section class="footer__section develop-copy">
      <h2 class="footer__title"><?php echo _e( 'Un desarrollo de', 'sky-tulum' );?></h2>
      <div class="develop-copy__fig">
        <nav class="develop-copy__nav">
          <a class="develop-copy__link" href="#"><i class="icon-facebook icon-social-white"></i></a>
          <a class="develop-copy__link" href="#"><i class="icon-instagram icon-social-white"></i></a>
          <a class="develop-copy__link" href="#"><i class="icon-linkedin icon-social-white"></i></a>
        </nav>
        <img class="develop-copy__img" src="<?php echo get_stylesheet_directory_uri();?>/dist/assets/img/Mia.png" alt="alt">
      </div>
    </section>
  </footer>
  <?php wp_footer(); ?>
  <!-- GOOGLE MAPS START -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC5GzyCirxbRwWAOcnz63t8r9-A8lXUTTM&callback=initMap"
    async defer></script>
    <script>
        const mapStyle = [
          {
          "elementType": "geometry.fill",
          "stylers": [
          {
          "color": "#ffffff"
          }
          ]
          },
          {
          "featureType": "administrative.land_parcel",
          "elementType": "geometry.fill",
          "stylers": [
          {
          "visibility": "on"
          }
          ]
          },
          {
          "featureType": "water",
          "elementType": "geometry.fill",
          "stylers": [
          {
          "color": "#dceae9"
          }
          ]
          }
        ]
        function initMap() {
          const mapContainer = document.getElementById('map')
          console.log('Map init')

          if (mapContainer) {
            const myLatLng = {lat: 20.199254, lng: -87.477989},
            mapCenter = {lat: 20.202531, lng: -87.462453}  
            const map = new google.maps.Map(mapContainer, {
              center: myLatLng,
              zoom: 12,
              styles: mapStyle
            })

            const marker = new google.maps.Marker({
              position: myLatLng,
              map: map,
              animation: google.maps.Animation.DROP,
              icon: '<?php get_asset('assets/img/map-marker-alt.png')?>',
              title: 'Sky tulum'
            });

            console.log('Map ready')
          }
        }
      </script>
    <!-- GOOGLE MAPS END -->

</html>