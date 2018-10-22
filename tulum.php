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
    <h2 class="title-2 t-uppercase tulum__title"><?php if (isset($post_meta['title'])) {echo $post_meta['title'];};?></h2>
    <div class="tulum__text">
      <div class="tulum__text-container">
        <?php the_content(); ?> 
      </div>         
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
  $args = array(
    'posts_per_page' => 6,
    'post_type' => 'post',
    'post_status' => 'publish',
    'tax_query' => array(
      array(
      'taxonomy' => 'category',
      'field' => 'term_id',
      'terms' => (isset($post_meta['category'])) ? $post_meta['category'] : ''
       )
    )
    // 'suppress_filters' => true 
  );
  
  $posts = new WP_Query($args);
  
  ?>
  <?php
  if( $posts->have_posts() ): 
    ?>
      <section class="section" id="posts">
        <h2 class="title-2 t-uppercase"><?php if (isset($post_meta['title2'])) {echo $post_meta['title2'];};?></h2>
      </section>
      <section class="posts" id="posts">
    <?php
  while( $posts->have_posts() ) : $posts->the_post();
  $post_id = get_the_ID();
  // $post_meta = get_post_meta( $post->ID,  'specs_custom_field', true );
  ?>
  <article class="posts__item"><img class="posts__img" src="<?php the_post_thumbnail_url(); ?>"/>
    <h3 class="posts__title"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </h3>
    <time class="posts__date"><?php the_date(); ?></time>
    <!-- <div class="posts__text"><?php the_excerpt(); ?></div> -->
  </article>
  <?php 
  endwhile;
  ?>
    </section>  
  <?php
  endif;
  ?>
<?php 
get_footer();