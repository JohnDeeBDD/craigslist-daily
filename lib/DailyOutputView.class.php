<?php

use CRG_Daily\CraigslistCities;

class DailyOutputView{

    public function getHTML(){
		
		include_once('CRG_autoloader.php');
    	$emailJS = new CustomRayGuns\EmailJS;
    	echo ($emailJS->getMessagesOutput());

		$output = $this->return_formTop();
		$output = $output . ($this->return_itemList());

   	    return $output;
    }
        
    public function return_itemList(){
    	query_posts(
    		array(
    			'post_type' => 'daily',
    			'posts_per_page' => -1,
    			'meta_query' => array(
    				array(
    					'key' => 'ShouldBeIgnored',
    					'compare' => 'NOT EXISTS'
    				)
    			)
   			)
    	);
    	$output = ""; $ID = 0;
    	$lastDaily = 0;
    	if ( have_posts() ){

    		while ( have_posts() ) : the_post();
    			$ID = get_the_ID();
    			$DailyItem = new \CRGDaily\DailyItem($ID);
    			$itemHTML = $DailyItem->return_itemHTML();
    			$output = $output . $itemHTML . ($this->DailyAJAX($ID));
    			if(!($DailyItem->get_phoneIsFetched())){
    				$lastDaily= $ID;
    			}
    			
    		endwhile;

    	};
    	$DailyItem = new \CRGDaily\DailyItem($lastDaily);
    	$DailyItem->set_phoneIsFetched("TRUE");
    	wp_reset_query();
    	
    	//Hidden variable to indicate the "last" daily in the list:
    	$output = $output . 
    	"<input type = 'hidden' name = 'last-daily' id = 'last-daily' class = 'last-daily' value = '$lastDaily' />";


    	return $output;
    	
    }
    public function return_formTop(){
    	//City Info:
    	$dailyCity = get_option('crg-daily-city');
    	$CraigslistCities = new \CRGDaily\CraigslistCities();
    	$cityKey = $CraigslistCities->returnKeyOfCity($dailyCity);
    	$totalNumberOfCities = $CraigslistCities->returnTotalNumberOfCities();
    	
    	//Counts:
    	$numberAddedOnLastScrape = get_option('crg-number-added-on-last-scrape');
    	$LiveDailysCounter = new \CRGDaily\LiveDailyCounter();
    	$numberOfLiveDailys = $LiveDailysCounter->returnNumberOfLiveDailys();
    	
    	//Misc:
    	$currentDate = date('F j, Y');
    	$siteURL = get_site_url();
    	
    	if(isset($_POST['search-keyword'])){
    		$keyword = $_POST['search-keyword'];
    	}else{
    		$keyword= "wordpress";
    	}
    	
    	$output = 
<<<OUTPUT
<form method = 'post' action = '$siteURL/wp-admin/admin.php?page=crg-daily%2Flib%2FCraigslistAdminPage.class.php'>
	<h1>Craigslist Daily Report:</h1>
	<strong>Current Date:</strong> $currentDate<br />
	<strong>Live:</strong> $numberOfLiveDailys<br />
	<strong>Last city:</strong> $dailyCity ($cityKey of $totalNumberOfCities)<br />
	<strong>Number added on last scrape:</strong> $numberAddedOnLastScrape<br />
	Keyword: <input type = 'input' name = 'search-keyword' id = 'search-keyword' value = '$keyword' /><br />
	<input type = 'submit' id = 'reset-run' name = 'reset-run' value = 'Reset Run' />
	<input type = 'submit' id = 'last-scrape-button' name = 'last-scrape-button' value = 'Last Scrape'/>
	<input type = 'submit' id = 'crg-ignore-all-cpts' name = 'crg-ignore-all-cpts' value = 'Ignore All'/>
	<input type = 'submit' id='crg-get-items-button' name = 'crg_get_items' value = 'Get Items' />
	<input type = 'submit' id = 'daily-runner-button' name = 'daily-runner-button' value = 'Continue Run'/>
</form>
<div style = 'width:100%;clear:both;' />&nbsp;</div>
OUTPUT;
		return $output;
   	}
    
   	public function DailyAJAX($dailyCPT_ID){
   		$output = "
   		<script>
   		// This script hides the item when the clear-item-number
   		jQuery( document ).ready(function(){
   		jQuery('#clear-item-number-$dailyCPT_ID').click(function(){
   		jQuery('#item-number-$dailyCPT_ID').hide();
   		// We'll pass this variable to the PHP function post_to_ignore
   		var IDtoDelte = '$dailyCPT_ID';
   		// This does the ajax request
   		// We'll pass this variable to the PHP function post_to_ignore
   		var fruit = 'Banana';
   		// This does the ajax request
   		jQuery.ajax({
   		url: ajaxurl,
   		data: {
   		'action':'post_to_ignore',
   		'dailyCPT_ID' : $dailyCPT_ID
   	},
   	success:function(data) {
   	// This outputs the result of the ajax request
   	//alert(data);
   	},
   	error: function(errorThrown){
   	alert(errorThrown);
   	}
   	});
   	});
   	jQuery('#craigslist-send-email-text-box-$dailyCPT_ID').focusin(function(){
   	jQuery('#email-message-$dailyCPT_ID').slideDown();
   	});
   	});
   	</script>";
   		return $output;
   	}

}