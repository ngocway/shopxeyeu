<?php

$align = 'small-text-center';
if ( get_theme_mod( 'footer_bottom_align' ) == 'center' ) {
  $align = 'text-center';
}

ob_start();
do_action( 'flatsome_absolute_footer_secondary' );
$flatsome_absolute_footer_secondary = trim( ob_get_clean() );
$flatsome_footer_right_text = trim( get_theme_mod( 'footer_right_text' ) );

?>
<div>
<p style = "font-size: 12px;">Bản quyền và nội dung thuộc quyền sở hữu của xesangxin.com.
Tất cả mọi sao chép phải được sự đồng ý bằng văn bản của xesangxin.com
</p>
</div>