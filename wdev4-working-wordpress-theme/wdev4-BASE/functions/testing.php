<?php
//creating filters http://themeshaper.com/2009/05/03/filters-wordpress-child-themes/
// this is the master filter. the replacing filter lives in the child's functions.php
function super_stuff() {
    $stuff = 'bacon<br />';
    $newvar = apply_filters ( 'filter_name' , $stuff . " more text added inline" );
    echo $newvar;
}

// Creating a HOOK - Add Action - http://archive.extralogical.net/2007/06/wphooks/
// This is in the parent theme. The action is in the Child Theme
function thematicr() {
    echo "Start of Hook<br/>";
    do_action('thematic_belowheaderr');
    echo "<br />End of Hook<br/>";
}