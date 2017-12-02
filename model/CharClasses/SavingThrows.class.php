<?php

class SavingThrows{
    public $strenght; 
    public $dexterity; 
    public $constituintion; 
    public $intelligence;
    public $wisdom; 
    public $charisma;
    
    public function __construct($str, $dex, $con, $int, $wis, $cha){
        $this->strenght = $str;
        $this->dexterity = $dex;
        $this->constituintion = $con;
        $this->intelligence = $int;
        $this->wisdom = $wis;
        $this->charisma = $cha;
    }
}

?>