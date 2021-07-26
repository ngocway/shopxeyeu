<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see       https://docs.woocommerce.com/document/template-structure/
 * @package   WooCommerce/Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Get Type.
$type = get_theme_mod( 'related_products', 'slider' );
if ( $type == 'hidden' ) return;
if ( $type == 'grid' ) $type = 'row';

$repater['type']         = $type;
$repater['columns']      = get_theme_mod( 'related_products_pr_row', 4 );
$repater['columns__md']  = get_theme_mod( 'related_products_pr_row_tablet', 3 );
$repater['columns__sm']  = get_theme_mod( 'related_products_pr_row_mobile', 2 );
$repater['class']        = get_theme_mod( 'equalize_product_box' ) ? 'equalize-box' : '';
$repater['slider_style'] = 'reveal';
$repater['row_spacing']  = 'small';



if ( $related_products ) : ?>
	<div style="background: #fffaca;
    padding: 20px;
			margin-bottom:15px; 
    color: #8e0a00;
    border: 1px dashed #FF9800;
    border-radius: 10px;
			line-height: 22px; font-size:15px"><p style="margin-top:0; font-size:15px; margin-bottom:10px"><b style="color:red">Thông báo chính thức:</b> Ninh Bình Web (thuộc GiuseArt) không hợp tác với bất kỳ ai để bán giao diện Wordpress và cũng không bán ở bất kỳ kênh nào ngoại trừ <a href="https://messenger.com/t/joseph.thien.75" target="blank">Facebook</a> và <a href="https://zalo.me/0972939830" target="blank">zalo</a> chính thức. </p><p style="margin-top:0 ; margin-bottom:10px">Chúng tôi chỉ support cho những khách hàng mua source code chính chủ. Tiền nào của nấy, khách hàng cân nhắc không nên ham rẻ để mua phải source code không rõ nguồn gốc và không có support về sau! Xin cám ơn! </p></div>
	<div class="related related-products-wrapper product-section">
		
		
		<?php
		$heading = apply_filters( 'woocommerce_product_related_products_heading', __( 'Related products', 'woocommerce' ) );

		if ( $heading ) :
			?>
			
		<?php endif; ?>


	<?php get_flatsome_repeater_start( $repater ); ?>

		<?php foreach ( $related_products as $related_product ) : ?>

					<?php
					$post_object = get_post( $related_product->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found

					wc_get_template_part( 'content', 'product' );
					?>

		<?php endforeach; ?>

		<?php get_flatsome_repeater_end( $repater ); ?>

	</div>

	<?php
endif;

wp_reset_postdata();
