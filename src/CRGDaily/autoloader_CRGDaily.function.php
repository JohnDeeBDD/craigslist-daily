<?php

namespace CRGDaily;

function autoload($className){
	$front = substr($className, 0, 8);
	
	if ($front != "CRGDaily"){
		return;
	}
	$className = substr($className, 9);
	
	//Check for ".class.php":
	$fileName = '//var/www/html/wp-content/plugins/crg-daily/src/CRGDaily/' . $className . '.class.php';
	if (file_exists($fileName)) {
		include_once($fileName);
	}else{
		//Check for ".trait.php":
		$fileName = '//var/www/html/wp-content/plugins/crg-daily/src/CRGDaily/' . $className . '.trait.php';
		if (file_exists($fileName)) {
			include_once($fileName);
		}
	}
}

spl_autoload_register('CRGDaily\autoload');