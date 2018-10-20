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
          $imgs = $post_meta['hero']['gallery'];
        } else {
          $title = the_title();
          $img = get_stylesheet_directory_uri() . '/dist/assets/img/interior.jpg';
        }

      ?>  
        <section class="hero section" id="slider">
          <h1 class="hero__title title-1 bg-square-2"><?php echo $title;?></h1>
          <?php	
              if(is_array($imgs) &&  isset($post_meta['hero']['gallery']) ) {
              
                foreach ($imgs as $index => $img):
                ?>
                  <img class="hero__img <?php echo ($index == 0) ? 'active' : '';?>" src="<?php echo $img;?>" alt="interior apartamento">
                <?php
                endforeach;
              }
            ?>
          
          <img class="hero__flor" src="<?php get_asset('assets/img/flordevida.png')?>" alt="flor de la vida">
        </section> 
  <section class="tulum">
    <h2 class="title-2 t-uppercase tulum__title">Tulum</h2>
    <div class="tulum__text">
      <?php the_content(); ?>
    </div>
    <div class="tulum__map" id="map"></div>
    <!-- <img class="tulum__map" src="<?php get_asset('assets/img/mapa.png'); ?>" alt=""> -->
    <img class="tulum__palm" src="<?php get_asset('assets/img/circulo-rosa.png'); ?>" alt="">
  </section>
<?php 
endwhile;
endif
?>
<?php 
get_footer();