<?php
/**
 * Template Name: Modelos
 * @since 1.0
 * @version 1.0
 */

get_header();
?>
<section class="hero section">
  <h1 class="hero__title title-1 bg-square-1 t-uppercase">Modelos</h1><img class="hero__img" src="<?php get_asset('assets/img/interior.jpg'); ?>" alt="interior apartamento">
</section>
<section class="section-models models">
  <article class="models__item">
    <h2 class="models__title section__title title-2 bg-square-center t-uppercase">Estudio</h2>
    <div class="models__description">
      <p class="models__text">65.8 m2</p>
      <ul class="models__list">
        <li class="models__list-item">1 baño</li>
        <li class="models__list-item">Totalmente Amueblado</li>
        <li class="models__list-item">Totalmente Equipado</li>
        <li class="models__list-item">Jacuzzi Privado</li>
      </ul>
    </div>
    <figure class="models__fig"> <img class="models__img" src="<?php get_asset('assets/img/sky-roof.jpg'); ?>" alt=""/><span class="models__sold">Vendido</span></figure>
  </article>
  <article class="models__item">
    <h2 class="models__title section__title title-2 bg-square-center t-uppercase">1 Habitación</h2>
    <div class="models__description">
      <p class="models__text">59.0 m2</p>
      <ul class="models__list">
        <li class="models__list-item">1 baño</li>
        <li class="models__list-item">Totalmente Amueblado</li>
        <li class="models__list-item">Totalmente Equipado</li>
        <li class="models__list-item">Jacuzzi Privado</li>
      </ul>
    </div>
    <figure class="models__fig"> <img class="models__img" src="<?php get_asset('assets/img/sky-roof.jpg'); ?>" alt=""/><span class="models__sold">Vendido</span></figure>
  </article>
</section>

<?php 
get_footer();