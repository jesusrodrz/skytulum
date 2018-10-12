<?php
/**
 * Template Name: Tulum
 * @since 1.0
 * @version 1.0
 */

get_header();
?>
<section class="hero section">
  <h1 class="hero__title title-1 bg-square-1">Tulum</h1><img class="hero__img" src="<?php get_asset('assets/img/interior.jpg'); ?>" alt="interior apartamento">
</section>
<?php
if ( have_posts() ) : 
while ( have_posts() ) : the_post(); 
?>
  <section class="tulum">
    <h2 class="title-2 t-uppercase tulum__title">Tulum</h2>
    <div class="tulum__text">
      <?php the_content(); ?>
    </div><img class="tulum__map" src="<?php get_asset('assets/img/mapa.png'); ?>" alt=""><img class="tulum__palm" src="<?php get_asset('assets/img/palm.png'); ?>" alt="">
  </section>
<?php 
endwhile;
endif
?>
<?php 
get_footer();