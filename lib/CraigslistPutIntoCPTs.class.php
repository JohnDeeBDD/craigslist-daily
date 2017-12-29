<?php

//This class takes the "sausages", the data from Craigslist, and puts it into CPTs

class  CraigslistPutIntoCPTs{

	public $cityName;
	public $siteString;
	public $sausages;
	
	public function storeInDatabase($sausages, $cityName, $siteString){
		$this->cityName = $cityName;
		$this->sausages = $sausages;
		$this->siteString = $siteString;
		add_action('init', array($this, 'insertRecords') );
	}
	
	public function insertRecords(){
		$sausages = $this->sausages;
		$siteString = $this->siteString;
		$numberAddedOnLastScrape = 0;
		foreach($sausages as $anchorLink){
            //echo ($anchorLink . "<br />");
			//$replaceString = 'target = "_BLANK" href="' . $siteString;
			//$anchorLink = str_replace('href="', $replaceString, $anchorLink);
			//$anchorLink = str_replace("'", "\'", $anchorLink);
			$DailyItem = new \CRGDaily\DailyItem();
			$DailyItem->set_anchorLink($anchorLink);
			$titleMinusAnchorTags = $DailyItem->get_title();
			$x = $this->checkIsABadItem($titleMinusAnchorTags);
			if ($x){break;}
			$x = $this->checkIsAlreadyInDatabase($titleMinusAnchorTags);
			if ($x){break;}
			
			$DailyItem = new \CRGDaily\DailyItem($anchorLink);
			$ID = $DailyItem->get_ID();
			add_post_meta( $ID, 'phoneIsFetched', "FALSE");
			++$numberAddedOnLastScrape;
		}
		    update_option( 'crg-number-added-on-last-scrape', $numberAddedOnLastScrape );
	}
	
	public function checkIsAlreadyInDatabase($title){
		global $wpdb;
		$x = $wpdb->get_row("SELECT * FROM wp_posts WHERE post_title = '" . $title . "'", 'ARRAY_A');
		if ($x != NULL){
			return TRUE;
		 }else{
		 	return FALSE;
		}
	}
	
	public function checkIsABadItem($itemTitle){
		//die('line51');
		$badWord = "http";
		
		$x = substr_count ( $itemTitle, $badWord );
		if ($x > 1) {
			return TRUE;
		 }else{
			return FALSE; 
		}
	}
	
}