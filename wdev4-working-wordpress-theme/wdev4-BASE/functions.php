<?php
if (!defined('PARENT_THEME_VERSION')) { define('PARENT_THEME_VERSION', '1.2.1'); }
if (!defined('PARENTTHEME')) { define('PARENTTHEME', get_template_directory() );  } 
if (!defined('CHILDTHEME')) { define('CHILDTHEME', get_stylesheet_directory() );}

//Testing
include_once(PARENTTHEME . "/functions/testing.php");

// jQuery
function parent_theme_scripts_method_load_first() {
    wp_enqueue_script( 'latest-jquery','http://code.jquery.com/jquery-latest.min.js', array(), '1.11.1', true	);
    wp_enqueue_script( 'latest-jquery-migrate','//code.jquery.com/jquery-migrate-1.2.1.min.js', array(), '1.2.1', true	);
    wp_enqueue_script( 'modernizer','//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js',array('latest-jquery'), '2.8.3', true);
}
add_action( 'wp_enqueue_scripts', 'parent_theme_scripts_method_load_first', 1 );
function parent_theme_scripts_method() {
    wp_enqueue_style( 'shortcodes-css', get_template_directory_uri() . '/css/shortcodes.css', array(), '1.0', 'all' );
    wp_enqueue_style( 'standard-scripts-css', get_template_directory_uri() . '/css/standard-scripts.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'fancybox_css', get_template_directory_uri() . '/js/fancybox/jquery.fancybox.css', array(), '1.0', 'all' );
    wp_enqueue_style( 'video-pop-up-css', get_template_directory_uri() . '/css/video.css', array(), '1.0', 'all' );
    wp_enqueue_script( 'imagesloaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array('latest-jquery'), '2', true );
    wp_enqueue_script( 'video-pop-up-js', get_template_directory_uri() . '/js/video.js', array('latest-jquery'), '1.0.0', true );
	wp_enqueue_script( 'standard-scripts', get_template_directory_uri() . '/js/standard-scripts.js', array('imagesloaded'), '1.0.0', true );
    wp_enqueue_script( 'fancybox_js', get_template_directory_uri() . '/js/fancybox/jquery.fancybox.js', array('latest-jquery'), '2', true);
	wp_enqueue_script( 'fancybox_pack_js', get_template_directory_uri() . '/js/fancybox/jquery.fancybox.pack.js', array('fancybox_js'), '2', true );
	wp_enqueue_script( 'fancybox_media_helper_js', get_template_directory_uri() . '/js/fancybox/helpers/jquery.fancybox-media.js', array('fancybox_pack_js'), '2', true );
	wp_enqueue_script( 'fancybox_loader_js', get_template_directory_uri() . '/js/fancybox/fancyboxloader.js', array('fancybox_pack_js'), '2', true );
}
add_action( 'wp_enqueue_scripts', 'parent_theme_scripts_method', 9 );

// Things to include in header
function parent_theme_header_content() {
    echo '<link rel="shortcut icon" type="image/x-icon" href="' . get_stylesheet_directory_uri() . '/images/favicon.ico" />' . "\n";
    echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">' . "\n";
    echo '<meta charset="'; echo bloginfo('charset'); echo '" />' . "\n";
}
add_action( 'wp_head', 'parent_theme_header_content' );

// ADD THEME SUPPORT 
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );

// Register Menu Locations
if (! function_exists('register_my_menus')) {
function register_my_menus() {
  register_nav_menus(
    array(
      'main-nav-menu' => __( 'Main Nav Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );
}

//Shortcodes
include_once(PARENTTHEME . '/functions/shortcodes.php');


// CUSTOM CSS FOR LOGIN PAGE
if (! function_exists('custom_login')) {
    function custom_login() { 
echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo('stylesheet_directory').'/css/custom-login.css" />'; 
}
add_action('login_head', 'custom_login');
}

// Adding a responsive image size option
	add_image_size( 'wdev4-responsive-images', 999, 999, false );
// Allows you to use custom images in Wordpress Library
add_filter( 'image_size_names_choose', 'my_custom_sizes' );
function my_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'wdev4-responsive-images' => __('Adjustable Responsive Image'),
 ) );
}

//Manual Functions
include_once(PARENTTHEME . '/functions/manual.php'); 	
// Custom Menu Page: WEBSITE MANUAL	
if (! function_exists('register_my_custom_menu_page')) {
function register_my_custom_menu_page() {
    add_menu_page( 'Website Instructional Manual', 'Site Manual', 'manage_options', 'website-manual', 'my_custom_menu_page', get_stylesheet_directory_uri() . ('/images/icon-manual.png'),  3 ); 
}
function my_custom_menu_page() {
   include_once('inc/manual.php'); 
}
add_action( 'admin_menu', 'register_my_custom_menu_page' );
}

// Declare the who the website is by, and who to contact for support
if (! function_exists('siteby')) { 
function siteby() {
$siteby = 'Site created by <a target="blank" href="http://simple-edge.com">Simple Edge</a>. For support contact 312.834.3343 ';
return $siteby; 
}
}
//Admin Area Footer Text
function left_admin_footer_text_output_wp_version($text) {
    $siteby = siteby();
    $text = $siteby . '- Wdev4 Theme Version ' . PARENT_THEME_VERSION;
    return $text;
}	
add_filter('admin_footer_text', 'left_admin_footer_text_output_wp_version'); //left side






//Mobile Broswer Sniffer http://detectmobilebrowsers.com/ use "global" variable in theme files. Declare the varibale "global" before using it.
//JANUARY 2014
$mobile = 0; 
$useragent=$_SERVER['HTTP_USER_AGENT'];
if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
{ $mobile = 1; } 
else if ( preg_match('/android|ipad|playbook|silk/i',$useragent) )
{ $mobile = 2; } 

// Clean up the <head>
if (! function_exists('removeHeadLinks')) {
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');
}

// Setting Maximum Media Width Side in Wordpress
if ( ! isset( $content_width ) ) $content_width = 1024;


// Allows custom Excerpt Length. Use:  echo excerpt(20);
if (! function_exists('excerpt')){
function excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);
      if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
      } else {
        $excerpt = implode(" ",$excerpt);
      } 
      $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
      return $excerpt;
    }
    function content($limit) {
      $content = explode(' ', get_the_content(), $limit);
      if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
      } else {
        $content = implode(" ",$content);
      } 
      $content = preg_replace('/\[.+\]/','', $content);
      $content = apply_filters('the_content', $content); 
      $content = str_replace(']]>', ']]&gt;', $content);
      return $content;
    }
}



