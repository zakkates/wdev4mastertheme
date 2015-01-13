<?php get_header(); ?>
<div class="container">
<?php if (have_posts()) : ?>
<h1>Search Results for: "<?php echo get_search_query()  ?>"</h1>
<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<h2><?php the_title(); ?></h2>
				<?php // include (TEMPLATEPATH . '/inc/meta.php' ); ?>
					<?php the_excerpt(); ?>
		</article>
<?php endwhile; ?>
<?php include (TEMPLATEPATH . '/inc/pagination-nav.php' ); ?>
<?php else : ?>
<h1>Searching for: "<?php echo get_search_query()  ?>"</h1> 
<p>No items were found for your search. Maybe this will help:</p>
<?php wp_nav_menu(array('theme-location' => 'main-nav-menu')); ?>
<?php endif; ?>
<div class="clear">
</div><!-- end container -->
<?php get_footer(); ?>