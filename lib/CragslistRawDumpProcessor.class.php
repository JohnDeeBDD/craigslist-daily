<?php

//This class takes the raw HTML from a Craigslist search result,
//and processes it into an array of links:

class CragslistRawDumpProcessor{


	//This method does the actual processing of the HTMLdump:
	public function returnAnchorArray($dump){
		$anchorArray = array();
		$dumpLength = strlen($dump);
		$skipToLetter = 0;
		while($skipToLetter < $dumpLength){
			$letter = $dump[$skipToLetter];
			$anchorLink = substr($dump, $skipToLetter, 9);
			if( $anchorLink == '<a href="'){
				$y = $skipToLetter + 10;
				$z = strpos ( $dump , "</a>", $y);
				$z = $z + 4;
				$z = $z - $skipToLetter;
				$anchorLink = substr($dump, $skipToLetter, $z);
				$skipToLetter = $skipToLetter + $z;
				$doesContain = strpos($anchorLink, 'class="result-title hdrlnk"');
				$containsCrossCity = strpos($anchorLink, "//");
				if ($doesContain){
					if (!($containsCrossCity)){
						array_push($anchorArray, $anchorLink);
					}
				}
			}
			$skipToLetter++;
		}
		return $anchorArray;
	}


	

}