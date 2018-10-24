<?php
/**
 * Template Name: Noticias
 * @since 1.0
 * @version 1.0
 */

get_header();
$GLOBALS[ 'nextLink' ] =  '';
$GLOBALS[ 'prevLink' ] =  '';
$GLOBALS[ 'pageLink' ] =  get_permalink();
$GLOBALS[ 'postLink' ] =  '';


$args = array(
  'posts_per_page' => 1,
  'post_type' => 'post',
  'post_status' => 'publish'
);

$posts = new WP_Query($args);

?>
<?php
if( $posts->have_posts() ): while( $posts->have_posts() ) : $posts->the_post();
  $post_id = get_the_ID();
  $next_post= get_adjacent_post( true, '', false );
  $prev_post= get_adjacent_post( true, '', true );
  $GLOBALS[ 'postLink' ] =  get_permalink();
  $GLOBALS[ 'prevLink' ] = get_permalink( $prev_post->ID );
  // $post_meta = get_post_meta( $post->ID,  'post_custom_field', true );
?>
  <section class="perspective left news">
    <h2 class="perspective__title section__title title-2 bg-square-center t-uppercase news__title"><?php the_title(); ?></h2>
    <time class="news__date" datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo get_the_date(); ?></time>
    <figure class="perspective__fig"><img class="perspective__img" src="<?php the_post_thumbnail_url(); ?>"></figure>
  </section>
  <section class="post">
    <div class="post__text">
      <?php the_content(); ?>
    </div>
  </section>
<?php 
endwhile;
endif
?>
<section class="posts" id="posts">
  <?php 
  $args = array(
    'posts_per_page' => 30,
    'post_type' => 'post',
    'post_status' => 'publish'
    // ,
    // 'tax_query' => array(
    //   array(
    //   'taxonomy' => 'category',
    //   'field' => 'term_id',
    //   'terms' => (isset($post_meta['category'])) ? $post_meta['category'] : ''
    //    )
    // )
  );
  
  $posts = new WP_Query($args);
  
  ?>
  <?php
  if( $posts->have_posts() ): while( $posts->have_posts() ) : $posts->the_post();
  $post_id = get_the_ID();
  // $post_meta = get_post_meta( $post->ID,  'specs_custom_field', true );
  ?>
  <article class="posts__item">
    <figure class="posts__fig">
      <img class="posts__img" src="<?php the_post_thumbnail_url(); ?>"/>
    </figure>
    <h3 class="posts__title"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </h3>
    <time class="posts__date" datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished" ><?php echo get_the_date(); ?></time>
  </article>
  <?php 
  endwhile;
  endif
  ?>
</section>
<?php 
get_footer();