<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/themes/smoothness/jquery-ui.css">
<style>
body {}
.wdev4-website-manual header h1 {color: #273d4e; text-shadow: 2px 2px 0 #fff; font-size: 1.8em;}
.wdev4-website-manual header h2 {color: #273d4e; text-shadow: 2px 2px 0 #fff; margin: -10px 0 0 0px ; display: block; font-size: 1.2em;}
.wdev4-website-manual {width: 95%; margin: 20px 0 0 0 ; }
ul {padding: 0 0 0 40px }

/* - - -  Header -- */
header {display: block; margin: 0 0 15px 0 ; }

/* - - -  tabs */
#wdev4-tabs {padding: 0; border:none; background: none; }
#wdev4-tabs ul {background: none; border-radius: 0; border: none; border-bottom: solid 1px #999; }
#wdev4-tabs ul li.ui-state-default {border: none;}
#wdev4-tabs ul li.ui-state-default a {background: #6daedf ; color: #fff; text-shadow: 1px 1px 0px #555; border: 1px solid #666; border-bottom: 0; box-shadow: none; -webkit-border-radius: 4px 4px 0 0;
border-radius: 4px 4px 0 0;}
#wdev4-tabs ul li.ui-state-active a {background: #f8fcff ; color: #666; text-shadow: none;  box-shadow: none;}
#wdev4-tabs div {background: #f8fcff ; border: 1px solid #666; border-top: none;}


/* - - - -Accordian */
#wdev4-ui-accordion {
min-width: 450px;  border: none !important;
}
#wdev4-ui-accordion h2 {
background: #6daedf ; 
color: #fff;
text-shadow: 1px 1px 0px #555;
}
#wdev4-ui-accordion div { background: #f8fcff; 
}
</style>
<div class="wdev4-website-manual">
	<header>
		<h1>Wordpress Website Instruction Manual</h1>
		<h2>Manual provided for Wordpres v3.6</h2>
	</header>

<div id="wdev4-tabs">
   
<?php wdev4_manual_tabs_tab(); /* Website Manual TABS */?>
<?php wdev4_manual_tabs_content(); /* ACTION: Sections of Content for Manual */ ?>
  
</div><!-- end wdev4-tabs --> 
  
	</body>
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
<script> $(function() {
    $( "#wdev4-ui-accordion" ).accordion({collapsible : true, active: false});
  });
$(function() {
    $( "#wdev4-tabs" ).tabs();
  });

</script>
 