//Adds more and a link to the end of the excerpt
if (! function_exists('new_excerpt_more')) {
function new_excerpt_more($more) {
return ' <a class="read-more" href="'. get_permalink(get_the_ID()) . '">' . 'Read More' . '</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');
}


//this area cleans up the shortcode so that wordpress doesn't format within the shortcode
if (! function_exists('webtreats_formatter')) {
function webtreats_formatter($content) {
	$new_content = '';

	/* Matches the contents and the open and closing tags */
	$pattern_full = '{(\[raw\].*?\[/raw\])}is';

	/* Matches just the contents */
	$pattern_contents = '{\[raw\](.*?)\[/raw\]}is';

	/* Divide content into pieces */
	$pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);

	/* Loop over pieces */
	foreach ($pieces as $piece) {
		/* Look for presence of the shortcode */
		if (preg_match($pattern_contents, $piece, $matches)) {

			/* Append to content (no formatting) */
			$new_content .= $matches[1];
		} else {

			/* Format and append to content */
			$new_content .= wptexturize(wpautop($piece));
		}
	}

	return $new_content;
}
}

// Remove the 2 main auto-formatters
remove_filter('the_content', 'wpautop');
remove_filter('the_content', 'wptexturize');

// Before displaying for viewing, apply this function
add_filter('the_content', 'webtreats_formatter', 99);
add_filter('widget_text', 'webtreats_formatter', 99);


// Enable excerpts for pages...
if (! function_exists('enable_page_excerpts')){
add_action('init', 'enable_page_excerpts');
function enable_page_excerpts()
{
    add_post_type_support('page', 'excerpt');
}
}


//Shows All Post Types Count in At a Glance on Dashboard
if (! function_exists('vm_right_now_content_table_end')) {
function vm_right_now_content_table_end() {
    $args = array(
        'public' => true ,
        '_builtin' => false
    );
    $output = 'object';
    $operator = 'and';
    $post_types = get_post_types( $args , $output , $operator );
    foreach( $post_types as $post_type ) {
        $num_posts = wp_count_posts( $post_type->name );
        $num = number_format_i18n( $num_posts->publish );
        $text = _n( $post_type->labels->name, $post_type->labels->name , intval( $num_posts->publish ) );
        if ( current_user_can( 'edit_posts' ) ) {
            $cpt_name = $post_type->name;
        }
        echo '<li class="post-count"><tr><a href="edit.php?post_type='.$cpt_name.'"><td class="first b b-' . $post_type->name . '"></td>' . $num . '&nbsp;<td class="t ' . $post_type->name . '">' . $text . '</td></a></tr></li>';
    }
    $taxonomies = get_taxonomies( $args , $output , $operator );
    foreach( $taxonomies as $taxonomy ) {
        $num_terms  = wp_count_terms( $taxonomy->name );
        $num = number_format_i18n( $num_terms );
        $text = _n( $taxonomy->labels->name, $taxonomy->labels->name , intval( $num_terms ));
        if ( current_user_can( 'manage_categories' ) ) {
            $cpt_tax = $taxonomy->name;
        }
        echo '<li class="post-count"><tr><a href="edit-tags.php?taxonomy='.$cpt_tax.'"><td class="first b b-' . $taxonomy->name . '"></td>' . $num . '&nbsp;<td class="t ' . $taxonomy->name . '">' . $text . '</td></a></tr></li>';
    }
}
add_action( 'dashboard_glance_items' , 'vm_right_now_content_table_end' );
}

?>