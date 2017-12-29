<?php

namespace CRGDaily;

class TickerPointerForListOfSites{
    
    
    public $pointer;
    public $maxPointer;
    
    public $optionName = "tickerPointerForListOfCraigslistSites";
    
    public function __construct($maxPointer = 9999999){
        $optionName =$this->optionName;
        $pointer = get_option($optionName);
        if ($pointer == false){
            $this->pointer = 0;
         }else{
             $this->pointer = $pointer;
         }
        
        $this->maxPointer = $maxPointer;
    }
    
    public function __get( $key ){
        if($key == "pointer"){
            return ($this->pointer);
        }
        return $this->values[ $key ];
    }
    
    public function __set( $key, $value ){
        $this->values[ $key ] = $value;
    }
    
    public function advancePointer(){
        $pointer = $this->pointer;
        ++$pointer;
        $this->pointer = $pointer;
        $optionName = $this->optionName;
        
        if($pointer >= ($this->maxPointer)){
            $pointer = 0;
        }
        update_option($optionName, $pointer);
    }
        
}