<?php
/**
 * Template Name: Proyecto
 * @since 1.0
 * @version 1.0
 */

get_header();
?>
<?php 
$sell = __('Vendido','sky-tulum');
$view = __('Ver','sky-tulum');
$unit = __('Unidad','sky-tulum');
$type = __('Tipo','sky-tulum');
$total = __('Total','sky-tulum');
if ( have_posts() ) : 
while ( have_posts() ) : the_post();
$post_meta = get_post_meta( $post->ID,  'proyecto_custom_field', true ); 
$meta = $post_meta;
if (isset($post_meta['hero'])) {
  $title = $post_meta['hero']['title'];
  $imgs = $post_meta['hero']['gallery'];
} else {
  $title = the_title($before = '', $after = '', $echo = false );
  $img = get_stylesheet_directory_uri() . '/dist/assets/img/interior.jpg';
}

?>  
<section class="hero section" id="slider"> 
  <h1 class="hero__title title-1 bg-square-2"><?php esc_html_e( $title, 'sky-tulum' );?></h1>
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
    <h2 class="project__title section__title title-2 bg-square-center t-uppercase"><?php esc_html_e('Sky Tulum','sky-tulum'); ?></h2>
    <div class="project__description"><?php the_content(); ?></div>
    <figure class="project__fig"><img class="project__img" src="<?php the_post_thumbnail_url(); ?>" alt=""></figure>
  </section>
<?php 
endwhile;
endif
?>
<section class="amenities" id="amenities" >
  <ul class="amenities__list">
    <li class="amenities__list-item">
      <span class="amenities__icon" ><i class="icon-uniF1021"></i></span><?php esc_html_e('Carril de Nado','sky-tulum'); ?>
    </li>
    <li class="amenities__list-item">
      <span class="amenities__icon" ><i class="icon-uniF1011"></i></span><?php esc_html_e('Jacuzzi de Acrilico','sky-tulum'); ?>
    </li>
    <li class="amenities__list-item">
      <span class="amenities__icon" ><i class="icon-uniF103"></i></span><?php esc_html_e('Cinema al aire libre','sky-tulum'); ?>
    </li>
    <li class="amenities__list-item">
      <span class="amenities__icon" ><i class="icon-uniF104"></i></span><?php esc_html_e('BBQ Brill','sky-tulum'); ?>
    </li>
    <li class="amenities__list-item">
      <span class="amenities__icon" ><i class="icon-uniF105"></i></span><?php esc_html_e('Bar','sky-tulum'); ?>
    </li>
    <li class="amenities__list-item">
      <span class="amenities__icon" ><i class="icon-uniF106"></i></span><?php esc_html_e('Gym','sky-tulum'); ?>
    </li>
    <li class="amenities__list-item">
      <span class="amenities__icon" ><i class="icon-uniF107"></i></span><?php esc_html_e('Yoga Zone','sky-tulum'); ?>
    </li>
    <li class="amenities__list-item">
      <span class="amenities__icon" ><i class="icon-uniF1021"></i></span><?php esc_html_e('Alberca','sky-tulum'); ?>
    </li>
    <li class="amenities__list-item">
      <span class="amenities__icon" ><i class="icon-uniF108"></i></span><?php esc_html_e('Área de lectura','sky-tulum'); ?>
    </li>
    <li class="amenities__list-item">
      <span class="amenities__icon" ><i class="icon-uniF10B"></i></span><?php esc_html_e('Snack Bar','sky-tulum'); ?>
    </li>
    <li class="amenities__list-item">
    <span class="amenities__icon" ><i class="icon-uniF109"></i></span><?php esc_html_e('Lavandería','sky-tulum'); ?>
    </li>
    <li class="amenities__list-item">
    <span class="amenities__icon" ><i class="icon-uniF10A"></i></span><?php esc_html_e('Concerge','sky-tulum'); ?>
    </li>
  </ul>
  <?php
    if (isset($post_meta['image'])) {
      $gallery_items = $meta['image'];
      $$img= $post_meta['image'];
      // foreach ($gallery_items as $index => $img):
      ?>
        <figure class="amenities__fig">
          <?php 
            // if($index > 2 && isset($meta['linkcta']['name']) && isset($meta['linkcta']['ref']) ):
            //   $link = home_url('/'.$meta['linkcta']['ref']) ;
            //   $name =  $meta['linkcta']['name'];
              ?>
                <!-- <a class="amenities__cap t-uppercase" href="<?php 
                // echo $link;
                ?>" target="_blank" rel="noopener noreferrer"><?php 
                // echo $name;
                ?></a> -->
              <?php
            // endif;
          ?>
          <img class="amenities__img" src="<?php echo esc_attr( $img );?>" alt="skytulum">
        </figure>
      <?php
      // endforeach;
    }
  ?>
</section>
<section class="section-specs specs" id="specsLightbox">
  <h2 class="specs__title section__title title-2 bg-square-center t-uppercase"><?php esc_html_e('Especificaciones','sky-tulum'); ?></h2>
  <?php
    $taxonomy ='specs_categories';
    $terms = get_terms( $taxonomy);
    $posts = new WP_Query( 
      array(
        // 'term'=> $term->slug,
        'posts_per_page'=> -1,
        'post_type'=>'specs',
        'order' => 'ASC'
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
                <th class="table-level__col"><?php echo $unit; ?></th>
                <th class="table-level__col"><?php echo $type; ?></th>
                <th class="table-level__col"><?php echo $total; ?></th>
              </tr>
            </thead>
            <tbody>
              <?php
                $items = $post_meta['level'];
                
                foreach ($items as $index => $item):
                  if( $item['unit'] == ' ' || $item['unit'] == ''  ){ continue; }
                  if( $item['type'] == ' ' || $item['type'] == ''  ){ continue; }
                  if( $item['total'] == ' ' || $item['total'] == ''  ){ continue; }
                  if( !isset($item['image'])   ){ continue; }
                    $image_str = implode(",", $item['image']);
                ?>
                <tr class="table-level__row">
                  
                  <th class="table-level__col table-level__col--sold">
                    <?php 
                      if (isset($item['sell'])):
                        echo '<span class="models__sold table-level__sold">' . $sell . '</span>'; 
                      endif;
                    ?>
                    <?php if (isset($item['unit'])) esc_html_e( $item['unit'], 'sky-tulum' ); ?>
                  </th>
                  <th class="table-level__col"><?php if (isset($item['type'])) esc_html_e( $item['type'], 'sky-tulum' ); ?></th>
                  <th class="table-level__col"><?php if (isset($item['total'])) esc_html_e( $item['total'], 'sky-tulum' ); ?></th>
                  <th class="table-level__col table-level__col--btn">
                    <button class="t-uppercase table-level__btn" data-src="<?php if (isset($item['image'])) echo $image_str; ?>" data-area="<?php if (isset($item['total'])) echo $item['total']; ?>"><i class="icon-image"></i> <?php echo $view; ?></button>
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
  ?>
</section>

      
<?php 
get_footer();