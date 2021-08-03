<div class="product-container">
  <div class="product-main">
    <div class="row content-row mb-0">

    	<div class="product-gallery large-<?php echo flatsome_option('product_image_width'); ?> col">
    	<?php
    		/**
    		 * woocommerce_before_single_product_summary hook
    		 *
    		 * @hooked woocommerce_show_product_sale_flash - 10
    		 * @hooked woocommerce_show_product_images - 20
    		 */
    		do_action( 'woocommerce_before_single_product_summary' );
    	?>
    	</div>

    	<div class="product-info summary col-fit col entry-summary <?php flatsome_product_summary_classes();?>">
			<h1 class="product-title product_title entry-title">
	<?php the_title(); ?>
</h1>
			<div class="dong-thong-tin">
				<i class="fa fa-tags" aria-hidden="true"></i><span class="label ma-hang">Mã hàng (SKU): <?php echo get_post_meta( get_the_ID(), '_sku', true ); ?></span> <i class="fa fa-folder"></i><span class="label danh-muc"><?php global $post, $product; $cat_count = sizeof( get_the_terms( $post->ID, 'product_cat' ) ); echo $product->get_categories( ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', $cat_count, 'woocommerce' ) . ' ', '</span>' ); ?></span>
			</div>
<div class="col large-9">
	<?php
    			/**
    			 * woocommerce_single_product_summary hook
    			 *
    			 * @hooked woocommerce_template_single_title - 5
    			 * @hooked woocommerce_template_single_rating - 10
    			 * @hooked woocommerce_template_single_price - 10
    			 * @hooked woocommerce_template_single_excerpt - 20
    			 * @hooked woocommerce_template_single_add_to_cart - 30
    			 * @hooked woocommerce_template_single_meta - 40
    			 * @hooked woocommerce_template_single_sharing - 50
    			 */
    			do_action( 'woocommerce_single_product_summary' );
    		?>
</div>
<div class="col large-3">

<?php if ( is_active_sidebar( 'sidebar-product-2' ) ) : ?>
                <?php dynamic_sidebar( 'sidebar-product-2' ); ?>
<?php endif; ?>
</div>
</div>


    </div>
  </div>

  <div class="product-footer">
  	<div class="container">
		<div class="large-9">
			

    		<?php
    			/**
    			 * woocommerce_after_single_product_summary hook
    			 *
    			 * @hooked woocommerce_output_product_data_tabs - 10
    			 * @hooked woocommerce_upsell_display - 15
    			 * @hooked woocommerce_output_related_products - 20
    			 */
    			do_action( 'woocommerce_after_single_product_summary' );
    		?>
		</div>
		<div class="large-3">
			
    	<div id="product-sidebar">
    		<div class="sidebar-inner">
				<?php 
			$bo_nho_trong=get_field('bo_nho_trong');
			$camera_chinh=get_field('camera_chinh');
			$camera_phu=get_field('camera_phu');
			$cpu=get_field('cpu');
			$do_phan_giai_man_hinh=get_field('do_phan_giai_man_hinh');
			$dung_luong_pin=get_field('dung_luong_pin');
			$he_dieu_hanh=get_field('he_dieu_hanh');
			$kich_thuoc_man_hinh=get_field('kich_thuoc_man_hinh');
			$ram=get_field('ram');
			$the_sim=get_field('the_sim');
			$the_nho=get_field('the_nho');
			?>
			<?php if($bo_nho_trong){?>
			<div class="thong-so-ky-thuat">
				<h3 class="tieu-de thong-so">
					Thông số kỹ thuật
				</h3>
				<div class="row-info">
					<div class="left">
						Bộ nhớ trong
					</div>
					<div class="right">
						<?php echo $bo_nho_trong;?>
					</div>
				</div>
				<?php if($camera_chinh){?>
				<div class="row-info">
					<div class="left">
						Camera chính
					</div>
					<div class="right">
						<?php echo $camera_chinh;?>
					</div>
				</div>
				<?php }?>
				<?php if($camera_phu){?>
				<div class="row-info">
					<div class="left">
						Camera phụ
					</div>
					<div class="right">
						<?php echo $camera_phu;?>
					</div>
				</div>
				<?php }?>
				<?php if($cpu){?>
				<div class="row-info">
					<div class="left">
						CPU
					</div>
					<div class="right">
						<?php echo $cpu;?>
					</div>
				</div>
				<?php }?>
				<?php if($do_phan_giai_man_hinh){?>
				<div class="row-info">
					<div class="left">
						Độ phân giải màn hình
					</div>
					<div class="right">
						<?php echo $do_phan_giai_man_hinh;?>
					</div>
				</div>
				<?php }?>
				<?php if($dung_luong_pin){?>
				<div class="row-info">
					<div class="left">
						Dung lượng pin
					</div>
					<div class="right">
						<?php echo $dung_luong_pin;?>
					</div>
				</div>
				<?php }?>
				<?php if($he_dieu_hanh){?>
				<div class="row-info">
					<div class="left">
						Hệ điều hành
					</div>
					<div class="right">
						<?php echo $he_dieu_hanh;?>
					</div>
				</div>
				<?php }?>
				<?php if($kich_thuoc_man_hinh){?>
				<div class="row-info">
					<div class="left">
						Kích thước màn hình
					</div>
					<div class="right">
						<?php echo $kich_thuoc_man_hinh;?>
					</div>
				</div>
				<?php }?>
				<?php if($ram){?>
				<div class="row-info">
					<div class="left">
						Ram
					</div>
					<div class="right">
						<?php the_field('ram');?>
					</div>
				</div>
				<?php }?>
				<?php if($the_sim){?>
				<div class="row-info">
					<div class="left">
						Thẻ sim
					</div>
					<div class="right">
						<?php echo $the_sim;?>
					</div>
				</div>
				<?php }?>
				<?php if($the_nho){?>
				<div class="row-info">
					<div class="left">
						Thẻ nhớ
					</div>
					<div class="right">
						<?php echo $the_nho;?>
					</div>
				</div>
				<?php }?>
			</div>
			<?php }?>
    			<?php
    				do_action('flatsome_before_product_sidebar');
    				/**
    				 * woocommerce_sidebar hook
    				 *
    				 * @hooked woocommerce_get_sidebar - 10
    				 */
    				if (is_active_sidebar( 'product-sidebar' ) ) {
    					dynamic_sidebar('product-sidebar');
    				} else if(is_active_sidebar( 'shop-sidebar' )) {
    					dynamic_sidebar('shop-sidebar');
    				}
    			?>
    		</div>
    	</div>
		</div>
    </div>
  </div>
</div>
