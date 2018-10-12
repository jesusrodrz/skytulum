<?php
/**
 * Template Name: Noticias
 * @since 1.0
 * @version 1.0
 */

get_header();
$args = array(
  'posts_per_page' => 1,
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
<section class="perspective left news">
  <h2 class="perspective__title section__title title-2 bg-square-center t-uppercase news__title">Left Title</h2>
  <time class="news__date" datetime="2018-10-12"><?php the_date(); ?></time>
  <div class="perspective__body"><?php the_excerpt(); ?></div>
  <figure class="perspective__fig"><img class="perspective__img" src="<?php the_post_thumbnail_url(); ?>"></figure>
</section>
<section class="post">
  <a href="#" class="post__btn--next"><i class="icon-arrow-right"></i></a>
  <a href="#" class="post__btn--prev"><?php next_post_link(); ?><i class="icon-arrow-left"></i></a>
  <?php next_post_link(); ?>
  <div class="post__text">
    <p><?php the_content(); ?></p>
  </div>
</section>
<?php 
endwhile;
endif
?>
<section class="posts">
  <article class="posts__item"><img class="posts__img" src="<?php get_asset('assets/img/sky-roof.jpg'); ?>"/>
    <h3 class="posts__title"> <a href="#">La primera piedra del desarrollo</a> </h3>
    <time class="posts__date">12 octubre 2018</time>
    <p class="posts__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam nostrum libero distinctio optio, voluptates adipisci delectus reiciendis quo sunt cum inventore.</p>
  </article>
  <article class="posts__item"><img class="posts__img" src="<?php get_asset('assets/img/sky-roof.jpg'); ?>"/>
    <h3 class="posts__title">La primera piedra del desarrollo</h3>
    <time class="posts__date">12 octubre 2018</time>
    <p class="posts__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam nostrum libero distinctio optio, voluptates adipisci delectus reiciendis quo sunt cum inventore.</p>
  </article>
  <article class="posts__item"><img class="posts__img" src="<?php get_asset('assets/img/sky-roof.jpg'); ?>"/>
    <h3 class="posts__title">La primera piedra del desarrollo</h3>
    <time class="posts__date">12 octubre 2018</time>
    <p class="posts__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam nostrum libero distinctio optio, voluptates adipisci delectus reiciendis quo sunt cum inventore.</p>
  </article>
  <article class="posts__item"><img class="posts__img" src="<?php get_asset('assets/img/sky-roof.jpg'); ?>"/>
    <h3 class="posts__title">La primera piedra del desarrollo</h3>
    <time class="posts__date">12 octubre 2018</time>
    <p class="posts__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam nostrum libero distinctio optio, voluptates adipisci delectus reiciendis quo sunt cum inventore.</p>
  </article>
  <article class="posts__item"><img class="posts__img" src="<?php get_asset('assets/img/sky-roof.jpg'); ?>"/>
    <h3 class="posts__title">La primera piedra del desarrollo</h3>
    <time class="posts__date">12 octubre 2018</time>
    <p class="posts__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam nostrum libero distinctio optio, voluptates adipisci delectus reiciendis quo sunt cum inventore.</p>
  </article>
  <article class="posts__item"><img class="posts__img" src="<?php get_asset('assets/img/sky-roof.jpg'); ?>"/>
    <h3 class="posts__title">La primera piedra del desarrollo</h3>
    <time class="posts__date">12 octubre 2018</time>
    <p class="posts__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam nostrum libero distinctio optio, voluptates adipisci delectus reiciendis quo sunt cum inventore.</p>
  </article>
</section>
<?php 
get_footer();