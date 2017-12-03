<?php 

class AtkAndSpell{
    public $name;
    public $attack;
    public $damage;
    public $range;
    public $ammo;
    public $used;

    public function __construct($name, $attack, $damage, $range, $ammo, $used){
        $this->name = $name;
        $this->attack = $attack;
        $this->damage = $damage;
        $this->range = $range;
        $this->ammo = $ammo;
        $this->used = $used;
    }
}

?>