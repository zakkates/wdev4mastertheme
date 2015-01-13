<?php
# Path Definitions - not changeable
define('PARENTTHEME', get_template_directory() );
define('CHILDTHEME', get_stylesheet_directory() );

//Testing
include_once(CHILDTHEME . "/functions/testing.php");

// Load all Style Sheets and jQuery Files Here
function theme_scripts_method() {
    wp_enqueue_style( 'theme-style', get_stylesheet_uri(), array(), '1.0', 'all' );
	wp_enqueue_script( 'theme-scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'theme_scripts_method');

// Including Function Files
include_once(CHILDTHEME . "/functions/manual.php");

// Adding Widgets to Theme
function theme_widget_declaration() {
register_sidebar(array(
    	'name' => 'Sidebar Widgets',
    	'id'   => 'sidebar-widgets',
    	'description'   => 'These are widgets for the sidebar.',
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget'  => '</div>',
    	'before_title'  => '<h2>',
    	'after_title'   => '</h2>'
    	));
register_sidebar( array(
	'name' => 'Footer Widget',
	'id' => 'before-post',
        'description' => __( 'Your Widget Description.', '$text_domain' ),
) );
}
add_action('widgets_init','theme_widget_declaration');

// Declare the who the website is by, and who to contact for support
//function siteby() {
//$siteby = 'Site created by <a target="blank" href="http://www.paulgregorymedia.com">Paul Gregory Media</a>. For support contact 630-384-9061 ';
//return $siteby; 
//}


/* WP Version History */
function my_post_type_wp_theme_history() {
	register_post_type( 'wp_theme_history',
                array( 
				'label' => __('WP Theme Version History'),  '_builtin' => false,
 'menu_icon' => get_stylesheet_directory_uri() . ('/images/wp-theme-icon.png'),
				'exclude_from_search' => false, // Exclude from Search Results
				'capability_type' => 'page', 'public' => true,  'show_ui' => true,
				'show_in_nav_menus' => true, 'menu_position' => 1,
				'rewrite' => array( 'slug' => 'wp_theme_history', 'with_front' => FALSE ),
				'supports' => array('title', 'custom-fields', 'editor', 'excerpt', 'thumbnail', 'revisions') 
			));

}
add_action('init', 'my_post_type_wp_theme_history');

// CUSTOM CSS FOR LOGIN PAGE
//function custom_login() { 
//echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo('stylesheet_directory').'/css/style.css" />'; 
//}
//add_action('login_head', 'custom_login');

// SETS POST THUMBNAIL SIZE ($width, $height, $crop) ex: (150,150,true)
	set_post_thumbnail_size();
	//add_image_size( $name, $width, $height, $crop );
	//add_image_size( $name, $width, $height, $crop );
	//add_image_size( 'category-thumb', 300, 9999 ); //300 pixels wide (and unlimited height)
// Allows you to use custom images in Wordpress Library
//add_filter( 'image_size_names_choose', 'my_custom_sizes' );

//function my_custom_sizes( $sizes ) {
//    return array_merge( $sizes, array(
//        'your-custom-size' => __('Your Custom Size Name'),
// ) );
// }

// THEME OPTIONS PAGE 
	//require_once ( get_template_directory() . '/theme-options/theme-options.php' );
	//$options = get_option('simpleedge_theme_options'); 

// REMOVE MENUS FROM WP ADMIN
/*function remove_menus () {
global $menu;
  $restricted = array(__('Dashboard'), __('Posts'), __('Media'), __('Links'), __('Pages'), __('Appearance'), __('Tools'), __('Users'), __('Settings'), __('Comments'), __('Plugins'));
	end ($menu);
	while (prev($menu)){
		$value = explode(' ',$menu[key($menu)][0]);
		if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
	}
}
add_action('admin_menu', 'remove_menus'); */

/*Hide Admin Bar*/
// show_admin_bar( false );

?>