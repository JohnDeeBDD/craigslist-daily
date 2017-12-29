<?php

namespace CRG_Daily;

class RunnerClicker{

	public function __construct() {
		//include_once 'NextCityNameGetter.class.php';
		$NextCityNameGetter = new \CRGDaily\CraigslistCities;
		if ($NextCityNameGetter->isLastCity()){
			delete_option( 'crg-daily-city' );
			die('DONE!');
		 }else{
		 	add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_RunnerClicker' ) );
		}
	} 
	
	//This function waits X seconds, then clicks the "Run" button
	public function enqueue_RunnerClicker() {
		$siteURL = get_site_url();
		$siteURL = $siteURL . "/wp-content/plugins/Daily/src/CRGDaily/RunnerClicker.js";
		wp_enqueue_script( "runner-clicker", $siteURL);
	}
	
}