<?php

namespace CRGDaily;

class DailyItemDetailsFetcher{
	
	public function __construct(){
		add_action( 'admin_enqueue_scripts', array($this, 'enqueue_DailyItemDetailsFetcherRunnerJS' )) ;
		add_action('init', array($this, 'passDataToPhantomJSrunner'));
		//die('about to launch');
		add_action('init', array($this, 'launchExternalScraper'));
	}

	public function enqueue_DailyItemDetailsFetcherRunnerJS(){
		$siteURL = get_site_url();
		wp_enqueue_script( "daily-item-details-fetcher-runner", "$siteURL/wp-content/plugins/Daily/src/CRGDaily/DailyItemDetailsFetcherRunner.js" );
	}
	
	public function passDataToPhantomJSrunner(){
		//This is the ID we are going to fetch:
		$ID = $_GET['fetch-phone-number'];
		$DailyItem = new DailyItem($ID);
		$URL = $DailyItem->get_anchorLinkURL();
		//die("passDataToPhantomJSrunner");
		update_option('crg-daily-ID-to-fetch', $ID);
		update_option( 'crg-daily-URL-to-fetch', $URL );
		update_post_meta($ID, 'phone', 'ERROR!');
		update_post_meta($ID, 'email', 'ERROR!');
		update_post_meta($ID, 'replyFlap', 'ERROR!');
	}

	public function launchExternalScraper(){
		ignore_user_abort(true);
		set_time_limit(0);
		$ThisCommand = ("cd /var/www/html/wp-content/plugins/Daily" . PHP_EOL. "sudo ./runIt.sh");
		shell_exec($ThisCommand);
	}

}