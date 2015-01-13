<?php
/*
Template Name: Test
*/
?>
<?php get_header(); ?>
<div class="container">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<h1><?php the_title(); ?></h1>
<?php the_content(); ?>
<?php endwhile; endif; ?>

<?php
echo "testing begins here";
echo "<br /><br />---break---<br /><br />";
super_stuff();
echo "<br /><br />---break---<br /><br />";
super_stuff();
echo "<br /><br />---break---<br /><br />";
thematicr();
echo "<br /><br />---break---<br /><br />";
echo "testing ends here";

?>
<div class="clear">
</div><!-- end container -->
<?php get_footer(); ?>