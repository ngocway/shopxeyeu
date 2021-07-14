<?php
	$classes = array();
	$classes[] = 'is-'.get_theme_mod('breadcrumb_size', 'large');
?>
<?php
if ( function_exists('yoast_breadcrumb') ) {
  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
}
?>