<?php
/**
 * Template Name: Proyecto
 * @since 1.0
 * @version 1.0
 */

get_header();
?>
<?php 
$meta = "";
if ( have_posts() ) : 
while ( have_posts() ) : the_post();
$post_meta = get_post_meta( $post->ID,  'proyecto_custom_field', true ); 
$meta = $post_meta;
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
  <section class="section-project project">
        
    <h2 class="project__title section__title title-2 bg-square-center t-uppercase">Sky Tulum</h2>
    <div class="project__description"><?php the_content(); ?></div>
    <figure class="project__fig"><img class="project__img" src="<?php the_post_thumbnail_url(); ?>" alt=""></figure>
  </section>
<?php 
endwhile;
endif
?>
<section class="section-specs specs" id="specsLightbox">
  <h2 class="specs__title section__title title-2 bg-square-center t-uppercase">Especificaciones</h2>
  
  <?php
    
        $taxonomy ='specs_categories';
        $terms = get_terms( $taxonomy);
        // var_dump($terms);
        // foreach( $terms as $term ) : 
            $posts = new WP_Query( 
              array(
                // 'term'=> $term->slug,
                'posts_per_page'=> -1,
                'post_type'=>'specs',
                'order' => 'ASC',
                // 'tax_query' => array(
                //   array(
                //       'taxonomy'  => $taxonomy,
                //       'terms'     => array( $term->slug ),
                //       'field'     => 'slug'
                //   )
                // )
              ) 
            );
            if( $posts->have_posts() ): while( $posts->have_posts() ) : $posts->the_post();
            $post_id = get_the_ID();
            $post_meta = get_post_meta( $post->ID,  'specs_custom_field', true );
              
              ?>
                <article class="level">
                  <h3 class="level__title section__title title-2 bg-center font-1-6"><?php the_title();  ?></h3>
                  <table class="table-level level__table">
                    <thead>
                      <tr>
                        <th class="table-level__col">Unidad</th>
                        <th class="table-level__col">Tipo</th>
                        <th class="table-level__col">Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $items = $post_meta['level'];
                        foreach ($items as $index => $item):
                          // if(!isset($item) ){ continue; }
                          if( $item['unit'] == ' ' || $item['unit'] == ''  ){ continue; }
                          if( $item['type'] == ' ' || $item['type'] == ''  ){ continue; }
                          if( $item['total'] == ' ' || $item['total'] == ''  ){ continue; }
                          if( $item['image'] == ' ' || $item['image'] == ''  ){ continue; }
                          // if( $item['image'] != ' ' || $item['image'] != ''  ){ continue; }
                       ?>
                        <tr class="table-level__row">
                          <th class="table-level__col"><?php if (isset($item['unit'])) echo $item['unit']; ?></th>
                          <th class="table-level__col"><?php if (isset($item['type'])) echo $item['type']; ?></th>
                          <th class="table-level__col"><?php if (isset($item['total'])) echo $item['total']; ?></th>
                          <th class="table-level__col table-level__col--btn">
                            <button class="t-uppercase table-level__btn" data-src="<?php if (isset($item['image'])) echo $item['image']; ?>" data-area="<?php if (isset($item['total'])) echo $item['total']; ?>"><i class="icon-image"></i>  Ver</button>
                          </th>
                        </tr>
                      <?php
                        endforeach;
                        
                       ?>
                    </tbody>
                  </table>
                </article>
              <?php
            endwhile; endif;
    
        // endforeach;
    
    // endforeach;
  ?>

</section>
<section class="amenities">
        <h2 class="amenities__title section__title title-2 bg-square-center t-uppercase">Amenidades</h2>
        <ul class="amenities__list">
          <li class="amenities__list-item">Sky Pool</li>
          <li class="amenities__list-item">Carril de Nado</li>
          <li class="amenities__list-item">Alberca </li>
          <li class="amenities__list-item">Jacuzzi de Acrilico</li>
          <li class="amenities__list-item">Cinema al aire libre</li>
          <li class="amenities__list-item">BBQ Brill</li>
          <li class="amenities__list-item">Bar</li>
        </ul>
        <ul class="amenities__list">
          <li class="amenities__list-item">Gym</li>
          <li class="amenities__list-item">Yoga Zone</li>
          <li class="amenities__list-item">Área de lectura</li>
          <li class="amenities__list-item">Cinema al aire libre</li>
          <li class="amenities__list-item">Snack Bar</li>
          <li class="amenities__list-item">Lavandería</li>
          <li class="amenities__list-item">Concerge</li>
        </ul>
<?php 

?> 
<?php
if (isset($meta['images'])) {
  $gallery_items = $meta['images'];
  foreach ($gallery_items as $index => $img):
  ?>
    
    <figure class="amenities__fig">
      <?php 
        if($index > 1):
          ?>
            <figcaption class="amenities__cap t-uppercase">Tulum</figcaption>
          <?php
        endif;
      ?>
      <img class="amenities__img" src="<?php echo esc_attr( $img );?>" alt="skytulum">
    </figure>
  <?php
  endforeach;
}
?>
?>
      </section>
      
<?php 
get_footer();