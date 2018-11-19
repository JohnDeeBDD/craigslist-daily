<?php
/*
Plugin Name: Craigslist Daily
Plugin URI: https://generalchicken.net
Description: This plugin scans Craigslist for certain keywords, and compiles the search results.
Version: 2.1
Author: John Dee
Author URI: https://generalchicken.net
*/

global $PluginRootDirectoryName; $PluginRootDirectoryName = "craigslist-daily";
require_once 'src/CRGDaily/DailyPlugin.class.php';
$DailyPlugin = new CRGDaily\DailyPlugin;


$CRG_DailyAutoloader = new \CRG_Daily\CRG_DailyAutoloader;

include_once('lib/DailyCPTs.class.php');
$DailyCPTs = new \CRG_Daily\DailyCPTs;

//sets up the admin area page:
include_once('lib/CraigslistAdminPage.class.php');
$CraigslistAdminPage = new CraigslistAdminPage;



//if the start scrape button is pressed in the admin area:
if (isset($_POST['crg_get_items'])){
	include_once('lib/StartScrape.php');
	startScrape();
}

//If the "Clear Items" button is pressed in the admin area:
if (isset($_POST['crg_discard_all_items_on_screen'])){
	include_once('lib/clearDatabaseOf1000DailyTypes.php');
	add_action('init', 'clearDatabaseOf1000DailyTypes');
}

//If the "Ignore Items" button is pressed in the admin area:
if (isset($_POST['crg-ignore-all-cpts'])){
	include_once('lib/ignoreItems.php');
	add_action('init', 'ignoreItems');
}

//If the "Continue Run" button is pressed in the admin area:
if (isset($_POST['daily-runner-button'])){
	include_once('lib/StartScrape.php');
	startScrape();
	include_once('lib/RunnerClicker.class.php');
	$RunnerClicker = new \CRG_Daily\RunnerClicker;
}

if (isset($_POST['reset-run'])){
    $TickerPointerForListOfSites = new \CRGDaily\TickerPointerForListOfSites;
    $optionName = $TickerPointerForListOfSites->optionName;
    delete_option($optionName);
}

//listen for and process AJAX requests:
add_action( 'wp_ajax_post_to_ignore', 'post_to_ignore' );
add_action( 'wp_ajax_nopriv_post_to_ignore', 'post_to_ignore' );

//this function loads when an ignore AJAX request is made
function post_to_ignore() {
	include_once('lib/AJAX_ignoreCPTdaily.php');
	AJAX_ignoreCPTdaily();
}

if (isset($_GET['fetch-phone-number'])){
	include_once('src/CRGDaily/DailyItemDetailsFetcher.class.php');
	$DailyItemDetailsFetcher = new \CRGDaily\DailyItemDetailsFetcher();
}


if (isset($_POST['last-scrape-button'])){
	include_once('src/CRGDaily/ShowLastScrapeView.class.php');
	$ShowLastScrapeView = new \CRGDaily\ShowLastScrapeView();
}

//Check for submission from PhantomJS
if (isset($_GET['dailyIDfetch'])){
	$APIreceiver = new \CRGDaily\APIreceiver();
}
	
