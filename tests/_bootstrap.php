<?php
// This is global bootstrap for autoloading
echo("*********************************************************************");

function CRG_DailyAutoload($className){
	$front = substr($className, 0, 9);
	
	//Check namespace:
	if ($front != "CRG_Daily"){
		return;
	}
	
	$className = substr($className, 10);
	
	//Check for ".class.php":
	$fileName = '//var/www/html/wp-content/plugins/craigslist-daily/lib/' . $className . '.class.php';
	if (file_exists($fileName)) {
		include_once($fileName);
	}else{
		//Check for ".trait.php":
		$fileName = '//var/www/html/wp-content/plugins/craigslist-daily/lib/' . $className . '.trait.php';
		if (file_exists($fileName)) {
			include_once($fileName);
		}
	}
}
spl_autoload_register('CRG_DailyAutoload');

function CRGDailyAutoload($className){
	$front = substr($className, 0, 8);
	
	//Check namespace:
	if ($front != "CRGDaily"){
		return;
	}
	
	$className = substr($className, 9);
	
	//Check for ".class.php":
	$fileName = '//var/www/html/wp-content/plugins/craigslist-daily/src/CRGDaily/' . $className . '.class.php';
	if (file_exists($fileName)) {
		include_once($fileName);
	}else{
		//Check for ".trait.php":
		$fileName = '//var/www/html/wp-content/plugins/craigslist-daily/src/CRGDaily/' . $className . '.trait.php';
		if (file_exists($fileName)) {
			include_once($fileName);
		}
	}
}
spl_autoload_register('CRGDailyAutoload');