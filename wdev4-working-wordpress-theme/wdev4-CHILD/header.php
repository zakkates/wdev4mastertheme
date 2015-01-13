<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta name="viewport" content="width=device-width; initial-scale=1.0;" >

		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
	<!-- Notifies older IE Browsers to download Chrome Frame to view this website -->
<!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
		<header>
			<div class="container">
			<h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
			<p><?php bloginfo('description'); ?></p>
			<?php include_once(CHILDTHEME . "/searchform.php"); ?>
			<div class="clear">
			<nav><?php wp_nav_menu(array('theme_location' => 'main-nav-menu')); ?></nav>
			<div class="clear">
			</div> <!-- end Container -->
		</header>

		