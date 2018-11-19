<?php
include_once '/var/www/html/wp-content/plugins/craigslist-daily/lib/CRG_DailyAutoloader.class.php';
class Ability_extractTextFromAnchorLinkTest extends \Codeception\TestCase\WPTestCase{

	use CRGDaily\Ability_extractTextFromAnchorLink;
	
	/**
	 * @test
	 * it should extract text from an anchor link
	 */
	public function it_should_extract_text_from_an_anchor_link(){
		$STUB_sampleCraigslistAnchorLink =
		'<a target = "_BLANK" href="http://newyork.craigslist.org/brk/wri/6072050862.html" data-id="6072050862" class="result-title hdrlnk">Make Extra $$$ Writing Articles From Home</a>';
		
		$STUB_sampleDailyCPTtext =
		"Make Extra $$$ Writing Articles From Home";
		
		$extractedText = $this->extractTextFromAnchorLink($STUB_sampleCraigslistAnchorLink);
		
		$this->assertEquals($STUB_sampleDailyCPTtext, $extractedText);
		
	}

}