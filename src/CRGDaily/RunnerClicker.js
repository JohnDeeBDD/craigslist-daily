//alert('RunnerClicker.js working!!');
jQuery(document).ready(function() {
	var lastDaily = jQuery("#last-daily").val();
	clickme = "next-fetch-click-" + lastDaily;
	//alert(clickme);
    setTimeout(function() {
    	document.getElementById(clickme).click();
    }, 2000);
});

jQuery(document).ready(function() {
    setTimeout(function() {
        jQuery('#daily-runner-button').click();
    }, 8000);
});