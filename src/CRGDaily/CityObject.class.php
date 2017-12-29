<?php

namespace CRGDaily;

class CityObject{
    
    public $anchorLink;
    
    public function __construct($anchorLink){
        $this->anchorLink = $anchorLink;
    }
    
    public function __get($var){
        $anchorLink = $this->anchorLink;
        if ($var == "citySlug"){
            return ($this->extractCitySlugFromAnchorLink($anchorLink));
        }     
        
        if ($var == "Url"){
            return ($this->extractURLfromAnchorLink($anchorLink));
        }
        
        if ($var == "cityNiceName"){
            return ($this->extractTextFromAnchorLink($anchorLink));
        }
    }
    
    public function extractCitySlugFromAnchorLink($anchorLink){
        $cityName = $this->getBetween("//", ".craigslist.", $anchorLink);
        return $cityName;
        //return "myballs";
    }
    
    public function extractURLfromAnchorLink($anchorLink){
        $anchorLink = $this->anchorLink;
        $cityName = $this->getBetween('"', '"', $anchorLink);
        return $cityName;
    }
    
    public function extractTextFromAnchorLink($anchorLink){
        $text = $this->getBetween('/">', '</a>', $anchorLink);
        return $text;
    }
    
    public function getBetween($var1="",$var2="",$pool){
        $temp1 = strpos($pool,$var1)+strlen($var1);
        $result = substr($pool,$temp1,strlen($pool));
        $dd=strpos($result,$var2);
        if($dd == 0){
            $dd = strlen($result);
        }
        
        return substr($result,0,$dd);
    }
}