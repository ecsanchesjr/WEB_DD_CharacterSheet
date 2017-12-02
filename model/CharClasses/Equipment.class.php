<?php

class Equipment{
    public $infos; 
    public $c; 
    public $s; 
    public $e; 
    public $g; 
    public $p;
    
    public function __construct($info, $c, $s, $e, $g, $p){
        $this->infos = $info; 
        $this->c = $c; 
        $this->s = $s; 
        $this->e = $e; 
        $this->g = $g; 
        $this->p = $p;
    }
}

?>