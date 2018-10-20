<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
    <!-- GOOGLE MAPS START -->
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtS5WYRyer1rZS0ctPOLVlN0Xny1XJ7YE&callback=initMap"
    async defer></script>
    
    <!-- GOOGLE MAPS END -->
    <title>
      <?php 
        if(is_front_page() || is_home()){
            echo get_bloginfo('name');
        } else if (is_tax()){
          $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

          echo $term->name;

        }else{
          echo wp_title(' ');
        }
      ?>
    </title>
  </head>
  <body>
    <header class="main-header">
      <figure class="main-logo"><img class="main-logo__img" src="<?php echo get_stylesheet_directory_uri();?>/dist/assets/img/skytulum-logo.png" alt="Sky Tulum logo"></figure>
          <?php 
            print_custom_menu('main-menu');
          ?>
          
    </header>
    <main class="main-content">