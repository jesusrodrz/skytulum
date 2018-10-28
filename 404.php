<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 *
 */

get_header(); ?>
<section class="post">
  <br>
  <br>
  <div class="post__text">
    <h1><?php esc_html_e('Oops!','sky-tulum'); ?></h1>
    <h2><?php esc_html_e('Error 404','sky-tulum'); ?></h2>
    <p><?php esc_html_e('No encontramos la página que buscas, intenta buscar desde el','sky-tulum'); ?> <a href="<?php echo home_url(); ?>"><?php esc_html_e('inicio','sky-tulum'); ?></a>.</p>
  </div>
  <br>
  <br>
</section>
<?php get_footer(); ?>