<?php
////////////////////////////////////////////////
// ADDING NEW TABS OF CONTENT ON THE SITE MANUAL
////////////////////////////////////////////////
// STEP 1: ADD TABS - - - - - - - - - - - - - - - - - - - - - - - - - 
function wdev4_manual_add_tabss() { ?>
    <li><a href="#tabs-2">Proin dolor</a></li>
    <li><a href="#tabs-3">Passwords</a></li>
<?php } 
//Add Tabs to Menu
//add_action('wdev4_manual_tabs_tabs','wdev4_manual_add_tabss', 10);
// STEP 2: ADD CONTENT - - - - - - - - - - - - - - - - - - - - - - - - - 
//make sure to change the tabs ID #
function wdev4_manual_tabs_add_tabs_content() { ?>
<div id="tabs-2">
	<h2 id="page">Creating a New Page</h2>
	<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p>
</div><!-- end tabs-2 -->
<div id="tabs-3">
	<h2 id="page">Passwords</h2>
	<p>JotForm:<br/ >
	user: safsdfa <br />
	pass: jlsdakfjsdlf<br /></p>
</div><!-- end tabs-3 -->
<?php }
//Add Default Manual to the Manual Page
//add_action('wdev4_manual_tabs_content', 'wdev4_manual_tabs_add_tabs_content', 10);

////////////////////////////////////////////////
// ADDING NEW VIDEOS TO SITE MANUAL
////////////////////////////////////////////////
// more videos DELETE TEST
function wdev4_manual_accordian_topics_default_instruction_videos1() { ?>
	<h2 id="page">THIS IS A NEW VIDEO TEST FROM THE CHILD THEME</h2>
	<div>
		<iframe width="640" height="480" src="//www.youtube.com/embed/1_6b-Tzo0NI?rel=0" frameborder="0" allowfullscreen></iframe>
	</div>
<?php } // end function wdev4_manual_accordian_topics_default_instruction_videos 
//ACTION: Add Default Manual to the Manual Page
//add_action('wdev4_manual_accordian_topics', 'wdev4_manual_accordian_topics_default_instruction_videos1', 10);