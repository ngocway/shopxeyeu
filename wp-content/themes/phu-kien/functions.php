<?php
// Add custom Theme Functions here
// 
function ttit_add_element_ux_builder(){
  add_ux_builder_shortcode('title_with_cat', array(
    'name'      => __('Title With Category'),
    'category'  => __('Content'),
    'info'      => '{{ text }}',
    'wrap'      => false,
    'options' => array(
      'ttit_cat_ids' => array(
        'type' => 'select',
        'heading' => 'Categories',
        'param_name' => 'ids',
        'config' => array(
          'multiple' => true,
          'placeholder' => 'Select...',
          'termSelect' => array(
            'post_type' => 'product_cat',
            'taxonomies' => 'product_cat'
          )
        )
      ),
      'style' => array(
        'type'    => 'select',
        'heading' => 'Style',
        'default' => 'normal',
        'options' => array(
          'normal'      => 'Normal',
          'center'      => 'Center',
          'bold'        => 'Left Bold',
          'bold-center' => 'Center Bold',
        ),
      ),
      'text' => array(
        'type'       => 'textfield',
        'heading'    => 'Title',
        'default'    => 'Lorem ipsum dolor sit amet...',
        'auto_focus' => true,
      ),
      'tag_name' => array(
        'type'    => 'select',
        'heading' => 'Tag',
        'default' => 'h3',
        'options' => array(
          'h1' => 'H1',
          'h2' => 'H2',
          'h3' => 'H3',
          'h4' => 'H4',
        ),
      ),
      'color' => array(
        'type'     => 'colorpicker',
        'heading'  => __( 'Color' ),
        'alpha'    => true,
        'format'   => 'rgb',
        'position' => 'bottom right',
      ),
      'width' => array(
        'type'    => 'scrubfield',
        'heading' => __( 'Width' ),
        'default' => '',
        'min'     => 0,
        'max'     => 1200,
        'step'    => 5,
      ),
      'margin_top' => array(
        'type'        => 'scrubfield',
        'heading'     => __( 'Margin Top' ),
        'default'     => '',
        'placeholder' => __( '0px' ),
        'min'         => - 100,
        'max'         => 300,
        'step'        => 1,
      ),
      'margin_bottom' => array(
        'type'        => 'scrubfield',
        'heading'     => __( 'Margin Bottom' ),
        'default'     => '',
        'placeholder' => __( '0px' ),
        'min'         => - 100,
        'max'         => 300,
        'step'        => 1,
      ),
      'size' => array(
        'type'    => 'slider',
        'heading' => __( 'Size' ),
        'default' => 100,
        'unit'    => '%',
        'min'     => 20,
        'max'     => 300,
        'step'    => 1,
      ),
      'link_text' => array(
        'type'    => 'textfield',
        'heading' => 'Link Text',
        'default' => '',
      ),
      'link' => array(
        'type'    => 'textfield',
        'heading' => 'Link',
        'default' => '',
      ),
    ),
  ));
}
add_action('ux_builder_setup', 'ttit_add_element_ux_builder');

