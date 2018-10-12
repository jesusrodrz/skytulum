<?php
require_once(__DIR__ . '/includes/custom-functions.php');
require_once(__DIR__ . '/includes/custom-pages.php');
require_once(__DIR__ . '/includes/custom-post-types.php');

// get the hash from the stats.json file provided by webpack this hash is used for cache busting
function get_version_hash(){
  $stats = file_get_contents( get_stylesheet_directory_uri().'/dist/stats.json');
  $stats_json = json_decode($stats, true);
  $hash = $stats_json['hash'];
  return $hash;
}


// Add theme support for menu and register the main menu
function skytulum_menu_support(){
  
  add_theme_support('menus');

  register_nav_menu('main-menu','Skytulum Menu');

}

add_action('init','skytulum_menu_support');

// add stylessheets and scripst
function skytulum_script_enqueue(){

  wp_enqueue_style( 
    'theme-fonts',
    'https://fonts.googleapis.com/css?family=Raleway:200|Scheherazade&amp;amp;subset=latin-ext',
    array()
  );
  wp_enqueue_style( 
    'index-styles',
    get_stylesheet_directory_uri() . '/dist/css/index.css',
    array(),
    get_version_hash()
  );
  wp_enqueue_script( 
    'index-scripts',
    get_stylesheet_directory_uri() . '/dist/js/index.js',
    array(),
    get_version_hash(),
    true
  );
}

add_action('wp_enqueue_scripts','skytulum_script_enqueue');



function skytulum_admin_script_enqueue($hook) {
  
  wp_enqueue_script( 
    'admin-scripts',
    get_stylesheet_directory_uri() . '/dist/js/admin.js',
    array(),
    get_version_hash(),
    true
  );
  wp_enqueue_style( 
    'admin-styles',
    get_stylesheet_directory_uri() . '/dist/css/admin.css',
    array(),
    get_version_hash()
  );
}
add_action( 'admin_enqueue_scripts', 'skytulum_admin_script_enqueue' );


function skytulum_add_page_templates_custom_fields() {
  global $post;
  global $custom_pages;
  
  foreach ($custom_pages as &$custom_page) :
    
    if ( $custom_page['template'] == get_post_meta( $post->ID, '_wp_page_template', true ) && isset( $custom_page['custom-fields'] ) && $custom_page['custom-fields'] != '' ) :
    
      add_meta_box(
        $custom_page['name'] . '_custom_field', // $id
        esc_html__( 'Perzonalización', 'sky-tulum' ), // $title
        'skytulum_display_custom_fields', // $callback
        'page', // $screen
        'normal', // $context
        'high', // $priority
        array($custom_page) // args
      );
    endif;
  endforeach;

}
add_action( 'add_meta_boxes_page', 'skytulum_add_page_templates_custom_fields' );

function skytulum_display_custom_fields($post,$args) {

  global $post;
    $custom_page = $args['args'][0];
    $meta = get_post_meta( $post->ID,  $custom_page['name'] . '_custom_field', true );
  ?>

    <input type="hidden" name="<?php echo esc_attr( $custom_page['name'] . '_custom_field_nonce' );?>" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>"> 

    <!-- All fields will go here -->
    <div class="custom-fields-container">
      <?php 
        if( is_array($custom_page['custom-fields']) ){

          foreach ($custom_page['custom-fields'] as &$custom_field){
            $custom_field($meta, $custom_page['name'] . '_custom_field');
          }
        } else {
          $custom_page['custom-fields']($meta, $custom_page['name'] . '_custom_field');
        }
      ?>
    </div>
	<?php 
}

