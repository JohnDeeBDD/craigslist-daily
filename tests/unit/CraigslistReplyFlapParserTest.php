<?php

class CraigslistReplyFlapParserTest extends \Codeception\TestCase\WPTestCase{
	
	/**
	 * @test
	 * it should be instantiatable
	 */
    public function it_should_be_instantiatable(){
    	$CraigslistReplyFlapParser = new CRGDaily\CraigslistReplyFlapParser();
    }
    
    /**
     * @test
     * it should return a boolean true if there is a phone character
     */
    public function it_should_return_bool_there_is_a_phone_character(){
    	$CraigslistReplyFlapParser = new CRGDaily\CraigslistReplyFlapParser();
    	$this->assertTrue($CraigslistReplyFlapParser->thereIsPhoneCharacter($this->STUB_FlapWithPhoneAndEmail));
    	$this->assertFalse($CraigslistReplyFlapParser->thereIsPhoneCharacter($this->STUB_replyFlapWithoutPhoneCharacter));
    }
    
    /**
     * @test
     * it should return a boolean true if there is an email
     */
    public function it_should_return_bool_there_is_an_email(){
    	$CraigslistReplyFlapParser = new CRGDaily\CraigslistReplyFlapParser();
    	$this->assertTrue($CraigslistReplyFlapParser->thereIsEmail($this->STUB_FlapWithPhoneAndEmail));
    	$this->assertFalse($CraigslistReplyFlapParser->thereIsEmail($this->STUB_replyFlapWithouthEmail));
    }
    
    /**
     * @test
     * it should extract and email from a blurb
     */
    public function it_should_extract_an_email_from_a_blurb(){
    	$CraigslistReplyFlapParser= new CRGDaily\CraigslistReplyFlapParser();
    	$actual = $CraigslistReplyFlapParser->extractEmail($this->STUB_FlapWithPhoneAndEmail);
    	$expected = "5fs5c-6113347323@job.craigslist.org";
    	$this->assertEquals($expected, $actual, "Expected: $expected Actual: $actual");   	
    }
    
    
    public $STUB_FlapWithPhoneAndEmail =
    
    <<<HEREDOC_STUB_replyFlap
    contact name:
            Ian Marshall
    		
    		
    		
                call
                    call
    		
or
                text
                text:
                
                
            ☎ (770) 361-7068
            
            
            
            
        reply by email:
        5fs5c-6113347323@job.craigslist.org
        
        
        webmail links:
        
        
                    gmail
                    
                    
                    
                    
                    yahoo mail
                    
                    
                    
                    
                    hotmail, outlook, live mail
                    
                    
                    
                    
                    aol mail
                    
                    
                    
                    
        copy and paste into your email:
        5fs5c-6113347323@job.craigslist.org
HEREDOC_STUB_replyFlap;

    public $STUB_replyFlapWithoutPhoneCharacter=
    
    <<<HEREDOC_STUB_replyFlap
    contact name:
            Ian Marshall
            
            
            
            
            
            
            
        reply by email:
        5fs5c-6113347323@job.craigslist.org
        
        
        webmail links:
        
        
                    gmail
                    
                    
                    
                    
                    yahoo mail
                    
                    
                    
                    
                    hotmail, outlook, live mail
                    
                    
                    
                    
                    aol mail
                    
                    
                    
                    
        copy and paste into your email:
        5fs5c-6113347323@job.craigslist.org
HEREDOC_STUB_replyFlap;
    
    public $STUB_replyFlapWithouthEmail=
    <<<HEREDOC_STUB_replyFlap
    contact name:
            Ian Marshall
            
            
            
            
            
            
            
        reply by email:
 
        
        webmail links:
        
        
                    gmail
                    
                    
                    
                    
                    yahoo mail
                    
                    
                    
                    
                    hotmail, outlook, live mail
                    
                    
                    
                    
                    aol mail
                    
                    
                    
                    
        copy and paste into your email:

HEREDOC_STUB_replyFlap;
}