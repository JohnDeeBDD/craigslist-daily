<?php

//This function initiates the Craigslist Scrape process:
function startScrape(){
	
	//gets current city name to scrape
	$NextCityNameGetter = new \CRGDaily\CraigslistCities;
	$NextCityNameGetter->checkForCityOptionAndSetIfEmpty();
	
	global $CRGdailyCityName;
	$CRGdailyCityName= $NextCityNameGetter->getNextCityName();
	
	$NextCityNameGetter->fastForwardNextCity();
	$siteString = "http://$CRGdailyCityName.craigslist.org";
	
	//scrapes a cityName:
	include_once('CraigslistScraper.class.php');
	$CLScraper = new CraigslistScraper;
	$HTMLdump = $CLScraper->scrapePage($CRGdailyCityName, $siteString);
	update_option( 'crg-html-dump', $HTMLdump);

	//processes the HTMLdump into an array:
	include_once('CragslistRawDumpProcessor.class.php');
	$CragslistRawDumpProcessor = new CragslistRawDumpProcessor;
	$sausages = $CragslistRawDumpProcessor->returnAnchorArray($HTMLdump);
	
	
	include_once('CraigslistPutIntoCPTs.class.php');
	$CraigslistPutIntoCPTs = new CraigslistPutIntoCPTs;
	$CraigslistPutIntoCPTs->storeInDatabase($sausages, $CRGdailyCityName, $siteString);
}