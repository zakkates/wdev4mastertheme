<?php get_header(); ?>
<div class="container">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<h1><?php the_title(); ?></h1>
<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style ">
<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
<a class="addthis_button_tweet"></a>
<a class="addthis_button_pinterest_pinit" pi:pinit:layout="horizontal"></a>
<a class="addthis_counter addthis_pill_style"></a>
</div>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5106f22d36c39ee5"></script>
<!-- AddThis Button END -->
<?php $contentimgcheck = get_the_content(); if (!strpos($contentimgcheck, 'img')) { the_post_thumbnail('medium', array('class' => 'alignright')); } 
the_content(); ?>
<?php endwhile; endif; ?>
<?php the_tags(); ?>
<div class="clear">
</div><!-- end container -->
<?php get_footer(); ?>