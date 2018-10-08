<?php
/**
 * Template Name: Home
 * @since 1.0
 * @version 1.0
 */

get_header();
?>
  <section class="hero section">
    <h1 class="hero__title title-1">Un increible proyecto en medio de la selva</h1><img class="hero__img" src="<?php echo get_stylesheet_directory_uri();?>/dist/assets/img/interior.jpg" alt="interior apartamento">
  </section>
  <?php 
    if ( have_posts() ) : 
      while ( have_posts() ) : the_post();
      $post_id = get_the_ID();
      ?>
        <section class="section-description description">
          <h2 class="description__title title-2 t-uppercase"><?php esc_html_e('Descripción del Proyecto','sky-tulum'); ?></h2>
          <div class="description__text"><?php the_content();  ?></div>
        </section>
        
        <?php 
          $post_meta = get_post_meta( $post->ID,  'home_custom_field', true );

          if (is_array($post_meta) && isset($post_meta['gallery'])):
            ?>
            <section class="section-gallery gallery">
            <h2 class="gallery__title section__title title-2 bg-square-center t-uppercase"><?php esc_html_e('Sky Tulum','sky-tulum'); ?></h2>
            <?php	
              $gallery_items = $post_meta['gallery'];
              foreach ($gallery_items as $index => $img):
              ?>
                <figure class="gallery__item"><img class="gallery__img" src="<?php echo esc_attr( $img );?>" alt="sky tulum techo"></figure>
              <?php
            endforeach;
            ?>
              <a class="gallery__btn btn" href="#"><?php esc_html_e('Ver Galería','sky-tulum'); ?></a>
              </section>
            <?php
          endif;
      endwhile;
    else: 
    ?>
    <p>Not desc</p>
    <?php endif; ?>
  
<?php
 ?>

<?php 
get_footer();