function title_with_cat_shortcode( $atts, $content = null ){
  extract( shortcode_atts( array(
    '_id' => 'title-'.rand(),
    'class' => '',
    'visibility' => '',
    'text' => 'Lorem ipsum dolor sit amet...',
    'tag_name' => 'h3',
    'sub_text' => '',
    'style' => 'normal',
    'size' => '100',
    'link' => '',
    'link_text' => '',
    'target' => '',
    'margin_top' => '',
    'margin_bottom' => '',
    'letter_case' => '',
    'color' => '',
    'width' => '',
    'icon' => '',
  ), $atts ) );
  $classes = array('container', 'section-title-container');
  if ( $class ) $classes[] = $class;
  if ( $visibility ) $classes[] = $visibility;
  $classes = implode(' ', $classes);
  $link_output = '';
  if($link) $link_output = '<a href="'.$link.'" target="'.$target.'">'.$link_text.get_flatsome_icon('icon-angle-right').'</a>';
  $small_text = '';
  if($sub_text) $small_text = '<small class="sub-title">'.$atts['sub_text'].'</small>';
  if($icon) $icon = get_flatsome_icon($icon);
  // fix old
  if($style == 'bold_center') $style = 'bold-center';
  $css_args = array(
   array( 'attribute' => 'margin-top', 'value' => $margin_top),
   array( 'attribute' => 'margin-bottom', 'value' => $margin_bottom),
  );
  if($width) {
    $css_args[] = array( 'attribute' => 'max-width', 'value' => $width);
  }
  $css_args_title = array();
  if($size !== '100'){
    $css_args_title[] = array( 'attribute' => 'font-size', 'value' => $size, 'unit' => '%');
  }
  if($color){
    $css_args_title[] = array( 'attribute' => 'color', 'value' => $color);
  }
  if ( isset( $atts[ 'ttit_cat_ids' ] ) ) {
    $ids = explode( ',', $atts[ 'ttit_cat_ids' ] );
    $ids = array_map( 'trim', $ids );
    $parent = '';
    $orderby = 'include';
  } else {
    $ids = array();
  }
  $args = array(
    'taxonomy' => 'product_cat',
    'include'    => $ids,
    'pad_counts' => true,
    'child_of'   => 0,
  );
  $product_categories = get_terms( $args );
  $hdevvn_html_show_cat = '';
  if ( $product_categories ) {
    foreach ( $product_categories as $category ) {
      $term_link = get_term_link( $category );
      $thumbnail_id = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true  );
      if ( $thumbnail_id ) {
        $image = wp_get_attachment_image_src( $thumbnail_id, $thumbnail_size);
        $image = $image[0];
      } else {
        $image = wc_placeholder_img_src();
      }
      $hdevvn_html_show_cat .= '<li class="hdevvn_cats"><a href="'.$term_link.'">'.$category->name.'</a></li>';
    }
  }
  return '<div class="'.$classes.'" '.get_shortcode_inline_css($css_args).'><'. $tag_name . ' class="section-title section-title-'.$style.'"><b></b><span class="section-title-main" '.get_shortcode_inline_css($css_args_title).'>'.$icon.$text.$small_text.'</span>
  <span class="hdevvn-show-cats">'.$hdevvn_html_show_cat.'</span><b></b>'.$link_output.'</' . $tag_name .'></div><!-- .section-title -->';
}
add_shortcode('title_with_cat', 'title_with_cat_shortcode');





