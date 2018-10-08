<?php

  $custom_fields = array(
    'text' => function ($meta, $meta_id){
      ?>
        <div class="custom-field" >
          <label class="custom-fields__label" for="<?php echo esc_attr($meta_id . '[text]' );?>"><?php esc_html_e( 'Campo Texto', 'sky-tulum' );?></label>
          <input type="text" name="<?php echo esc_attr($meta_id . '[text]' );?>" id="<?php echo esc_attr($meta_id . '[text]' );?>" class="regular-text" value="<?php if (is_array($meta) && isset($meta['text'])){ echo esc_attr($meta['text']);} ?>">
        </div>
      <?php
    },
    'gallery' => function ($meta, $meta_id){
      ?>
        <fieldset class="gallery">
          <legend><?php esc_html_e( 'Galería', 'sky-tulum' );?></legend>
          <div class="gallery__container"  id="galleryContainer" data-title-s="<?php esc_html_e( 'Seleciona una imagen para reemplazar', 'sky-tulum' );?>"  data-button="<?php esc_html_e( 'Seleccionar', 'sky-tulum' );?>" data-title="<?php esc_html_e( 'Seleciona una o multiples imágenes', 'sky-tulum' );?>" data-name="<?php echo esc_attr( $meta_id . '[gallery]' );?>" >
            <!-- <button id="addBtn" ></button> -->
            <?php 
              if (is_array($meta) && isset($meta['gallery'])):
                $gallery_items = $meta['gallery'];
                foreach ($gallery_items as $index => $img):
                  ?>
                    <figure class="gallery__fig">
                      <input class="gallery__input" type="text" value="<?php echo esc_attr( $img );?>" name="<?php echo esc_attr($meta_id . '[gallery][' . $index . ']' );?>" id="<?php echo esc_attr($meta_id . '[gallery][' . $index . ']' );?>">
                      <img width="100" class="gallery__img" src="<?php echo esc_attr( $img );?>"  >
                      <button class="gallery__btn gallery__close" ></button>
                    </figure>
                  <?php
                endforeach;
              endif;
            ?>
            <button class="gallery__btn gallery__fig--add" id="addBtn"></button>
          </div>
          
        </fieldset>

          <div class="gallery-container" id="galleryContainer" >
            <?php 

              // if (is_array($meta) && isset($meta['gallery'])):
              //   $gallery_items = explode(',',$meta['gallery']);

              //   foreach ($gallery_items as &$chart_item):
              //     $chart_array = explode(' ',$chart_item);

              //     $chart_item = array(
              //       'url' => $chart_array[0],
              //       'id'  => $chart_array[1]
              //     );
              //     $chart_url = $chart_item['url'];

              //     $chart_id = attachment_url_to_postid($chart_url);
              //     $chart = wp_get_attachment_image_src($chart_id,'thumbnail');
              ?>

        </div>
      <?php
    },
  );

  $custom_pages['home'] = array(
    'name'           =>   __('home','sky-tulum'),
    'template'       =>   'home.php',
    'custom-fields'  =>   array(
      $custom_fields['text'],
      $custom_fields['gallery']
    )
  );
  $custom_pages['proyecto'] = array(
    'name'           =>   __('proyecto','sky-tulum'),
    'template'       =>   'proyecto.php',
    //custom-field must be a array
    'custom-fields'  =>   array(
      $custom_fields['text'],
    ) 
  );

  