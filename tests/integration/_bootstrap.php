<?php
// Here you can initialize variables that will be available to your tests

//Variable stubs:

//May not be live!
global 	$STUB_sampleCraigslistAnchorLink; 	
		$STUB_sampleCraigslistAnchorLink = 
'<a target = "_BLANK" href="http://newyork.craigslist.org/brk/wri/6072050862.html" data-id="6072050862" class="result-title hdrlnk">Make Extra $$$ Writing Articles From Home</a>';

//Connected to $STUB_sampleCraigslistAnchorLink
global 	$STUB_sampleDailyCPTtitle; 			
		$STUB_sampleDailyCPTtitle = 
"Make Extra $$$ Writing Articles From Home";
		
global 	$STUB_sampleCraigslistPhone;			
		$STUB_sampleCraigslistPhone = 
"(702)555-1212";
		
global 	$STUB_fetchThePhoneNumberAnchorLink;
		$STUB_fetchThePhoneNumberAnchorLink = 
"<span><a class = 'next-fetch-clicker' id = 'next-fetch-click-5' href = '/wp-admin/admin.php?page=crg-daily%2Flib%2FCraigslistAdminPage.class.php&fetch-phone-number=5'>Fetch pending...</a></span>";

//These URLs are dependant on Craigslist:
global 	$STUB_CL_URL_with_no_phone;			
		$STUB_CL_URL_with_no_phone = 
"https://minneapolis.craigslist.org/ram/tch/6077998723.html";
		
global 	$STUB_CL_URL_with_phone;				
		$STUB_CL_URL_with_phone = 
"https://knoxville.craigslist.org/web/6072140964.html";