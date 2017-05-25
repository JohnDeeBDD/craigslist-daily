<?php

namespace CRGDaily;

class CraigslistReplyFlapParser{
	
	public $replyFlap;

	public function thereIsPhoneCharacter($haystack){
		$needle   = "☎";
		
		if( strpos( $haystack, $needle ) !== false ) {
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	//returns BOOL
	public function thereIsEmail($blurb){
		$regex = '/[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})/';
		if (preg_match($regex, $blurb, $email_is)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	public function extractEmail($blurb){
		//returns an email from a text blurb. Return FALSE if not found
		$regex = '/[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})/';
		if (preg_match($regex, $blurb, $email_is)) {
			return $email_is[0];
		} else {
			return FALSE;
		}
	}
}