/*Sale price by devvn - levantoan.com*/
function devvn_price_html($product, $is_variation = false){
    ob_start();
 
    if($product->is_on_sale()):
    ?>
    <style>
        .devvn_single_price {
            background-color: #199bc42e;
            border: 1px dashed #199bc4;
            padding: 10px;
            border-radius: 3px;
            -moz-border-radius: 3px;
            -webkit-border-radius: 3px;
            margin: 0 0 10px;
            color: #000;
        }
 
        .devvn_single_price span.label {
            color: #333;
            font-weight: 400;
            font-size: 14px;
            padding: 0;
            margin: 0;
            float: left;
            width: 82px;
            text-align: left;
            line-height: 18px;
        }
 
        .devvn_single_price span.devvn_price .amount {
            font-size: 14px;
            font-weight: 700;
            color: #ff3a3a;
        }
 
        .devvn_single_price span.devvn_price del .amount, .devvn_single_price span.devvn_price del {
            font-size: 14px;
            color: #333;
            font-weight: 400;
        }
    </style>
    <?php
    endif;
 
    if($product->is_on_sale() && ($is_variation || $product->is_type('simple') || $product->is_type('external'))) {
        $sale_price = $product->get_sale_price();
        $regular_price = $product->get_regular_price();
        if($regular_price) {
            $sale = round(((floatval($regular_price) - floatval($sale_price)) / floatval($regular_price)) * 100);
            $sale_amout = $regular_price - $sale_price;
            ?>
            <div class="devvn_single_price">
						
<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

$classes = array();
if($product->is_on_sale()) $classes[] = 'price-on-sale';
if(!$product->is_in_stock()) $classes[] = 'price-not-in-stock'; ?>
<div class="price-wrapper">
	<p class="price product-page-price <?php echo implode(' ', $classes); ?>">Giá khuyến mại:
  <?php echo $product->get_price_html(); ?></p>
</div>
				
<div>
							<span class="label-sale">Giá thị trường:</span><span class="gia-goc"> <?php echo wc_price($regular_price); ?></span>  
</div>
<div>
							<span class="label-sale">Tiết kiệm:</span><span class="gia-tiet-kiem"> <?php echo wc_price($sale_amout); ?></span>  
</div>	
					</div>				

				<div class="label-sale">
				</div>

            <?php
        }
    }elseif($product->is_on_sale() && $product->is_type('variable')){
        $prices = $product->get_variation_prices( true );
        if ( empty( $prices['price'] ) ) {
            $price = apply_filters( 'woocommerce_variable_empty_price_html', '', $product );
        } else {
            $min_price     = current( $prices['price'] );
            $max_price     = end( $prices['price'] );
            $min_reg_price = current( $prices['regular_price'] );
            $max_reg_price = end( $prices['regular_price'] );
 
            if ( $min_price !== $max_price ) {
                $price = wc_format_price_range( $min_price, $max_price ) . $product->get_price_suffix();
            } elseif ( $product->is_on_sale() && $min_reg_price === $max_reg_price ) {
                $sale = round(((floatval($max_reg_price) - floatval($min_price)) / floatval($max_reg_price)) * 100);
                $sale_amout = $max_reg_price - $min_price;
                ?>
                <div class="devvn_single_price">
                    <div>
                        <span class="label">Giá khuyến mại:</span>
                        <span class="devvn_price"><?php echo wc_price($min_price); ?></span>
                    </div>
                    <div>
                        <span class="label">Giá thị trường:</span>
                        <span class="devvn_price"><del><?php echo wc_price($max_reg_price); ?></del></span>
                    </div>
                    <div>
                        <span class="label">Tiết kiệm:</span>
                        <span class="devvn_price sale_amount"> <?php echo wc_price($sale_amout); ?> (<?php echo $sale; ?>%)</span>
                    </div>
                </div>
                <?php
            } else {
                $price = wc_price( $min_price ) . $product->get_price_suffix();
            }
        }
        echo $price;
 
    }else{ ?>
        <p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) );?>"><?php echo $product->get_price_html(); ?></p>
    <?php }
    return ob_get_clean();
}
function woocommerce_template_single_price(){
    global $product;
    echo devvn_price_html($product);
}
 
add_filter('woocommerce_available_variation','devvn_woocommerce_available_variation', 10, 3);
function devvn_woocommerce_available_variation($args, $thisC, $variation){
    $old_price_html = $args['price_html'];
    if($old_price_html){
        $args['price_html'] = devvn_price_html($variation, true);
    }
    return $args;
}




register_sidebar(array(
    'name' => 'Sidebar Product 2',
    'id' => 'sidebar-product-2',
    'description' => 'Sidebar Product 2',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h1 class="widget-title">',
    'after_title' => '</h1>'
));


// Rename product data tabs
add_filter( 'woocommerce_product_tabs', 'woo_rename_tabs', 98 );
function woo_rename_tabs( $tabs ) {
 
    $tabs['description']['title'] = __( 'Thông tin sản phẩm' );       // Rename the description tab
    $tabs['reviews']['title'] = __( 'Đánh giá & bình luận' );                // Rename the reviews tab
    $tabs['additional_information']['title'] = __( 'Thông tin thêm' );    // Rename the additional information tab
 
    return $tabs;
 
}



