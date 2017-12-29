<?php

//This function initiates the Craigslist Scrape process:
function startScrape(){
	
	//gets current city name to scrape
	$CraigslistCities = new \CRGDaily\CraigslistCities;
	//$CraigslistCities->checkForCityOptionAndSetIfEmpty();
	
	//global $CRGdailyCityName;
	//$CRGdailyCityName= $CraigslistCities->getNextCityName();
	
	//$CraigslistCities->fastForwardNextCity();
	//$siteString = "http://$CRGdailyCityName.craigslist.org";
	
	$CityObject = $CraigslistCities->getNextCityObject();
	//var_dump($CityObject);die("xx");
	global $CRGdailyCityName;
	$CRGdailyCityName = $CityObject->citySlug;
	$siteString = $CityObject->Url;
	
	//echo ("citySlug: $CRGdailyCityName siteString: $siteString");die();
	//scrapes a cityName:
	include_once('CraigslistScraper.class.php');
	
	if(isset($_POST['search-keyword'])){
	    $keyword = $_POST['search-keyword'];
	}else{
	    $keyword= "wordpress";
	}
	//echo ("$CRGdailyCityName, $siteString, $keyword"); die();
	$CraigslistScraper = new CraigslistScraper;
	$HTMLdump = $CraigslistScraper->scrapePage($CRGdailyCityName, $siteString, $keyword);
	update_option( 'crg-html-dump', $HTMLdump);

	//die(); 
	//processes the HTMLdump into an array:
	//include_once('CragslistRawDumpProcessor.class.php');
	$CragslistRawDumpProcessor = new \CRGDaily\CragslistRawDumpProcessor;
	$sausages = $CragslistRawDumpProcessor->returnAnchorArray($HTMLdump, $CRGdailyCityName);
	
	include_once('CraigslistPutIntoCPTs.class.php');
	$CraigslistPutIntoCPTs = new CraigslistPutIntoCPTs;
	$CraigslistPutIntoCPTs->storeInDatabase($sausages, $CRGdailyCityName, $siteString);
}