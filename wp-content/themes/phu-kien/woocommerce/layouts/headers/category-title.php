<div class="duong-dan-breadcrumbs">
	<div class="container">
			<?php
if ( function_exists('yoast_breadcrumb') ) {
  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
}
?>
	</div>
</div>

<div class="shop-page-title category-page-title page-title <?php flatsome_header_title_classes() ?>">
	<div class="page-title-inner flex-row  medium-flex-wrap container">
	  <div class="flex-col flex-grow medium-text-center">
	  	<?php do_action('flatsome_category_title') ;?>
	  </div>
	  <div class="flex-col medium-text-center">
	  	<?php do_action('flatsome_category_title_alt') ;?>
	  </div>
	</div>
</div>