/*
 * Thêm nút Xem thêm vào phần mô tả của danh mục sản phẩm
 * Author: Le Van Toan - https://levantoan.com
*/
add_action('wp_footer','devvn_readmore_taxonomy_flatsome');
function devvn_readmore_taxonomy_flatsome(){
    if(is_woocommerce() && is_tax('product_cat')):
        ?>
        <style>
            .tax-product_cat.woocommerce .shop-container .term-description {
                overflow: hidden;
                position: relative;
                margin-bottom: 20px;
                padding-bottom: 25px;
            }
            .devvn_readmore_taxonomy_flatsome {
                text-align: center;
                cursor: pointer;
                position: absolute;
                z-index: 10;
                bottom: 0;
                width: 100%;
                background: #fff;
            }
            .devvn_readmore_taxonomy_flatsome:before {
                height: 55px;
                margin-top: -45px;
                content: "";
                background: -moz-linear-gradient(top, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%);
                background: -webkit-linear-gradient(top, rgba(255,255,255,0) 0%,rgba(255,255,255,1) 100%);
                background: linear-gradient(to bottom, rgba(255,255,255,0) 0%,rgba(255,255,255,1) 100%);
                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff00', endColorstr='#ffffff',GradientType=0 );
                display: block;
            }
            .devvn_readmore_taxonomy_flatsome a {
                color: #318A00;
                display: block;
            }
            .devvn_readmore_taxonomy_flatsome a:after {
                content: '';
                width: 0;
                right: 0;
                border-top: 6px solid #318A00;
                border-left: 6px solid transparent;
                border-right: 6px solid transparent;
                display: inline-block;
                vertical-align: middle;
                margin: -2px 0 0 5px;
            }
            .devvn_readmore_taxonomy_flatsome_less:before {
                display: none;
            }
            .devvn_readmore_taxonomy_flatsome_less a:after {
                border-top: 0;
                border-left: 6px solid transparent;
                border-right: 6px solid transparent;
                border-bottom: 6px solid #318A00;
            }
        </style>
        <script>
            (function($){
                $(document).ready(function(){
                    $(window).load(function(){
                        if($('.tax-product_cat.woocommerce .shop-container .term-description').length > 0){
                            var wrap = $('.tax-product_cat.woocommerce .shop-container .term-description');
                            var current_height = wrap.height();
                            var your_height = 600;
                            if(current_height > your_height){
                                wrap.css('height', your_height+'px');
                                wrap.append(function(){
                                    return '<div class="devvn_readmore_taxonomy_flatsome devvn_readmore_taxonomy_flatsome_show"><a title="Xem thêm" href="javascript:void(0);">Xem thêm</a></div>';
                                });
                                wrap.append(function(){
                                    return '<div class="devvn_readmore_taxonomy_flatsome devvn_readmore_taxonomy_flatsome_less" style="display: none"><a title="Thu gọn" href="javascript:void(0);">Thu gọn</a></div>';
                                });
                                $('body').on('click','.devvn_readmore_taxonomy_flatsome_show', function(){
                                    wrap.removeAttr('style');
                                    $('body .devvn_readmore_taxonomy_flatsome_show').hide();
                                    $('body .devvn_readmore_taxonomy_flatsome_less').show();
                                });
                                $('body').on('click','.devvn_readmore_taxonomy_flatsome_less', function(){
                                    wrap.css('height', your_height+'px');
                                    $('body .devvn_readmore_taxonomy_flatsome_show').show();
                                    $('body .devvn_readmore_taxonomy_flatsome_less').hide();
                                });
                            }
                        }
                    });
                })
            })(jQuery)
        </script>
    <?php
    endif;
}



