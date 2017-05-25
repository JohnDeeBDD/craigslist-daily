<?php

namespace CRG_Daily;

class CRG_DailyAutoloader{
	
	public function __construct(){
		spl_autoload_register(function ($className){
			$front =  (substr($className, 0, 9));
			if ($front == "CRG_Daily"){
				$includePath = substr($className, 10);
				$includePath = dirname(__DIR__) . "/CRG_Daily/" . $includePath . ".class.php";
				include $includePath;
			}
		});
	}
	
}