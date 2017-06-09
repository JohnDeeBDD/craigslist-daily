<?php

namespace CRGDaily;

function autoload($className){
	$front = substr($className, 0, 8);
	
	if ($front != "CRGDaily"){
		return;
	}
	$className = substr($className, 9);
	$plugin_dir_path= plugin_dir_path(__FILE__);
	//Check for ".class.php":
	$fileName = $plugin_dir_path .$className . '.class.php';
	
	//Enable stack trace:
	//echo($fileName);
	
	
	if (file_exists($fileName)) {
		include_once($fileName);
	}else{
		//Check for ".trait.php":
		$fileName = $plugin_dir_path . $className . '.trait.php';
		if (file_exists($fileName)) {
			include_once($fileName);
		}
	}
}

spl_autoload_register('CRGDaily\autoload');