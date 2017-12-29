<?php


class LiveDailyCounterTest extends \Codeception\TestCase\WPTestCase{

	/**
	 * @test
	 * it should be instantiatable
	 */
    public function it_should_be_instantiatable(){
    	$LiveDailyCounter= new CRGDaily\LiveDailyCounter();
    }
    
    /**
     * @test
     * it should return the number of live dailys
     */
    public function it_should_return_the_number_of_live_dailys(){
    	global $STUB_sampleDailyCPTtitle; global $STUB_sampleCraigslistAnchorLink; global $STUB_sampleCraigslistPhone;
    	
    	//adds 12 daily posts without the ShouldByIgnored tag
    	$x = 1;
    	while ($x < 13){
    		$ID = wp_insert_post(['post_type' => 'daily', 'post_title' => $STUB_sampleDailyCPTtitle]);
    		update_post_meta( $ID, 'anchorLink', $STUB_sampleCraigslistAnchorLink);
    		update_post_meta( $ID, 'phone', $STUB_sampleCraigslistPhone);
    		$x = $x + 1;
    	}
    	
    	//adds 5 dailys with the tag
    	$x = 1;
    	while ($x < 6){
    		$ID = wp_insert_post(['post_type' => 'daily', 'post_title' => $STUB_sampleDailyCPTtitle]);
    		update_post_meta( $ID, 'anchorLink', $STUB_sampleCraigslistAnchorLink);
    		update_post_meta( $ID, 'phone', $STUB_sampleCraigslistPhone);
    		update_post_meta( $ID, 'ShouldBeIgnored', '1');
    		$x = $x + 1;
    	}
    	
    	$LiveDailyCounter= new \CRGDaily\LiveDailyCounter();
    	
    	$this->assertEquals(12, $LiveDailyCounter->returnNumberOfLiveDailys());

    }
    
    /**
     * @test
     * make sure globals are loading properly
     */
    public function makeSureGlobalsAreLoadingProperly(){
        global $STUB_sampleDailyCPTtitle;
        $expected = "Make Extra $$$ Writing Articles From Home";
        $this->assertEquals($expected, $STUB_sampleDailyCPTtitle);    
    }
}