function save_custom_page_fields($post_id, $post ){

  global $custom_pages;
  global $post_types;

  foreach ($custom_pages as &$custom_page) :
    
    if ( $custom_page['template'] == get_post_meta( $post_id, '_wp_page_template', true ) ) :
      
      /* Verify the nonce before proceeding. */
      if ( !isset( $_POST[ $custom_page['name'] . '_custom_field_nonce' ] ) || !wp_verify_nonce( $_POST[ $custom_page['name'] . '_custom_field_nonce' ], basename( __FILE__ ) ) )
        return $post_id;
    
      /* Get the post type object. */
      $post_type = get_post_type_object( $post->post_type );
    
      /* Check if the current user has permission to edit the post. */
      if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
        return $post_id;
    
      /* Get the posted data and sanitize it for use as an HTML class. */
      // $new_meta_value = ( isset( $_POST[ $custom_page['name'] . '_custom_field' ] ) ? sanitize_html_class( $_POST[$custom_page['name'] . '_custom_field'] ) : ’ );
      $new_meta_value = $_POST[ $custom_page['name'] . '_custom_field'];
    
      /* Get the meta key. */
      $meta_key = $custom_page['name'] . '_custom_field';
    
      /* Get the meta value of the custom field key. */
      $meta_value = get_post_meta( $post_id, $meta_key, true );
    
      /* If a new meta value was added and there was no previous value, add it. */
      if ( $new_meta_value && ’ == $meta_value )
        add_post_meta( $post_id, $meta_key, $new_meta_value, true );
    
      /* If the new meta value does not match the old value, update it. */
      elseif ( $new_meta_value && $new_meta_value != $meta_value )
        update_post_meta( $post_id, $meta_key, $new_meta_value );
    
      /* If there is no new meta value but an old value exists, delete it. */
      elseif ( ’ == $new_meta_value && $meta_value )
        delete_post_meta( $post_id, $meta_key, $meta_value );

    endif;
  endforeach;
  
}

add_action( 'save_post', 'save_custom_page_fields', 10, 2 );



function register_models_post_type() {

  global $post;
  global $post_types;
  $args = $post_types['models']['args'];
  $args2 = $post_types['specs']['args'];
  register_post_type( 'models', $args );
  register_post_type( 'specs', $args2 );
}
add_action( 'init', 'register_models_post_type' );

function skytulum_add_models_post_type_custom_fields() {
  global $post;
  global $post_types;
  $args = $post_types['models']['args'];
      add_meta_box(
        $post_types['models']['name'].'_custom_field', // $id
        esc_html__( 'Caracteristicas', 'sky-tulum' ), // $title
        'skytulum_display_models_post_type_custom_fields', // $callback
        'models', // $screen
        'normal', // $context
        'high', // $priority
        array($post_types['models']) // args
      );
      add_meta_box(
        $post_types['specs']['name'].'_custom_field', // $id
        esc_html__( 'Caracteristicas', 'sky-tulum' ), // $title
        'skytulum_display_specs_post_type_custom_fields', // $callback
        'specs', // $screen
        'normal', // $context
        'high', // $priority
        array($post_types['specs']) // args
      );

}
add_action( 'add_meta_boxes', 'skytulum_add_models_post_type_custom_fields' );

function skytulum_display_models_post_type_custom_fields($post,$args){
  global $post;
    $custom_page = $args['args'][0];
    $meta = get_post_meta( $post->ID,  $custom_page['name'] . '_custom_field', true );
  ?>

    <input type="hidden" name="<?php echo esc_attr( $custom_page['name'] . '_custom_field_nonce' );?>" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>"> 

    <!-- All fields will go here -->
    <div class="custom-fields-container">
      <?php 
      // var_dump($custom_page)
        if( is_array($custom_page['custom-fields']) ){

          foreach ($custom_page['custom-fields'] as &$custom_field){
            $custom_field($meta, $custom_page['name'] . '_custom_field');
          }
        } else {
          $custom_page['custom-fields']($meta, $custom_page['name'] . '_custom_field');
        }
      ?>
    </div>
	<?php 
}
function skytulum_display_specs_post_type_custom_fields($post,$args){
  global $post;
    $custom_page = $args['args'][0];
    $meta = get_post_meta( $post->ID,  $custom_page['name'] . '_custom_field', true );
  ?>

    <input type="hidden" name="<?php echo esc_attr( $custom_page['name'] . '_custom_field_nonce' );?>" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>"> 

    <!-- All fields will go here -->
    <div class="custom-fields-container">
      <?php 
      // var_dump($custom_page)
        if( is_array($custom_page['custom-fields']) ){

          foreach ($custom_page['custom-fields'] as &$custom_field){
            $custom_field($meta, $custom_page['name'] . '_custom_field');
          }
        } else {
          $custom_page['custom-fields']($meta, $custom_page['name'] . '_custom_field');
        }
      ?>
    </div>
	<?php 
}

