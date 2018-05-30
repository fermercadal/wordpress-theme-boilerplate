<?php
/* script init */

add_action('wp_print_scripts', 'jsInit');

function jsInit() {

  if ( !is_admin() ) {

      wp_deregister_script('jquery');
      wp_register_script('jquery', get_bloginfo('template_url') . '/js/jquery-3.3.1.min.js');
      wp_enqueue_script('jquery');

      wp_enqueue_script('scripts', get_bloginfo('template_url') . '/js/scripts.js', array('jquery'));

      /* Bootstrap
      wp_enqueue_script('bootstrap', get_bloginfo('template_url') . '/js/bootstrap.min.js', array('jquery'));
      wp_enqueue_script('classie', get_bloginfo('template_url') . '/js/classie.js', array('jquery'));
      wp_enqueue_script('modernizer', get_bloginfo('template_url') . '/js/modernizr.custom.js', array('jquery'));
      */

    }

}


/* navegacion */
/*
function getPagina($slug, $echo = true)
{
  $pagina = get_page_by_path($slug);
  if ($pagina) :
    $regresar = get_permalink( $pagina->ID );
  else :
    $regresar = "#";
  endif;
 
  if($echo):
       echo $regresar;
  else:
       return $regresar;
  endif;
}

function es_actual($comparar) {
 if ('home' == $comparar && is_home() ) {
  echo 'activo';
 }
 else { 
  global $wp_query;
  $post_obj = $wp_query->get_queried_object();
  $post_slug = $post_obj->post_name;

  if ($comparar == $post_slug) {
   echo 'activo';
  }
 }
}
*/
 

/* category template */
/*
function cateActual() {
  global $wp_query;
  $cat_ID = get_query_var('cat');
  if (is_category( $cat_ID )) {
    echo 'class="category-activo"';
  }
}

function esCate() {
  if(is_category()) {
    echo 'activo';
  }
}
*/


/* excerps */
/*
function news_excerpt_length($length) {
	return 40;
}
//<?php add_filter('excerpt_length', 'page_excerpt_length'); ?>
*/

/* thumbs */
add_theme_support( 'post-thumbnails' );

/* Custom image size */
/*
if ( function_exists( 'add_image_size' ) ) { 
  add_image_size( 'new-size', 120, 75, false );
}
*/
/* // on page:
echo wp_get_attachment_image( $attachment->ID, 'new-size');
*/

/* html */
/*
function html() {?>
	<!--html-->
<?php }
*/

?>