
    <?php 
      if (is_page_template('home.php') || is_page_template('models.php') ) {
        $visible = 'visible';
      } else {
        $visible = '';
      }
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
  <footer class="footer">
    <button class="up-btn" id="btnUp"><i class="icon-up"></i> <span class="up-btn__text">Inicio</span>  </button>
    <section class="footer__section notices-ft">
      <h2 class="footer__title notices-ft__title">Noticias</h2>
      <?php 
      $args = array(
        'posts_per_page' => 4,
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
          <time class="notice-item__date" datetime="2018-10-12"><?php the_date(); ?></time>
        </p>
      </article>
      <?php 
      endwhile;
      endif
      ?>
    </section>
    <section class="footer__section subcribe">
      <h2 class="footer__title subcribe__title contact__title t-uppercase"><?php echo _e( 'Suscribirse', 'sky-tulum' );?></h2>
      <?php 
          // echo do_shortcode( '[contact-form-7 id="64" id="110" class="contact__form" title="Solicitar información"]' ); 
          echo do_shortcode( '[contact-form-7 id="111" title="Suscribete"]' ); 
          // echo do_shortcode( '[contact-form-7 id="64" title="Solicitar información"]' ); 
          ?>
      <!-- <form class="subscribe__form">
        <input class="contact__input" type="email" name="email" placeholder="<?php echo _e( 'Correo Electrónico', 'sky-tulum' );?>">
        <button class="btn-white subscribe__btn btn" type="submit"><?php echo _e( 'Enviar', 'sky-tulum' );?></button>
      </form> -->
    </section>
    <section class="footer__section develop-copy">
      <h2 class="footer__title"><?php echo _e( 'Un desarrollo de', 'sky-tulum' );?></h2>
      <figure class="develop-copy__fig"><img class="develop-copy__img" src="<?php echo get_stylesheet_directory_uri();?>/dist/assets/img/Mia.png" alt="alt"></figure>
    </section>
  </footer>
  <?php wp_footer(); ?>
  <!-- GOOGLE MAPS START -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtS5WYRyer1rZS0ctPOLVlN0Xny1XJ7YE&callback=initMap"
    async defer></script>
    <script>
        function initMap() {
          const mapContainer = document.getElementById('map')
          console.log('Map init')

          if (mapContainer) {
            const myLatLng = {lat: 20.199254, lng: -87.477989}  
            const map = new google.maps.Map(mapContainer, {
              center: myLatLng,
              zoom: 15
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