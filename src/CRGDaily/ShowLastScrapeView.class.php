<?php

namespace CRGDaily;

class ShowLastScrapeView{
	
	public function __construct(){
		add_action('init', array($this, 'outputLastScrape'));
	}
	
	public function outputLastScrape(){
		$output= get_option('crg-html-dump');
		echo $output;
		die();
	}
	
}