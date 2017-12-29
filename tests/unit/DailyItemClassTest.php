<?php

class DailyItemTest extends \Codeception\TestCase\WPTestCase{

	/**
     * @test
     * it should be instantiatable
     */
    public function it_should_be_instantiatable(){
    	$DailyItem = new CRGDaily\DailyItem();
    }
       
    /**
     * @test
     * it should load data from the DB
     */
    public function it_should_load_data_from_the_DB(){
    	//When an ID is passed at instantiation, it should load data from the DB
    	$ID = $this->stub_DailyCPT();
    	
    	$DailyItem = new CRGDaily\DailyItem($ID);
    	global $STUB_sampleCraigslistAnchorLink;
    	$this->assertEquals($STUB_sampleCraigslistAnchorLink, $DailyItem->get_anchorLink());
    	global $STUB_sampleCraigslistPhone;
    	$this->assertEquals($STUB_sampleCraigslistPhone, $DailyItem->get_phone());
    	
    }
    
    /**
     * @test
     * it should have some setter and getter methods
     */
    public function it_should_have_some_setter_and_getter_methods(){
    	//DailyItem initialized WITHOUT an ID:
    	$DailyItem = new CRGDaily\DailyItem();
    	global $STUB_sampleCraigslistAnchorLink;
    	$DailyItem->set_anchorLink($STUB_sampleCraigslistAnchorLink);
    	$this->assertEquals($STUB_sampleCraigslistAnchorLink, $DailyItem->get_anchorLink(), "Failed asserting stub $STUB_sampleCraigslistAnchorLink equals returned ");
    	
    	
    	//DailyItem initialized WITH an ID:
    	//Stub out a CPT:
    	global $STUB_sampleDailyCPTtitle;
    	$ID = wp_insert_post(['post_type' => 'daily', 'post_title' => $STUB_sampleDailyCPTtitle]);
    	update_post_meta( $ID, 'anchorLink', $STUB_sampleCraigslistAnchorLink);
    	
    	global $STUB_sampleCraigslistPhone;
    	update_post_meta( $ID, 'phone', $STUB_sampleCraigslistPhone);
    	
    	//Create the CPT with an ID:
    	$DailyItem = new CRGDaily\DailyItem($ID);
    	$this->assertEquals($STUB_sampleCraigslistAnchorLink, $DailyItem->get_anchorLink());
    	$this->assertEquals($STUB_sampleCraigslistPhone, $DailyItem->get_phone());
    
 

    	global $STUB_sampleDailyCPTtitle;
    	$anchorLink = $DailyItem->get_anchorLink();
    }
    
    /**
     * @test
     * it should have setter and getter methods for the anchorLink
     */
    public function it_should_have_setter_and_getter_methods_for_the_anchorLink(){
    	$DailyItem = new CRGDaily\DailyItem();
    	
    	global $STUB_sampleCraigslistAnchorLink;
    	$DailyItem->set_anchorLink($STUB_sampleCraigslistAnchorLink);
    	$this->assertEquals($STUB_sampleCraigslistAnchorLink, $DailyItem->get_anchorLink());
    	
    	global $STUB_sampleDailyCPTtitle;
    	global $STUB_sampleCraigslistAnchorLink;
    	$DailyItem->set_anchorLink($STUB_sampleCraigslistAnchorLink);
    	$this->assertEquals($STUB_sampleDailyCPTtitle, $DailyItem->get_title());
    }
    /**
     * @test
     * it should return "fetchThePhoneNumberAnchorLink" for unfetched dailys
     */
    public function it_should_return_fetchThePhoneNumberAnchorLink_for_unfetched_dailys(){
    	
    	//Some daily items have a phone number already associated with it.
    	//Some daily items have no phone number yet.
    	
    	//No phone number assigned:
    	global $STUB_sampleDailyCPTtitle;
    	$ID = wp_insert_post(['post_type' => 'daily', 'post_title' => $STUB_sampleDailyCPTtitle]);
    	
    	global $STUB_sampleCraigslistAnchorLink;
    	update_post_meta( $ID, 'anchorLink', $STUB_sampleCraigslistAnchorLink);
    	
    	$DailyItem = new CRGDaily\DailyItem($ID);
    	
    	global $STUB_fetchThePhoneNumberAnchorLink;
    	$this->assertEquals($STUB_fetchThePhoneNumberAnchorLink, $DailyItem->return_fetchThePhoneNumberAnchorLink($ID));

    }
    
    /**
     * @test
     * it should return "fetchThePhoneNumberAnchorLink" for fetched dailys
     */
    public function it_should_return_fetchThePhoneNumberAnchorLink_for_fetched_dailys(){
    	
    	//Some daily items have a phone number already associated with it.
    	//Some daily items have no phone number yet.
    	
    	//This CPT has a phone number:
    	global $STUB_sampleDailyCPTtitle;
    	$ID = wp_insert_post(['post_type' => 'daily', 'post_title' => $STUB_sampleDailyCPTtitle]);
    	
    	global $STUB_sampleCraigslistAnchorLink;
    	update_post_meta( $ID, 'anchorLink', $STUB_sampleCraigslistAnchorLink);
    	
    	global $STUB_sampleCraigslistPhone;
    	update_post_meta( $ID, 'phone', $STUB_sampleCraigslistPhone);
    	
    	$DailyItem = new CRGDaily\DailyItem($ID);
    	
    	global $STUB_fetchThePhoneNumberAnchorLink;
    	$this->assertEquals($STUB_sampleCraigslistPhone, $DailyItem->return_fetchThePhoneNumberAnchorLink($ID));
    	
    }
  
	public function stub_DailyCPT(){
		global $STUB_sampleDailyCPTtitle;
		$ID = wp_insert_post(['post_type' => 'daily', 'post_title' => $STUB_sampleDailyCPTtitle]);
		global $STUB_sampleCraigslistAnchorLink;
		update_post_meta( $ID, 'anchorLink', $STUB_sampleCraigslistAnchorLink);
		global $STUB_sampleCraigslistPhone;
		update_post_meta( $ID, 'phone', $STUB_sampleCraigslistPhone);
		return $ID;
	}

	public function it_should_store_properties_in_the_database(){
		global $STUB_sampleCraigslistAnchorLink;
		$anchorLink= $STUB_sampleCraigslistAnchorLink;
		$DailyItem = new CRGDaily\DailyItem($anchorLink);
	}
}