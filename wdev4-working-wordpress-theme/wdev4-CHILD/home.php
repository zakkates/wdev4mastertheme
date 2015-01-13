<?php get_header(); ?>
<div class="container">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article <?php post_class() ?>>
			<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
				<?php // include (TEMPLATEPATH . '/inc/meta.php' ); ?>
				<?php the_excerpt(); ?>
		</article> <!-- end <?php post_class() ?> -->
<?php endwhile; endif; ?>
<?php include (TEMPLATEPATH . '/inc/pagination-nav.php' ); ?>
<div class="clear">
</div><!-- end container -->
<?php get_footer(); ?>