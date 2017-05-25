<?php

function AJAX_ignoreCPTdaily(){

// The $_REQUEST contains all the data sent via ajax 
	if ( isset($_REQUEST) ) {
		$dailyCPT_ID = $_REQUEST['dailyCPT_ID'];
		include_once('markPostAsIgnored.php');
		markPostAsIgnored($dailyCPT_ID);
	}
	
	// Always die in functions echoing ajax content
   die();
}