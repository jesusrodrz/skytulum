<?php
/**
 * Template Name: Proyecto
 * @since 1.0
 * @version 1.0
 */

get_header();
?>
<section class="hero section">
  <h1 class="hero__title title-1 bg-square-1 t-uppercase">Proyecto</h1><img class="hero__img" src="<?php get_asset('assets/img/interior.jpg'); ?>" alt="interior apartamento">
</section>
<?php 
if ( have_posts() ) : 
while ( have_posts() ) : the_post(); 
?>
  <section class="section-project project">
        
    <h2 class="project__title section__title title-2 bg-square-center t-uppercase">Sky Tulum</h2>
    <div class="project__description"><?php the_content(); ?></div>
    <figure class="project__fig"><img class="project__img" src="<?php the_post_thumbnail_url(); ?>" alt=""></figure>
  </section>
<?php 
endwhile;
endif
?>
<section class="section-specs specs">
  <h2 class="specs__title section__title title-2 bg-square-center t-uppercase">Especificaciones</h2>
  
  <?php
    
        $taxonomy ='specs_categories';
        $terms = get_terms( $taxonomy);
        // var_dump($terms);
        foreach( $terms as $term ) : 
            $posts = new WP_Query( 
              array(
                // 'term'=> $term->slug,
                'posts_per_page'=> -1,
                'post_type'=>'specs',
                'tax_query' => array(
                  array(
                      'taxonomy'  => $taxonomy,
                      'terms'     => array( $term->slug ),
                      'field'     => 'slug'
                  )
                )
              ) 
            );
            
              
              ?>
                <article class="level">
                  <h3 class="level__title section__title title-2 bg-center font-1-6"><?php echo $term->name;  ?></h3>
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
                        if( $posts->have_posts() ): while( $posts->have_posts() ) : $posts->the_post();
                        $post_id = get_the_ID();
                        $post_meta = get_post_meta( $post->ID,  'specs_custom_field', true );
                       ?>
                      <tr class="table-level__row">
                        <th class="table-level__col"><?php if (isset($post_meta['unit'])) echo $post_meta['unit']; ?></th>
                        <th class="table-level__col"><?php if (isset($post_meta['type'])) echo $post_meta['type']; ?></th>
                        <th class="table-level__col"><?php if (isset($post_meta['total'])) echo $post_meta['total']; ?></th>
                        <th class="table-level__col table-level__col--btn">
                          <button class="t-uppercase table-level__btn" data-src="<?php if (isset($post_meta['image'])) echo $post_meta['image']; ?>"><i class="icon-image"></i>  Ver</button>
                        </th>
                      </tr>
                      <?php
                        endwhile; endif;
                       ?>
                    </tbody>
                  </table>
                </article>
              <?php
            
    
        endforeach;
    
    // endforeach;
  ?>
  <!-- <article class="level">
    <h3 class="level__title section__title title-2 bg-center font-1-6">Nivel 1</h3>
    <table class="table-level level__table">
      <thead>
        <tr>
          <th class="table-level__col">Unidad</th>
          <th class="table-level__col">Tipo</th>
          <th class="table-level__col">Total</th>
        </tr>
      </thead>
      <tbody>
        <tr class="table-level__row">
          <th class="table-level__col">S-101</th>
          <th class="table-level__col">Studio-lock Off Swim Up</th>
          <th class="table-level__col">71.92 m2</th>
          <th class="table-level__col table-level__col--btn">
            <button class="t-uppercase table-level__btn" data-src="src/img/image">ver</button>
          </th>
        </tr>
        <tr class="table-level__row">
          <th class="table-level__col">S-102</th>
          <th class="table-level__col">Studio-lock Off Swim Up</th>
          <th class="table-level__col">71.92 m2</th>
          <th class="table-level__col table-level__col--btn">
            <button class="t-uppercase table-level__btn" data-src="src/img/image">ver</button>
          </th>
        </tr>
        <tr class="table-level__row">
          <th class="table-level__col">S-103</th>
          <th class="table-level__col">Studio-lock Off Swim Up</th>
          <th class="table-level__col">73.18 m2</th>
          <th class="table-level__col table-level__col--btn">
            <button class="t-uppercase table-level__btn" data-src="src/img/image">ver</button>
          </th>
        </tr>
        <tr class="table-level__row">
          <th class="table-level__col">S-104</th>
          <th class="table-level__col">Studio-lock Off Swim Up</th>
          <th class="table-level__col">73.18 m2</th>
          <th class="table-level__col table-level__col--btn">
            <button class="t-uppercase table-level__btn" data-src="src/img/image">ver</button>
          </th>
        </tr>
        <tr class="table-level__row">
          <th class="table-level__col">S-105</th>
          <th class="table-level__col">Studio-lock Off Swim Up</th>
          <th class="table-level__col">73.18 m2</th>
          <th class="table-level__col table-level__col--btn">
            <button class="t-uppercase table-level__btn" data-src="src/img/image">ver</button>
          </th>
        </tr>
        <tr class="table-level__row">
          <th class="table-level__col">S-106</th>
          <th class="table-level__col">Studio-lock Off Swim Up</th>
          <th class="table-level__col">73.18 m2</th>
          <th class="table-level__col table-level__col--btn">
            <button class="t-uppercase table-level__btn" data-src="src/img/image">ver</button>
          </th>
        </tr>
      </tbody>
    </table>
  </article>
  <article class="level">
    <h3 class="level__title section__title title-2 bg-center font-1-6">Nivel 2</h3>
    <table class="table-level level__table">
      <thead>
        <tr>
          <th class="table-level__col">Unidad</th>
          <th class="table-level__col">Tipo</th>
          <th class="table-level__col">Total</th>
        </tr>
      </thead>
      <tbody>
        <tr class="table-level__row">
          <th class="table-level__col">k-201</th>
          <th class="table-level__col">1 Habitación 1 Jacuzzi</th>
          <th class="table-level__col">59.0 m2</th>
          <th class="table-level__col table-level__col--btn">
            <button class="t-uppercase table-level__btn" data-src="src/img/image">ver</button>
          </th>
        </tr>
        <tr class="table-level__row">
          <th class="table-level__col">k-202</th>
          <th class="table-level__col">2 habitaciones Lock Off Jacuzzi</th>
          <th class="table-level__col">84.5 m2</th>
          <th class="table-level__col table-level__col--btn">
            <button class="t-uppercase table-level__btn" data-src="src/img/image">ver</button>
          </th>
        </tr>
        <tr class="table-level__row">
          <th class="table-level__col">k-203</th>
          <th class="table-level__col">1 Habitación 1 Jacuzzi</th>
          <th class="table-level__col">59.6 m2</th>
          <th class="table-level__col table-level__col--btn">
            <button class="t-uppercase table-level__btn" data-src="src/img/image">ver</button>
          </th>
        </tr>
        <tr class="table-level__row">
          <th class="table-level__col">k-204</th>
          <th class="table-level__col">1 Habitación 1 Jacuzzi</th>
          <th class="table-level__col">59.6 m2</th>
          <th class="table-level__col table-level__col--btn">
            <button class="t-uppercase table-level__btn" data-src="src/img/image">ver</button>
          </th>
        </tr>
        <tr class="table-level__row">
          <th class="table-level__col">k-205</th>
          <th class="table-level__col">1 Habitación 1 Jacuzzi</th>
          <th class="table-level__col">59.6 m2</th>
          <th class="table-level__col table-level__col--btn">
            <button class="t-uppercase table-level__btn" data-src="src/img/image">ver</button>
          </th>
        </tr>
        <tr class="table-level__row">
          <th class="table-level__col">k-206</th>
          <th class="table-level__col">1 Habitación 1 Jacuzzi</th>
          <th class="table-level__col">59.6 m2</th>
          <th class="table-level__col table-level__col--btn">
            <button class="t-uppercase table-level__btn" data-src="src/img/image">ver</button>
          </th>
        </tr>
      </tbody>
    </table>
  </article> -->
</section>
<?php 
get_footer();