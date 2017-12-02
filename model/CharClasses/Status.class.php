<?php

class Status{
    public $armor; 
    public $maxHp; 
    public $tempHp; 
    public $currentHp; 
    public $initiate; 
    public $speed; 
    public $vision;
    
    public function __construct($armor, $maxHp, $tempHp, $currentHp, $initiate, $speed, $vision){
        $this->armor = $armor; 
        $this->maxHp = $maxHp; 
        $this->tempHp = $tempHp; 
        $this->currentHp = $currentHp; 
        $this->initiate = $initiate; 
        $this->speed = $speed; 
        $this->vision = $vision;    
    }
}

?>