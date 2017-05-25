<?php

namespace CustomRayGuns;

//This file contains the actual texts of the emails:
include_once('templatesJS.php');

class EmailJS {
	
	public function getMessagesOutput(){

		$messageOutput = <<<messageOutput
<script>
jQuery('document').ready(function(){
				
		//alert('EmailJS.class.php');

		jQuery('[id^=email-message-area-]').val(updateMessage('def'));
		jQuery('[id^=email-title-]').change(function() {
			var value = jQuery(this).val();
			var crgID = jQuery(this).attr('id').replace('email-title-', '');
			jQuery('#email-message-area-' + crgID).val(updateMessage(value));
			updateMailto(crgID);
			//jQuery('#craigslist-send-email-text-box-' + crgID).val(value);
		});
		
		jQuery('[id^=craigslist-send-email-text-box-]').on('input', function() {
			var crgID = jQuery(this).attr('id').replace('craigslist-send-email-text-box-', '');
			updateMailto(crgID);
		});
		
		jQuery('[id^=email-message-area-]').on('input', function() {
			var crgID = jQuery(this).attr('id').replace('email-message-area-', '');
			updateMailto(crgID);
		});
		
		setTimeout(function(){
	        jQuery('#crg-get-items-button').click();
   		},300000);
   		
   		jQuery('[id^=mailto-').click(function() {
   			var crgID = jQuery(this).attr('id').replace('mailto-', '');
   			jQuery('#clear-item-number-' + crgID).click();
   		});
		
		
		function updateMailto(crgID) {
			var email = jQuery('#craigslist-send-email-text-box-' + crgID).val();
			var opt = jQuery('#email-title-' + crgID).val();
			var title = jQuery('#email-title-' + crgID + ' option[value= ' + opt + ']').html();
			var bodyValue = jQuery('#email-message-area-' + crgID).val();
			var body = bodyValue.replace(/(\\r\\n|\\n|\\r)/gm,"%0D");
			var mailto = 'mailto:' + email + '?subject=' + title + '&body=' + body;
			jQuery('#mailto-' + crgID).attr('href', mailto);
		}
		
		function updateMessage(template) {
			var msg = 'abc';
			switch(template) {
				case "temp1":
					msg = jQuery('#template1').html();
					break;
				case "temp2":
					msg = jQuery('#template2').html();
					break;
				case "temp3":
					msg = jQuery('#template3').html();
					break;
				case "temp4":
					msg = jQuery('#template4').html();
					break;
				case "temp5":
					msg = jQuery('#template5').html();
					break;
				default:
					msg = jQuery('#template1').html();
					break;
			}
			return msg;
		}
});
</script>
messageOutput;
		
		return $messageOutput;
	}
}