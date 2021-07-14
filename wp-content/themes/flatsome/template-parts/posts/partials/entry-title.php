
<?php
if ( is_single() ) {
	echo '<h1 class="entry-title">' . get_the_title() . '</h1>';
} else {
	echo '<h2 class="entry-title"><a href="' . get_the_permalink() . '" rel="bookmark" class="plain">' . get_the_title() . '</a></h2>';
}
?>

 <div class="tag-meta-post"><?php setPostViews(get_the_ID()); ?><i class="fa fa-eye" aria-hidden="true"></i><span class="luot-xem">
<?php echo getPostViews(get_the_ID()); ?> </span><span class="fa fa-clock-o"></span><span class="meta-date-capnhat"><?php echo smartline_meta_date_capnhat(); ?></span><span class="fa fa-folder"></span><span class="danh-muc"><?php echo the_category();?></span></div>


