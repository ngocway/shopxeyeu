<?php $khuyen_mai_1=get_field('khuyen_mai_1');
$khuyen_mai_2=get_field('khuyen_mai_2');
$khuyen_mai_3=get_field('khuyen_mai_3');
$khuyen_mai_4=get_field('khuyen_mai_4');
$khuyen_mai_5=get_field('khuyen_mai_5');
?>

<?php if($khuyen_mai_1) {?>
<div class="khuyen-mai">
	<h4>
		Thông tin khuyến mại
	</h4>
	<ul>	
		<li><?php the_field('khuyen_mai_1');?></li>
		<?php if($khuyen_mai_2){?>
		<li><?php the_field('khuyen_mai_2');?></li>
		<?php }?>
		<?php if($khuyen_mai_3){?>
		<li><?php the_field('khuyen_mai_3');?></li>
		<?php }?>
		<?php if($khuyen_mai_4){?>
		<li><?php the_field('khuyen_mai_4');?></li>
		<?php }?>
		<?php if($khuyen_mai_5){?>
		<li><?php the_field('khuyen_mai_5');?></li>
		<?php }?>
	</ul>
</div>
<?php };?>
<?php
/**
 * Single Product Share
 *
 * Sharing plugins can hook into here or you can add your own code directly.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/share.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

do_action( 'woocommerce_share' ); // Sharing plugins can hook into here.

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
