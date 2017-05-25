<?php

namespace CRGDaily;

class APIreceiver{
	
	private $addressToSendTo = "7028083642@vmobl.com";
	//private $addressToSendTo = false;
	
	public function __construct(){
		if (isset($_GET['replyFlap'])){
			add_action('init', array($this, 'receivePhantomFetch'));
		}
	}

	public function receivePhantomFetch(){
		$replyFlap = urldecode($_GET['replyFlap']);
		$ID = urldecode($_GET['dailyIDfetch']);
		update_post_meta($ID, "replyFlap", $replyFlap);
		$DailyItem = new DailyItem($ID);
		$anchorLinkURL= $DailyItem->get_anchorLinkURL();
		
		$CraigslistReplyFlapParser= new CraigslistReplyFlapParser();
		$itemEmail= $CraigslistReplyFlapParser->extractEmail($replyFlap);
		update_post_meta($ID, "email", $itemEmail);
		if($this->addressToSendTo){
			$phoneSMSemail= $this->addressToSendTo;
			if($CraigslistReplyFlapParser->thereIsPhoneCharacter($replyFlap)){
				wp_mail( $phoneSMSemail, "Phone Item", $replyFlap);
				wp_mail( $phoneSMSemail, "URL", $anchorLinkURL);
			}
		}
	}
}