/*
* Author: Le Van Toan - https://levantoan.com
* Đoạn code thu gọn nội dung bao gồm cả nút xem thêm và thu gọn lại sau khi đã click vào xem thêm
*/
add_action('wp_footer','devvn_readmore_flatsome');
function devvn_readmore_flatsome(){
    ?>
    <style>
        .single-product div#tab-description {
            overflow: hidden;
            position: relative;
            padding-bottom: 25px;
        }
        .single-product .tab-panels div#tab-description.panel:not(.active) {
            height: 0 !important;
        }
        .devvn_readmore_flatsome {
            text-align: center;
            cursor: pointer;
            position: absolute;
            z-index: 10;
            bottom: 0;
            width: 100%;
            background: #fff;
        }
        .devvn_readmore_flatsome:before {
            height: 55px;
            margin-top: -45px;
            content: "";
            background: -moz-linear-gradient(top, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%);
            background: -webkit-linear-gradient(top, rgba(255,255,255,0) 0%,rgba(255,255,255,1) 100%);
            background: linear-gradient(to bottom, rgba(255,255,255,0) 0%,rgba(255,255,255,1) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff00', endColorstr='#ffffff',GradientType=0 );
            display: block;
        }
        .devvn_readmore_flatsome a {
            color: #318A00;
            display: block;
        }
        .devvn_readmore_flatsome a:after {
            content: '';
            width: 0;
            right: 0;
            border-top: 6px solid #318A00;
            border-left: 6px solid transparent;
            border-right: 6px solid transparent;
            display: inline-block;
            vertical-align: middle;
            margin: -2px 0 0 5px;
        }
        .devvn_readmore_flatsome_less a:after {
            border-top: 0;
            border-left: 6px solid transparent;
            border-right: 6px solid transparent;
            border-bottom: 6px solid #318A00;
        }
        .devvn_readmore_flatsome_less:before {
            display: none;
        }
    </style>
    <script>
        (function($){
            $(document).ready(function(){
                $(window).load(function(){
                    if($('.single-product div#tab-description').length > 0){
                        var wrap = $('.single-product div#tab-description');
                        var current_height = wrap.height();
                        var your_height = 10000;
                        if(current_height > your_height){
                            wrap.css('height', your_height+'px');
                            wrap.append(function(){
                                return '<div class="devvn_readmore_flatsome devvn_readmore_flatsome_more"><a title="Xem thêm" href="javascript:void(0);">Xem thêm</a></div>';
                            });
                            wrap.append(function(){
                                return '<div class="devvn_readmore_flatsome devvn_readmore_flatsome_less" style="display: none;"><a title="Xem thêm" href="javascript:void(0);">Thu gọn</a></div>';
                            });
                            $('body').on('click','.devvn_readmore_flatsome_more', function(){
                                wrap.removeAttr('style');
                                $('body .devvn_readmore_flatsome_more').hide();
                                $('body .devvn_readmore_flatsome_less').show();
                            });
                            $('body').on('click','.devvn_readmore_flatsome_less', function(){
                                wrap.css('height', your_height+'px');
                                $('body .devvn_readmore_flatsome_less').hide();
                                $('body .devvn_readmore_flatsome_more').show();
                            });
                        }
                    }
                });
            })
        })(jQuery)
    </script>
    <?php
}



//CODE LAY LUOT XEM
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "01 lượt xem";
    }
    return $count.' lượt xem';
}
 
// CODE DEM LUOT XEM
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
  
//CODE HIEN THI SO LUOT XEM BAI VIET TRONG DASHBOARDH
add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);
function posts_column_views($defaults){
    $defaults['post_views'] = __('Views');
    return $defaults;
}
function posts_custom_column_views($column_name, $id){
    if($column_name === 'post_views'){
        echo getPostViews(get_the_ID());
    }
}
function smartline_meta_date_capnhat() {
 
	$time_string = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date published updated" datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);
 
	echo '<span class="meta-date-capnhat">' . $time_string . '</span>';
}
