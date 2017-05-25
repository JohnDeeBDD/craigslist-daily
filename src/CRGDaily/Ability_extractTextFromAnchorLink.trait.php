<?php

namespace CRGDaily;

trait Ability_extractTextFromAnchorLink{
	
	//this function pulls the text out of an anchor link.
	// <a hre = "http://google.com" target = "_blank">google</a>
	// returns "google"
	
	public function extractTextFromAnchorLink($anchorLink = NULL){
		preg_match('~>\K[^<>]*(?=<)~', $anchorLink, $match);
		return($match[0]);
	}
	
}