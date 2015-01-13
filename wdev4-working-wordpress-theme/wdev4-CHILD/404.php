<?php get_header(); ?>
<div class="container">
<h1>Error 404 - Page Not Found</h1>
<p>It looks like the page you're trying to access no longer exits. Hopefully one of the links below will help you to find your way:</p>
<?php wp_nav_menu(array('theme-location' => 'main-nav-menu')); ?>
<div class="clear">
</div><!-- end container -->
<?php get_footer(); ?>