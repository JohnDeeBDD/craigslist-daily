alert('DailyItems');

/*jQuery(document).ready(function() {
	var lastDaily = jQuery("#last-daily").val();
	clickme = "next-fetch-click-" + lastDaily;
    setTimeout(function() {
    	document.getElementById(clickme).click();
    }, 8000);
});
*/
jQuery(document).ready(function() {
    setTimeout(function() {
        jQuery('#daily-runner-button').click();
    }, 30000);
});