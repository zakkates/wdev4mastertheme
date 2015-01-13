<?php 
/*
Template Name: Wordpress Version History
*/
get_header(); ?>

<?php get_header(); ?>
<div class="container">

      <?php
$args = array('post_type'=> 'wp_theme_history', 'showposts' => '-1'  );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post(); ?>
<article>
<h2><?php the_title(); ?></h2>
<?php 
the_content(); ?>
</article>
<?php endwhile; ?>
<?php include (CHILDTHEME . '/inc/nav.php' ); ?>
<div class="clear">
</div><!-- end container -->
<?php get_footer(); ?>