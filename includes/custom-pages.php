<?php

  $custom_fields = array(
    'text' => function ($meta, $meta_id){
      ?>
        <div class="custom-field" >
          <label class="custom-fields__label" for="<?php echo esc_attr($meta_id . '[text]' );?>"><?php esc_html_e( 'Hero Title', 'sky-tulum' );?></label>
          <input type="text" name="<?php echo esc_attr($meta_id . '[text]' );?>" id="<?php echo esc_attr($meta_id . '[text]' );?>" class="regular-text" value="<?php if (is_array($meta) && isset($meta['text'])){ echo esc_attr($meta['text']);} ?>">
          <?php esc_html_e( 'El valor por defecto es el titulo de la página', 'sky-tulum' );?>
        </div>
        <br>
      <?php
    },
    'area' => function ($meta, $meta_id){
      ?>
        <div class="custom-field" >
          <label class="custom-fields__label" for="<?php echo esc_attr($meta_id . '[area]' );?>"><?php esc_html_e( 'Area', 'sky-tulum' );?></label>
          <div>
            <input type="text" name="<?php echo esc_attr($meta_id . '[area]' );?>" id="<?php echo esc_attr($meta_id . '[area]' );?>" class="regular-text" value="<?php if (is_array($meta) && isset($meta['area'])){ echo esc_attr($meta['area']);} ?>">
          </div>
          <br>
        </div>
      <?php
    },
    'unit' => function ($meta, $meta_id){
      ?>
        <div class="custom-field" >
          <label class="custom-fields__label" for="<?php echo esc_attr($meta_id . '[area]' );?>"><?php esc_html_e( 'Unidad', 'sky-tulum' );?></label>
          <div>
            <input type="text" name="<?php echo esc_attr($meta_id . '[unit]' );?>" id="<?php echo esc_attr($meta_id . '[unit]' );?>" class="regular-text" value="<?php if (is_array($meta) && isset($meta['unit'])){ echo esc_attr($meta['unit']);} ?>">
          </div>
          <br>
        </div>
      <?php
    },
    'type' => function ($meta, $meta_id){
      ?>
        <div class="custom-field" >
          <label class="custom-fields__label" for="<?php echo esc_attr($meta_id . '[type]' );?>"><?php esc_html_e( 'Tipo', 'sky-tulum' );?></label>
          <div>
            <input type="text" name="<?php echo esc_attr($meta_id . '[type]' );?>" id="<?php echo esc_attr($meta_id . '[type]' );?>" class="regular-text" value="<?php if (is_array($meta) && isset($meta['type'])){ echo esc_attr($meta['type']);} ?>">
          </div>
          <br>
        </div>
      <?php
    },
    'total' => function ($meta, $meta_id){
      ?>
        <div class="custom-field" >
          <label class="custom-fields__label" for="<?php echo esc_attr($meta_id . '[total]' );?>"><?php esc_html_e( 'Total', 'sky-tulum' );?></label>
          <div>
            <input type="text" name="<?php echo esc_attr($meta_id . '[total]' );?>" id="<?php echo esc_attr($meta_id . '[total]' );?>" class="regular-text" value="<?php if (is_array($meta) && isset($meta['total'])){ echo esc_attr($meta['total']);} ?>">
          </div>
          <br>
        </div>
      <?php
    },
    'sell' => function ($meta, $meta_id){
      ?>
        <div class="custom-field" >
          <label class="custom-fields__label" for="<?php echo esc_attr($meta_id . '[sell]' );?>"><?php esc_html_e( 'Vendido', 'sky-tulum' );?></label>
          <!-- <input type="checkbox" name="<?php echo esc_attr($meta_id . '[sell]' );?>" id="<?php echo esc_attr($meta_id . '[sell]' );?>" class="regular-text" value="<?php if (is_array($meta) && isset($meta['sell'])){ echo esc_attr($meta['area']);} ?>"> -->
          <input type="checkbox" name="<?php echo esc_attr($meta_id . '[sell]' );?>" id="<?php echo esc_attr($meta_id . '[sell]' );?>" class="regular-text" value="vendido" <?php if (is_array($meta) && isset($meta['sell'])){ echo 'checked';} ?>>
        </div>
        <br>
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
    'image' => function ($meta, $meta_id){
      ?>
        <div class="custom-field" >
          <label class="custom-fields__label" for="<?php echo esc_attr($meta_id . '[text]' );?>"><?php esc_html_e( 'Imagen', 'sky-tulum' );?></label>
          <figure class="gallery__fig" id="imageField" data-title="<?php esc_html_e( 'Seleciona una imagen', 'sky-tulum' );?>" data-button="<?php esc_html_e( 'Selecionar', 'sky-tulum' );?>" >
            <input class="gallery__input" type="text" value="<?php if (is_array($meta) && isset($meta['image'])){ echo esc_attr($meta['image']);} ?>" name="<?php echo esc_attr($meta_id . '[image]' );?>" id="<?php echo esc_attr($meta_id . '[image]' );?>">
            <?php if (is_array($meta) && isset($meta['image'])){ 
              ?>
              <img width="100" class="gallery__img" src="<?php echo esc_attr($meta['image']); ?>"  >
              <?php 
              } 
            ?>
          </figure>
        </div>
        <br>
      <?php
    },
    'list' => function ($meta, $meta_id){
      ?>
        <div class="custom-field list" >
            <label class="custom-fields__label" for="<?php echo esc_attr($meta_id . '[list]' );?>"><?php esc_html_e( 'Lista', 'sky-tulum' );?></label>
            <div>
            <textarea name="<?php echo esc_attr($meta_id . '[list]' );?>" id="<?php echo esc_attr($meta_id . '[list]' );?>" cols="50" rows="5"><?php if (is_array($meta) && isset($meta['list'])){ echo esc_attr($meta['list']);} ?></textarea>
            </div>
        </div>
        <br>
      <?php
    }

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
  $custom_pages['proyecto'] = array(
    'name'           =>   __('modelos','sky-tulum'),
    'template'       =>   'models.php',
    //custom-field must be a array
    'custom-fields'  =>   array(
      $custom_fields['image'],
      $custom_fields['list'],
    ) 
  );

  