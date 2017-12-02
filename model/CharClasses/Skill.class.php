<?php

class Skill{
    public $acrobatics; 
    public $animalHand; 
    public $arcana; 
    public $athletics; 
    public $deception; 
    public $history; 
    public $insight; 
    public $intimidation; 
    public $investigation; 
    public $medicine; 
    public $nature; 
    public $perception; 
    public $performance; 
    public $persuasion; 
    public $religion; 
    public $sleightHand; 
    public $stealth; 
    public $survival; 

    public function __construct($acro, $anim, $arc, $ath, $dec, $his, $ins, $int, $inv, $med, $nat, $perc, $perf, $pers, $rel, $sleight, $stealth, $surv){
        $this->acrobatics = $acro; 
        $this->animalHand = $anim; 
        $this->arcana = $arc; 
        $this->athletics = $ath; 
        $this->deception = $dec; 
        $this->history = $his; 
        $this->insight = $ins; 
        $this->intimidation = $int; 
        $this->investigation = $inv; 
        $this->medicine = $med; 
        $this->nature = $nat; 
        $this->perception = $perc;  
        $this->performance = $perf; 
        $this->persuasion = $pers; 
        $this->religion = $rel; 
        $this->sleightHand = $sleight; 
        $this->stealth = $stealth; 
        $this->survival = $surv; 
    }
}

?>