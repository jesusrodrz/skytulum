<?php
require_once(__DIR__ . '/includes/custom-functions.php');

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