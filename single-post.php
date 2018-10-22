<?php
/*
 * Template Name: Post notice
 * Template Post Type: post
 */

get_header();
$GLOBALS[ 'nextLink' ] =  '';
$GLOBALS[ 'prevLink' ] =  '';
// Start the loop.
while ( have_posts() ) : the_post();

  $next_post= get_adjacent_post( true, '', false );
  $prev_post= get_adjacent_post( true, '', true );

 if(get_permalink( $next_post->ID ) != get_permalink( )) {

   $GLOBALS[ 'nextLink' ] =  get_permalink( $next_post->ID );
 }

  $GLOBALS[ 'prevLink' ] =  get_permalink( $prev_post->ID );

?>
<section class="perspective left news">
  <h2 class="perspective__title section__title title-2 bg-square-center t-uppercase news__title"><?php the_title(); ?></h2>
  <time class="news__date" datetime="2018-10-12"><?php the_date(); ?></time>
  <figure class="perspective__fig"><img class="perspective__img" src="<?php the_post_thumbnail_url(); ?>"></figure>
</section>
<section class="post">
  <div class="post__text">
    <?php the_content(); ?>
  </div>
</section>
<?php 
endwhile;
?>
<section class="posts" id="posts">
  <?php 
  $args = array(
    'posts_per_page' => 6,
    // 'offset' => 0,
    // 'cat' => $cat->cat_ID,
    // 'orderby' => 'ID',
    // 'order' => 'DESC',
    'post_type' => 'post',
    'post_status' => 'publish'
    // 'suppress_filters' => true 
  );
  
  $posts = new WP_Query($args);
  
  ?>
  <?php
  if( $posts->have_posts() ): while( $posts->have_posts() ) : $posts->the_post();
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
endif
?>
</section>
<?php
get_footer(); ?>