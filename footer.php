
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
          // echo do_shortcode( '[contact-form-7 id="64" id="110" class="contact__form" title="Solicitar información"]' ); 
          echo do_shortcode( '[contact-form-7 id="64" id="110" title="Solicitar información"]' ); 
          // echo do_shortcode( '[contact-form-7 id="64" title="Solicitar información"]' ); 
          ?>
          <!-- <form class="contact__form" action="">
            <input class="contact__input" type="text" name="name" placeholder="<?php echo _e( 'Nombre Completo', 'sky-tulum' );?>">
            <input class="contact__input" type="email" name="email" placeholder="<?php echo _e( 'Correo Electrónico', 'sky-tulum' );?>">
            <button class="btn-white" type="submit">Enviar</button>
          </form> -->
        </div>
      </article><img class="section-contact__img" src="<?php get_asset('assets/img/moon.png')?>" alt="alt">
    </section>
    <div class="particles" id="particles" data-jsonsrc="<?php get_asset('assets/particlesjs-config.json')?>">
        <div class="particles__bg"></div>
      </div>
  </main>
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
</html>