<?php
// DISPLAYING CUSTOM FIELDS IN POSTS VIA [field name=$var] Great to use for jotform iframes	
	if (! function_exists('field_func')) {
	function field_func($atts) {
    global $post;   $name = $atts['name']; if (empty($name)) return;
    return get_post_meta($post->ID, $name, true);
	}
	add_shortcode('field', 'field_func');
	}
	
// SHORTCODE - [clear]
if (! function_exists('clear_shortcode')) {
function clear_shortcode( $atts, $content = null ) {
return '<div class="clear"></div><!-- END CLASS CLEAR-->'; }
add_shortcode( 'clear', 'clear_shortcode' );	
}

//Adds a button shortcode [button]
if (! function_exists('button_shortcode')) {
function button_shortcode( $atts, $content = null ) {
    $title = "title"; $link = "#";
    $color = 'blue'; $target = "_self";
    if (isset($atts['target'])) { $target = $atts['target'];} 
    if (isset($atts['title'])) { $title = $atts['title'];} 
    if (isset($atts['link'])) { $link = $atts['link'];} 
	if (isset($atts['color'])) { $color = $atts['color'];} 
	return '<a class="button ' . $color . '" target="' . $target . '"href="' . $link . '">' . $title . '</a>';
}
add_shortcode( 'button', 'button_shortcode' );
}


// ADD Fifty SHORTCODE 
if (! function_exists('fifty_shortcode')){
function fifty_shortcode( $atts, $content = null ) {
return '<div class="fifty">'  . do_shortcode($content) . '</div><!--end fifty-->';}
add_shortcode( 'fifty', 'fifty_shortcode' );
}