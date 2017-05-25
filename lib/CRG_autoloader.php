<?php
namespace CustomRayGuns;

function CRG_autoload($className){
	$front = substr($className, 0, 13);
	
	if ($front != "CustomRayGuns"){
		return;
	}
	$className = substr($className, 14);
	$fileName = $className . '.class.php';

	include_once($fileName);
}

spl_autoload_register('CustomRayGuns\CRG_autoload');