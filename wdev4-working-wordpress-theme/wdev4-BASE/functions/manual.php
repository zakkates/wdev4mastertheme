<?php 
// tabs source: http://jqueryui.com/tabs/
//Setting up the Manual Page
//FUNCTION: TABS
//Create the Hook for the Website Manual Tabs
       function wdev4_manual_tabs_tab() {
           echo '<!-- Start Tabs -->
                    <ul>';
           do_action('wdev4_manual_tabs_tabs');
            echo '</ul>';
       }

//FUNCTION: Tabs Content
//Create the Hook for the Website Manual
       function wdev4_manual_tabs_content() {
           do_action('wdev4_manual_tabs_content');
       }

//ADDING 1ST TAB: HOW TO VIDEOS
// TAB: How To Videos
function wdev4_manual_default_first_tab() {
echo '<li><a href="#tabs-1">How-To Videos</a></li>';
}
//ACTION: Add First Tab to Menu
add_action('wdev4_manual_tabs_tabs','wdev4_manual_default_first_tab', 9);
//ACTION: Website Manual Videos Content :
function wdev4_manual_tabs_default_first_content() { ?>
<div id="tabs-1">
<?php wdev4_manual_accordian_topics(); /* Website Manual Accordian */?>
</div><!-- end tabs-1-->
<?php } /* end function wdev4_manual_tabs_default_first_content */      
add_action('wdev4_manual_tabs_content','wdev4_manual_tabs_default_first_content',9);
    
//FUNCTION: ACCORDIAN
// accordian source: http://api.jqueryui.com/accordion/ 
//Create the Hook for the Website Manual - Accordian
        function wdev4_manual_accordian_topics() {
            echo '<!-- Accordian -->';
            echo '<div id="wdev4-ui-accordion">';
            do_action('wdev4_manual_accordian_topics');
            echo '</div><!-- end wdev4-website-manual -->'; 
        }
//END FUNCTION: ACCORDIAN


// Default Manual - HOW TO VIDEOS
function wdev4_manual_accordian_topics_default_instruction_videos() { ?>
	<h2 id="page">Creating a New Page</h2>
	<div>
		<iframe width="640" height="480" src="//www.youtube.com/embed/1_6b-Tzo0NI?rel=0" frameborder="0" allowfullscreen></iframe>
	</div>
	<h2 id="menu">Adding a Page to Menu</h2>
	<div>
		<iframe width="640" height="480" src="//www.youtube.com/embed/OAMva9AXe-s?rel=0" frameborder="0" allowfullscreen></iframe>
	</div>
	<h2 id="post">Creating a New Blog Post</h2>
	<div>
		<iframe width="640" height="480" src="//www.youtube.com/embed/s7xJq8CPzuE?rel=0" frameborder="0" allowfullscreen></iframe>
	</div>
	<h2 id="product">Understanding the Backend of Wordpress</h2>
	<div>
		<iframe width="640" height="480" src="//www.youtube.com/embed/1Sbx2v0Z5G0" frameborder="0" allowfullscreen></iframe>
	</div>
<?php } // end function wdev4_manual_accordian_topics_default_instruction_videos 
//ACTION: Add Default Manual to the Manual Page
add_action('wdev4_manual_accordian_topics', 'wdev4_manual_accordian_topics_default_instruction_videos', 9);



///test
////// test test
///////// test test test TAB
function test_functions($tabID) {
//ADDING 1ST TAB: HOW TO VIDEOS
// TAB: How To Videos
function wdev4_manual_default_test_tab($tabID) {
echo '<li><a href="#1' . $tabID . '">' . $tabID . ' - ' . $tabID . '</a></li>';
}
//ACTION: Website Manual Videos Content :
function wdev4_manual_tabs_default_test_content($tabID) { ?>
<div id="<?php echo '1' . $tabID; ?>">
<?php  echo 'tester'; echo $tabID; ?> hello world
</div><!-- end tabs-1-->
<?php }
//ACTION: Add First Tab to Menu
add_action('wdev4_manual_tabs_tabs','wdev4_manual_default_test_tab', 4);
/* end function wdev4_manual_tabs_default_first_content */      
add_action('wdev4_manual_tabs_content','wdev4_manual_tabs_default_test_content',4);
}
test_functions(1);
