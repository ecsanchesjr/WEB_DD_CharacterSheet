<?php

class SavingThrows{
    public $strenght; 
    public $dexterity; 
    public $constituition; 
    public $intelligence;
    public $wisdom; 
    public $charisma;
    
    public function __construct($str, $dex, $con, $int, $wis, $cha){
        $this->strenght = $str;
        $this->dexterity = $dex;
        $this->constituition = $con;
        $this->intelligence = $int;
        $this->wisdom = $wis;
        $this->charisma = $cha;
    }
}

?>