
    <section class="section section-contact visible">
      <article class="contact" id="contact">
        <div class="contact__container">
          <h3 class="contact__title t-uppercase"><?php echo _e( 'Solicitar Información', 'sky-tulum' );?></h3>
          <form class="contact__form" action="">
            <input class="contact__input" type="text" name="name" placeholder="<?php echo _e( 'Nombre Completo', 'sky-tulum' );?>">
            <input class="contact__input" type="email" name="email" placeholder="<?php echo _e( 'Correo Electrónico', 'sky-tulum' );?>">
            <button class="btn-white" type="submit">Enviar</button>
          </form>
        </div>
      </article><img class="section-contact__img" src="<?php echo get_stylesheet_directory_uri();?>/dist/assets/img/piñanona.png" alt="alt">
    </section>
  </main>
  <footer class="footer">
    <button class="up-btn" id="btnUp"><i class="icon-up"></i> <span class="up-btn__text">Inicio</span>  </button>
    <section class="footer__section notices-ft">
      <h2 class="footer__title notices-ft__title">Noticias</h2>
      <article class="notice-item">
        <h3 class="notice-item__title"><a class="notice-item" href="#" target="blank">La primera piedra del desarrollo</a></h3>
        <p class="notice-item__text">
          <time class="notice-item__date" datetime="2018-10-12">12 octubre 2018</time>
        </p>
      </article>
      <article class="notice-item">
        <h3 class="notice-item__title"><a class="notice-item" href="#" target="blank">Tulum, patrimonio de la humanidad</a></h3>
        <p class="notice-item__text">
          <time class="notice-item__date" datetime="2018-10-12">12 octubre 2018</time>
        </p>
      </article>
      <article class="notice-item">
        <h3 class="notice-item__title"><a class="notice-item" href="#" target="blank">¿Qué hacer en Tulum?</a></h3>
        <p class="notice-item__text">
          <time class="notice-item__date" datetime="2018-10-12">12 octubre 2018</time>
        </p>
      </article>
      <article class="notice-item">
        <h3 class="notice-item__title"><a class="notice-item" href="#" target="blank">La vida en el mar es mas sabrosa</a></h3>
        <p class="notice-item__text">
          <time class="notice-item__date" datetime="2018-10-12">12 octubre 2018</time>
        </p>
      </article>
    </section>
    <section class="footer__section subcribe">
      <h2 class="footer__title subcribe__title contact__title t-uppercase"><?php echo _e( 'Suscribirse', 'sky-tulum' );?></h2>
      <form class="subscribe__form">
        <input class="contact__input" type="email" name="email" placeholder="<?php echo _e( 'Correo Electrónico', 'sky-tulum' );?>">
        <button class="btn-white subscribe__btn btn" type="submit"><?php echo _e( 'Enviar', 'sky-tulum' );?></button>
      </form>
    </section>
    <section class="footer__section develop-copy">
      <h2 class="footer__title"><?php echo _e( 'Un desarrollo de', 'sky-tulum' );?></h2>
      <figure class="develop-copy__fig"><img class="develop-copy__img" src="<?php echo get_stylesheet_directory_uri();?>/dist/assets/img/Mia.png" alt="alt"></figure>
    </section>
  </footer>
  <?php wp_footer(); ?>
</html>