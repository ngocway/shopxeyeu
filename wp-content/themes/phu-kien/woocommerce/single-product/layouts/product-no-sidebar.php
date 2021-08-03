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
      <div class="row">
         <div class="large-9 col">
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
         <div class="large-3 col">
            <div id="product-sidebar">
               <div class="sidebar-inner">
                  <?php 
                     $kich_thuoc_xe=get_field('kich-thuoc-xe');
                     $kich_thuoc_san_pham=get_field('kich-thuoc-san-pham');
                     $dien_ap=get_field('dien-ap');
                     $nhan_hieu=get_field('nhan-hieu');
                     $nuoc_san_xuat=get_field('nuoc-san-xuat');
                     $dong_xe=get_field('dong-xe');
                     $chat_lieu=get_field('chat-lieu');
                     $mau_sac=get_field('mau-sac');
                     $thong_so_khac=get_field('thong-so-khac');
                     
                     ?>
                  <?php if(true){?>
                  <div class="thong-so-ky-thuat">
                     <h3 class="tieu-de thong-so">
                        Thông số kỹ thuật
                     </h3>
                     <div class="row-info">
                        <div class="left">
                           Cỡ xe phù hợp
                        </div>
                        <div class="right">
                           <?php echo $kich_thuoc_xe;?>
                        </div>
                     </div>
                     <?php if($dien_ap){?>
                     <div class="row-info">
                        <div class="left">
                           Điện áp xe
                        </div>
                        <div class="right">
                           <?php echo $dien_ap;?>
                        </div>
                     </div>
                     <?php }?>
                     <?php if($nhan_hieu){?>
                     <div class="row-info">
                        <div class="left">
                           Nhãn hiệu sản phẩm
                        </div>
                        <div class="right">
                           <?php echo $nhan_hieu;?>
                        </div>
                     </div>
                     <?php }?>
                     <?php if($nuoc_san_xuat){?>
                     <div class="row-info">
                        <div class="left">
                           Nước sản xuất
                        </div>
                        <div class="right">
                           <?php echo $nuoc_san_xuat;?>
                        </div>
                     </div>
                     <?php }?>
                     <?php if($dong_xe){?>
                     <div class="row-info">
                        <div class="left">
                           Dòng xe phù hợp
                        </div>
                        <div class="right">
                           <?php echo $dong_xe;?>
                        </div>
                     </div>
                     <?php }?>
                     <?php if($chat_lieu){?>
                     <div class="row-info">
                        <div class="left">
                           Chất liệu sản phẩm
                        </div>
                        <div class="right">
                           <?php echo $chat_lieu;?>
                        </div>
                     </div>
                     <?php }?>
                     <?php if($mau_sac){?>
                     <div class="row-info">
                        <div class="left">
                           Màu sắc sản phẩm
                        </div>
                        <div class="right">
                           <?php echo $mau_sac;?>
                        </div>
                     </div>
                     <?php }?>
                     <?php if($thong_so_khac){?>
                     <div class="row-info">
                        <div class="left">
                           Thông số khác
                        </div>
                        <div class="right">
                           <?php echo $thong_so_khac;?>
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