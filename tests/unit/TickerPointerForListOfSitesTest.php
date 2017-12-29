<?php

class TickerPointerForListOfSitesTest extends \Codeception\TestCase\WPTestCase{
    
    public $optionName = "tickerPointerForListOfCraigslistSites";
    
    /**
     * @test
     * it should be instantiatable
     */
    public function it_should_be_instantiatable(){
        $TickerPointerForListOfSites = new CRGDaily\TickerPointerForListOfSites();
    }
         
     /**
     * @test
     * if it is not in the database set it at 0
     */
   public function ifItIsNotInTheDB_SetTheOptionToZero(){
       //given
       delete_option($this->optionName);
       $TickerPointerForListOfSites = new CRGDaily\TickerPointerForListOfSites();
       
       //when
       $retreivedOption = $TickerPointerForListOfSites->pointer;
       
       //then
       $this->assertEquals(0, $retreivedOption);
   }
    
    /**
     * @test
     * if it is in the database, validate it
     */
    
    //given there is a collection of search objects that has a min an max #
   
   /**
    * @test
    * it should advance 1, 
    */
   public function itShouldAdvanceOne(){
       $name = new CRGDaily\TickerPointerForListOfSites();
       $optionName = $name->optionName;
       
       update_option($optionName, 6);
       
       $TickerPointerForListOfSites = new CRGDaily\TickerPointerForListOfSites(99);
       $optionName = $TickerPointerForListOfSites->optionName;
       $TickerPointerForListOfSites->advancePointer();
       $returnedOption = get_option($optionName);
       $this->assertEquals(7, $returnedOption);
   }
   
   
   /**
    * @test
    * it should reset to 0 if over the limit
    */
   public function itShouldResetToZeroIfOverTheLimit(){
       
       $TickerPointerForListOfSites = new CRGDaily\TickerPointerForListOfSites();
       $optionName = $TickerPointerForListOfSites->optionName;
       
       //You have to unset and reset the class to stub the option
       update_option($optionName, 6);
       unset($TickerPointerForListOfSites);
       $maxPointer = 8;
       $TickerPointerForListOfSites = new CRGDaily\TickerPointerForListOfSites($maxPointer);       

       
       //this should push the pointer over the limit:
       $TickerPointerForListOfSites->advancePointer();
       $TickerPointerForListOfSites->advancePointer();
       $TickerPointerForListOfSites->advancePointer();
       
       $returnedOption = get_option($optionName);
       $this->assertEquals($returnedOption, 0);
   }

}