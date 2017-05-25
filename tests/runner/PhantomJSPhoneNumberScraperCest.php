<?php

class PhantomJSPhoneNumberScraperCest{
	
	public function getPhoneNumberFromPage(\AcceptanceTester $I){
		
		$ID = $I->grabOptionFromDatabase('crg-daily-ID-to-fetch');
		$URL = $I->grabOptionFromDatabase('crg-daily-URL-to-fetch');
		$I->amOnUrl($URL);
		$I->see("reply");
		$I->click("reply");
		$replyFlap = $I->grabTextFrom('.reply-flap');
		$ID = urlencode($ID);
		$replyFlap = urlencode($replyFlap);
		
		//$email = urldecode($email);
		$Url = "http://localhost/?dailyIDfetch=$ID&replyFlap=$replyFlap";
		$ch = curl_init();
		// Set URL to download
		curl_setopt($ch, CURLOPT_URL, $Url);
		$output = curl_exec($ch);		
	}
}