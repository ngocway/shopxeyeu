<?php if ( have_posts() ) : ?>

<?php /* Start the Loop */ ?>

<?php while ( have_posts() ) : the_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="article-inner <?php flatsome_blog_article_classes(); ?>">
		<?php
			if(flatsome_option('blog_post_style') == 'default' || flatsome_option('blog_post_style') == 'inline'){
				get_template_part('template-parts/posts/partials/entry-header', flatsome_option('blog_posts_header_style') );
			}
		?>
		<?php get_template_part( 'template-parts/posts/content', 'single' ); ?>
	</div>
</article>

<?php endwhile; ?>

<?php else : ?>

	<?php get_template_part( 'no-results', 'index' ); ?>

<?php endif; ?>

<h3 class="title-news">Bài viết mới cập nhật:</h3>
<div class="newpost">
  <ul>
    <?php $posts_query = new WP_Query('posts_per_page=7');
        while ($posts_query->have_posts()) : $posts_query->the_post();
    ?>
    <li><h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4></li>
    <?php endwhile; wp_reset_query(); ?>
</ul>
 </div>