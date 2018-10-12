<?php
/**
 * Template Name: Tulum
 * @since 1.0
 * @version 1.0
 */

get_header();
?>
<?php
if ( have_posts() ) : 
while ( have_posts() ) : the_post(); 
$post_meta = get_post_meta( $post->ID,  'tulum_custom_field', true ); 
    if (isset($post_meta['hero'])) {
      $title = $post_meta['hero']['title'];
      $img = $post_meta['hero']['img'];
    } else {
      $title = the_title();
      $img = get_stylesheet_directory_uri() . '/dist/assets/img/interior.jpg';
    }

?>
  <section class="hero section">
    <h1 class="hero__title title-1 bg-square-1"><?php echo $title;?></h1><img class="hero__img" src="<?php echo $img;?>" alt="interior apartamento">
  </section>
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