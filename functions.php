<?php
require_once(__DIR__ . '/includes/custom-functions.php');

function get_version_hash(){
  $stats = file_get_contents( get_stylesheet_directory_uri().'/dist/stats.json');
  $stats_json = json_decode($stats, true);
  $hash = $stats_json['hash'];
  return $hash;
}

function mytheme_setup(){
  
  add_theme_support('menus');

  register_nav_menu('main-menu','Skytulum Menu');

}

add_action('init','mytheme_setup');


function mytheme_script_enqueue(){

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

add_action('wp_enqueue_scripts','mytheme_script_enqueue');