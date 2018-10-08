<?php
/**
 * Template Name: Proyecto
 * @since 1.0
 * @version 1.0
 */

get_header();
?>

<?php
//  var_dump(wp_get_theme()->get_page_templates() );
  $array = array(1, 2, 3, 4);
  foreach ($array as $clave => $valor) {
    // $array[3] se actualizará con cada valor de $array...
    echo "clave: {$clave} => valor:{$valor} ";
    // print_r($array);  
  }

 ?>

<?php 
get_footer();