<?php

class CityObjectTest extends \Codeception\TestCase\WPTestCase{
    
    public $stubAnchorLink = '<a href="https://grenoble.craigslist.org/">grenoble</a>';
    
    /**
     * @test
     * it should be instantiatable
     */
    public function it_should_be_instantiatable(){
        $stubAnchorLink = $this->stubAnchorLink;
        $CityObject = new CRGDaily\CityObject($stubAnchorLink);
    }
         
    /**
     * @test
     * it should return the URL
     */
    public function itShouldReturnTheURL(){
        $stubAnchorLink = $this->stubAnchorLink;
        $CityObject = new CRGDaily\CityObject($stubAnchorLink);
        $returnedUrl = $CityObject->Url;
        $this->assertEquals("https://grenoble.craigslist.org/", $returnedUrl, "Not expected result: $returnedUrl");        
    }
    
    /**
     * @test
     * it should return the city slug
     */
    public function itShouldReturnTheCitySlug(){
        $stubAnchorLink = $this->stubAnchorLink;
        $CityObject = new CRGDaily\CityObject($stubAnchorLink);
        $returnedUrl = $CityObject->citySlug;
        $this->assertEquals("grenoble", $returnedUrl, "Not expected result: $returnedUrl");
    }
    
    /**
     * @test
     * it should return the city nice name
     */
    public function itShouldReturnTheCityNiceName(){
        $stubAnchorLink = $this->stubAnchorLink;
        $CityObject = new CRGDaily\CityObject($stubAnchorLink);
        $returnedUrl = $CityObject->cityNiceName;
        $this->assertEquals("grenoble", $returnedUrl, "Not expected result: $returnedUrl");
    }
}