function save_custom_models_fields($post_id, $post ){

  global $custom_pages;
  global $post_types;

  
      /* Verify the nonce before proceeding. */
      if ( !isset( $_POST[ 'models_custom_field_nonce' ] ) || !wp_verify_nonce( $_POST[ 'models_custom_field_nonce' ], basename( __FILE__ ) ) )
        return $post_id;
    
      /* Get the post type object. */
      $post_type = get_post_type_object( $post->post_type );
    
      /* Check if the current user has permission to edit the post. */
      if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
        return $post_id;
    
      /* Get the posted data and sanitize it for use as an HTML class. */
      // $new_meta_value = ( isset( $_POST[ $custom_page['name'] . '_custom_field' ] ) ? sanitize_html_class( $_POST[$custom_page['name'] . '_custom_field'] ) : ’ );
      $new_meta_value = $_POST[ 'models_custom_field'];
    
      /* Get the meta key. */
      $meta_key = 'models_custom_field';
    
      /* Get the meta value of the custom field key. */
      $meta_value = get_post_meta( $post_id, $meta_key, true );
    
      /* If a new meta value was added and there was no previous value, add it. */
      if ( $new_meta_value && ’ == $meta_value )
        add_post_meta( $post_id, $meta_key, $new_meta_value, true );
    
      /* If the new meta value does not match the old value, update it. */
      elseif ( $new_meta_value && $new_meta_value != $meta_value )
        update_post_meta( $post_id, $meta_key, $new_meta_value );
    
      /* If there is no new meta value but an old value exists, delete it. */
      elseif ( ’ == $new_meta_value && $meta_value )
        delete_post_meta( $post_id, $meta_key, $meta_value );

}

add_action( 'save_post', 'save_custom_models_fields', 10, 2 );
function save_custom_specs_fields($post_id, $post ){

  global $custom_pages;
  global $post_types;

  
      /* Verify the nonce before proceeding. */
      if ( !isset( $_POST[ 'specs_custom_field_nonce' ] ) || !wp_verify_nonce( $_POST[ 'specs_custom_field_nonce' ], basename( __FILE__ ) ) )
        return $post_id;
    
      /* Get the post type object. */
      $post_type = get_post_type_object( $post->post_type );
    
      /* Check if the current user has permission to edit the post. */
      if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
        return $post_id;
    
      /* Get the posted data and sanitize it for use as an HTML class. */
      // $new_meta_value = ( isset( $_POST[ $custom_page['name'] . '_custom_field' ] ) ? sanitize_html_class( $_POST[$custom_page['name'] . '_custom_field'] ) : ’ );
      $new_meta_value = $_POST[ 'specs_custom_field'];
    
      /* Get the meta key. */
      $meta_key = 'specs_custom_field';
    
      /* Get the meta value of the custom field key. */
      $meta_value = get_post_meta( $post_id, $meta_key, true );
    
      /* If a new meta value was added and there was no previous value, add it. */
      if ( $new_meta_value && ’ == $meta_value )
        add_post_meta( $post_id, $meta_key, $new_meta_value, true );
    
      /* If the new meta value does not match the old value, update it. */
      elseif ( $new_meta_value && $new_meta_value != $meta_value )
        update_post_meta( $post_id, $meta_key, $new_meta_value );
    
      /* If there is no new meta value but an old value exists, delete it. */
      elseif ( ’ == $new_meta_value && $meta_value )
        delete_post_meta( $post_id, $meta_key, $meta_value );

}

add_action( 'save_post', 'save_custom_specs_fields', 10, 2 );


function specs_levels_taxonomy() {  
  register_taxonomy(  
      'specs_categories',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces). 
      'specs',        //post type name
      array(  
          'hierarchical' => false,  
          'label' => __('Niveles','sky-tulum'),  //Display name
          'query_var' => true,
          'rewrite' => array(
              'slug' => 'themes', // This controls the base slug that will display before each term
              'with_front' => false // Don't display the category base before 
          )
      )  
  );  
}  
add_action( 'init', 'specs_levels_taxonomy');

add_theme_support( 'post-thumbnails' );