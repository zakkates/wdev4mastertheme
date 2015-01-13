<?php 


function add_image_responsive_class($content) {
   global $post;
   $pattern ="/<img(.*?)class=\"(.*?)\"(.*?)>/i";
   $replacement = '<img$1class="$2 img-responsive"$3>';
   $content = preg_replace($pattern, $replacement, $content);
   return $content;
}
add_filter('the_content', 'add_image_responsive_class');


//creating filters http://themeshaper.com/2009/05/03/filters-wordpress-child-themes/
// this is the replacing filter (master filter in parent functions.php)
function my_function_name($stuff) {
  // Your custom code goes here, between the curly braces
  echo "this works for me instead " . $stuff . "<br />";
}
add_filter('filter_name','my_function_name');

// Creating a HOOK - Add Action - http://archive.extralogical.net/2007/06/wphooks/
// This is in the child theme. The hook is in the parent Theme
// First we make our function
function childtheme_welcome_blurb() { ?>
 
<!-- our welcome blurb starts here -->
ACTION: Called First<br />
<!-- our welcome blurb ends here -->
<?php } 
 
// end of our new function childtheme_welcome_blurb
 
// Now we add our new function to our Thematic Action Hook
add_action('thematic_belowheaderr','childtheme_welcome_blurb',10);

// Here's adding MORE to our Hook.
function addingmorestufftoheader() {
    echo "ACTION: Called Second <br />";
}
add_action('thematic_belowheaderr','addingmorestufftoheader', 5);



