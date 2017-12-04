<?php 

require_once("CharClasses/AtksAndSpells.class.php");
require_once("CharClasses/Attributes.class.php");
require_once("CharClasses/Equipment.class.php");
require_once("CharClasses/SavingThrows.class.php");
require_once("CharClasses/Status.class.php");
require_once("CharClasses/Skill.class.php");
require_once("DBCon.php");

class Character{
    // Basic Infos
    public $charName;
    public $charLevel;
    public $charRace;
    public $charExp; 
    public $charBack;
    public $charAlign; 
    public $charPlayer; 
    public $charGroup; 

    //??
    public $inspiration; 
    public $profBonus; 
    public $passivePerc; 

    // Obj Attributes
    public $attribs;

    // Obj SavingThrows
    public $savingThrows;

    // Obj Skill
    public $skills;

    // Obj Status
    public $status;

    // Obj AtaksAndSpells
    public $attacks;

    // String with separators
    public $featAndTraits;
    public $profAndLang;

    // Obj Equipment
    public $equips;

    public function getAllCharsPlayer($login){
        $con = startCon();

        $query = $con->prepare("SELECT char_name, char_level FROM `web`.`Character` WHERE `char_playername`=:name;");
        $query->bindParam(":name", $login);

        if($query->execute()){
            return($query);
        }else{
            return(null);
        }
    }

    // ADD NEW CHAR METHODS
    public function addNewChar(){
        $con = startCon();
        
        if(!$this->insertBasicInfos($con)){
            echo "basics";
            //$this->deleteChar($this->charName, $this->charPlayer);
            die();
        }
        if(!$this->insertAttributes($con)){
            echo "atts";
           // $this->deleteChar($this->charName, $this->charPlayer);
        }
        if(!$this->insertStatus($con)){
            echo "status";
            //$this->deleteChar($this->charName, $this->charPlayer);
        }
        if(!$this->insertSavThrows($con)){
            echo "svthrows";
        }
        if(!$this->insertSkills($con)){
            echo "skills";
        }
        if(!$this->insertAttacks($con)){
            echo "atks";
        }
        if(!$this->insertFeatsAndTraits($con)){
            echo "feat";
        }
        if(!$this->insertProfAndLang($con)){
            echo "prof";
        }
        if(!$this->insertEquips($con)){
            echo "equip";
        }

    }

    private function insertBasicInfos($con){

        $query = $con->prepare("INSERT INTO `web`.`Character` (`char_name`, `char_level`, `char_class`, `char_background`, `char_playername`, `char_exppoints`, `char_alignment`, `char_advgroup`) VALUES (:name, :level, :class, :back, :player, :exp, :align, :group);");

        $query->bindParam(":name", $this->charName);
        $query->bindParam(":level", intval($this->charLevel));
        $query->bindParam(":class", $this->charRace);
        $query->bindParam(":back", $this->charBack);
        $query->bindParam(":player", $this->charPlayer);
        $query->bindParam(":exp", intval($this->charExp));
        $query->bindParam(":align", $this->charAlign);
        $query->bindParam(":group", $this->charGroup);

        return($query->execute());
    }

    public function deleteChar($name, $user){
        $con = startCon();

        $query = $con->prepare("DELETE FROM `web`.`Character` WHERE `char_name` = :name AND `char_playername` = :user;");
        $query->bindParam(":name", $name);
        $query->bindParam(":user", $user);

        return($query->execute());
    }

    private function insertAttributes($con){

        $query = $con->prepare("INSERT INTO `web`.`Attributes` (`att_strength`, `att_dexterity`, `att_constituition`, `att_intelligence`, `att_wisdom`, `att_charisma`, `att_inspiration`, `att_proficiencybonus`, `att_passiveperception`, `att_charname`, `att_charplayername`) VALUES (:str, :dex, :con, :int, :wis, :cha, :ins, :prof, :passper, :name, :login);");

        $query->bindParam(":str", intval($this->attribs->strenght));
        $query->bindParam(":dex", intval($this->attribs->dexterity));
        $query->bindParam(":con", intval($this->attribs->constituition));
        $query->bindParam(":int", intval($this->attribs->intelligence));
        $query->bindParam(":wis", intval($this->attribs->wisdom));
        $query->bindParam(":cha", intval($this->attribs->charisma));
        $query->bindParam(":ins", intval($this->inspiration));
        $query->bindParam(":prof", intval($this->profBonus));
        $query->bindParam(":passper", intval($this->passivePerc));
        $query->bindParam(":name", $this->charName);
        $query->bindParam(":login", $this->charPlayer);

        return($query->execute());
    }

    private function insertStatus($con){

        $query = $con->prepare("INSERT INTO `web`.`Status` (`status_charplayername`, `status_charname`, `status_currenthitpoints`, `status_armorclass`, `status_maxhp`, `status_temphp`, `status_initiate`, `status_speed`, `status_vision`) VALUES (:login, :name, :curhp , :armor, :maxhp, :temphp, :initiate, :speed, :vision);");

        $query->bindParam(":login", $this->charPlayer);
        $query->bindParam(":name", $this->charName);
        $query->bindParam(":curhp", intval($this->status->currentHp));
        $query->bindParam(":armor", intval($this->status->armor));
        $query->bindParam(":maxhp", intval($this->status->maxHp));
        $query->bindParam(":temphp", intval($this->status->tempHp));
        $query->bindParam(":initiate", intval($this->status->initiate));
        $query->bindParam(":speed", intval($this->status->speed));
        $query->bindParam(":vision", intval($this->status->vision));

        return($query->execute());
    }

    private function insertSavThrows($con){
        
        $query = $con->prepare("INSERT INTO `web`.`SavingThrows` (`sv_charname`, `sv_charplayername`, `sv_strength`, `sv_dexterity`, `sv_constituition`, `sv_intelligence`, `sv_wisdom`, `sv_charisma`) VALUES (:name, :player, :str, :dex, :con, :int, :wis, :cha);");

        $query->bindParam(":name", $this->charName);
        $query->bindParam(":player", $this->charPlayer);
        $query->bindParam(":str", intval($this->savingThrows->strenght));
        $query->bindParam(":dex", intval($this->savingThrows->dexterity));
        $query->bindParam(":con", intval($this->savingThrows->constituition));
        $query->bindParam(":int", intval($this->savingThrows->intelligence));
        $query->bindParam(":wis", intval($this->savingThrows->wisdom));
        $query->bindParam(":cha", intval($this->savingThrows->charisma));

        return($query->execute());
    }

    private function insertSkills($con){

        $query = $con->prepare("INSERT INTO `web`.`Skills` (`skills_charname`, `skills_charplayername`, `skills_acrobatics`, `skills_animalhand`, `skills_arcana`, `skills_athletics`, `skills_decepticon`, `skills_history`, `skills_insight`, `skills_intimidation`, `skills_investigation`, `skills_medicine`, `skills_nature`, `skills_percepticon`, `skills_performance`, `skills_persuasion`, `skills_religion`, `skills_sleightofhand`, `skills_stealth`, `skills_survival`) VALUES (:name, :login, :acro, :anim, :arc, :athl, :decep, :hist, :ins, :int, :inv, :med, :nat, :perc, :perf, :pers, :rel, :sleight, :stealth, :surv);");

        $query->bindParam(":name", $this->charName);
        $query->bindParam(":login", $this->charPlayer);
        $query->bindParam(":acro", intval($this->skills->acrobatics));
        $query->bindParam(":anim", intval($this->skills->animalHand));
        $query->bindParam(":arc", intval($this->skills->arcana));
        $query->bindParam(":athl", intval($this->skills->athletics));
        $query->bindParam(":decep", intval($this->skills->deception));
        $query->bindParam(":hist", intval($this->skills->history));
        $query->bindParam(":ins", intval($this->skills->insight));
        $query->bindParam(":int", intval($this->skills->intimidation));
        $query->bindParam(":inv", intval($this->skills->investigation));
        $query->bindParam(":med", intval($this->skills->medicine));
        $query->bindParam(":nat", intval($this->skills->nature));
        $query->bindParam(":perc", intval($this->skills->perception));
        $query->bindParam(":perf", intval($this->skills->performance));
        $query->bindParam(":pers", intval($this->skills->persuasion));
        $query->bindParam(":rel", intval($this->skills->religion));
        $query->bindParam(":sleight", intval($this->skills->sleightHand));
        $query->bindParam(":stealth", intval($this->skills->stealth));
        $query->bindParam(":surv", intval($this->skills->survival));

        return($query->execute());
    }

    private function insertAttacks($con){

        $query = $con->prepare("INSERT INTO `web`.`Attacks` (`attack_charname`, `attack_charplayername`, `attack_name`, `attack_attack`, `attack_damage`, `attack_range`, `attack_ammo`, `attack_used`) VALUES (:charName, :login, :name, :atk, :dam, :range, :ammo, :used);");

        $aux = true;

        foreach($this->attacks as $key => $value){
            $query->bindParam(":charName", $this->charName);
            $query->bindParam(":login", $this->charPlayer);
            $query->bindParam(":name", $value->name);
            $query->bindParam(":atk", intval($value->attack));
            $query->bindParam(":dam", intval($value->damage));
            $query->bindParam(":range", intval($value->range));
            $query->bindParam(":ammo", intval($value->ammo));
            $query->bindParam(":used", intval($value->used));
            
            $aux = $query->execute();
        }
        return($aux);
    }

    private function insertFeatsAndTraits($con){

        $query = $con->prepare("INSERT INTO `web`.`Features` (`features_charname`, `features_charplayername`, `features_information`) VALUES (:name, :login, :info);");

        $query->bindParam(":name", $this->charName);
        $query->bindParam(":login", $this->charPlayer);
        $query->bindParam(":info", $this->featAndTraits);

        return($query->execute());
    }

    private function insertProfAndLang($con){
        
        $query = $con->prepare("INSERT INTO `web`.`ProfAndLang` (`profandlang_charname`, `profandlang_charplayername`, `profandlang_information`) VALUES (:name, :login, :info);");
        
        $query->bindParam(":name", $this->charName);
        $query->bindParam(":login", $this->charPlayer);
        $query->bindParam(":info", $this->profAndLang);
        
        return($query->execute());
    }

    private function insertEquips($con){

        $query = $con->prepare("INSERT INTO `web`.`InventAndEquip` (`equip_charname`, `equip_charplayername`, `equip_c`, `equip_s`, `equip_e`, `equip_g`, `equip_p`, `equip_information`) VALUES (:name, :login, :c, :s, :e, :g, :p, :info);");

        $query->bindParam(":name", $this->charName);
        $query->bindParam(":login", $this->charPlayer);
        $query->bindParam(":c", intval($this->equips->c));
        $query->bindParam(":s", intval($this->equips->s));
        $query->bindParam(":e", intval($this->equips->e));
        $query->bindParam(":g", intval($this->equips->g));
        $query->bindParam(":p", intval($this->equips->p));
        $query->bindParam(":info", $this->equips->infos);

        return($query->execute());
    }

    // GET CHAR INFOS
    public function getCharInfos(){

        $con = startCon();

        $this->getBasicInfos($con);
        $this->getAttributesInfos($con);
        $this->getSavingThrows($con);
        $this->getSkills($con);
        $this->getStatus($con);
        $this->getAttacks($con);
        $this->getFeatAndTraits($con);
        $this->getProfAndLang($con);
        $this->getEquips($con);
    }

    private function getBasicInfos($con){

        $query = $con->prepare("SELECT `char_level`, `char_class`, `char_background`, `char_exppoints`, `char_alignment`, `char_advgroup` FROM `web`.`Character` WHERE `char_playername`=:player AND `char_name`=:name");

        $query->bindParam(":player", $this->charPlayer);
        $query->bindParam(":name", $this->charName);

        if($query->execute()){
            while($row = $query->fetch()){

                $this->charLevel = $row['char_level'];
                $this->charRace = $row['char_class'];
                $this->charBack = $row['char_background'];
                $this->charExp = $row['char_exppoints'];
                $this->charAlign = $row['char_alignment'];
                $this->charGroup = $row['char_advgroup'];
            }
        }else{
            echo "basic";
            die();
        }
    }

    private function getAttributesInfos($con){

        $query = $con->prepare("SELECT `att_strength`, `att_dexterity`, `att_constituition`, `att_intelligence`, `att_wisdom`, `att_charisma`, `att_inspiration`, `att_proficiencybonus`, `att_passiveperception` FROM `web`.`Attributes` WHERE  `att_charname`=:name AND `att_charplayername`=:player");

        $query->bindParam(":player", $this->charPlayer);
        $query->bindParam(":name", $this->charName);

        if($query->execute()){
            while($row = $query->fetch()){
                $this->profBonus = $row['att_proficiencybonus'];
                $this->inspiration = $row['att_inspiration'];
                $this->passivePerc = $row['att_passiveperception'];

                $this->attribs = new Attributes($row['att_strength'], $row['att_dexterity'], $row['att_constituition'], $row['att_intelligence'], $row['att_wisdom'], $row['att_charisma']);
            }
        }else{
            echo "attributes";
            die();
        }
    }

    private function getSavingThrows($con){

        $query = $con->prepare("SELECT `sv_strength`, `sv_dexterity`, `sv_constituition`, `sv_intelligence`, `sv_wisdom`, `sv_charisma` FROM `web`.`SavingThrows` WHERE `sv_charname`=:name AND `sv_charplayername`=:player");

        $query->bindParam(":player", $this->charPlayer);
        $query->bindParam(":name", $this->charName);

        if($query->execute()){
            while($row = $query->fetch()){
                $this->savingThrows = new SavingThrows($row['sv_strength'], $row['sv_dexterity'], $row['sv_constituition'], $row['sv_intelligence'], $row['sv_wisdom'], $row['sv_charisma']);
            }
        }else{
            echo "saving throws";
            die();
        }
    }

    private function getSkills($con){
        
        $query = $con->prepare("SELECT `skills_acrobatics`, `skills_animalhand`, `skills_arcana`, `skills_athletics`, `skills_decepticon`, `skills_history`, `skills_insight`, `skills_intimidation`, `skills_investigation`, `skills_medicine`, `skills_nature`, `skills_percepticon`, `skills_performance`, `skills_persuasion`, `skills_religion`, `skills_sleightofhand`, `skills_stealth`, `skills_survival` FROM `web`.`Skills` WHERE `skills_charname`=:name AND `skills_charplayername`=:player");

        $query->bindParam(":player", $this->charPlayer);
        $query->bindParam(":name", $this->charName);

        if($query->execute()){
            while($row = $query->fetch()){
                $this->skills = new Skill($row['skills_acrobatics'], $row['skills_animalhand'], $row['skills_arcana'], $row['skills_athletics'], $row['skills_decepticon'], $row['skills_history'], $row['skills_insight'], $row['skills_intimidation'], $row['skills_investigation'], $row['skills_medicine'], $row['skills_nature'], $row['skills_percepticon'], $row['skills_performance'], $row['skills_persuasion'], $row['skills_religion'], $row['skills_sleightofhand'], $row['skills_stealth'], $row['skills_survival']);
            }
        }else{
            echo "skills";
            die();
        }
    }

    private function getStatus($con){

        $query = $con->prepare("SELECT `status_currenthitpoints`, `status_armorclass`, `status_maxhp`, `status_temphp`, `status_initiate`, `status_speed`, `status_vision` FROM `web`.`Status` WHERE `status_charname`=:name AND `status_charplayername`=:player");

        $query->bindParam(":player", $this->charPlayer);
        $query->bindParam(":name", $this->charName);

        if($query->execute()){
            while($row = $query->fetch()){
                $this->status = new Status($row['status_armorclass'], $row['status_maxhp'], $row['status_temphp'], $row['status_currenthitpoints'], $row['status_initiate'], $row['status_speed'], $row['status_vision']);
            }
        }else{
            echo "Status";
            die();
        }
    }

    private function getAttacks($con){

        $query = $con->prepare("SELECT `attack_name`, `attack_attack`, `attack_damage`, `attack_range`, `attack_ammo`, `attack_used` FROM `web`.`Attacks` WHERE `attack_charname`=:name AND `attack_charplayername`=:player");

        $query->bindParam(":player", $this->charPlayer);
        $query->bindParam(":name", $this->charName);

        if($query->execute()){
            $aux = 0;
            $this->attacks = array();
            while($row = $query->fetch()){
                $this->attacks[$aux] = new AtkAndSpell($row['attack_name'], $row['attack_attack'], $row['attack_damage'], $row['attack_range'], $row['attack_ammo'], $row['attack_used']);
                $aux++;
            }
        }else{
            echo "atks";
            die();
        }
    }

    private function getFeatAndTraits($con){

        $query = $con->prepare("SELECT `features_information` FROM `web`.`Features` WHERE `features_charname`=:name AND `features_charplayername`=:player");

        $query->bindParam(":player", $this->charPlayer);
        $query->bindParam(":name", $this->charName);

        if($query->execute()){
            while($row = $query->fetch()){
                $this->featAndTraits = $row['features_information'];
            }
        }else{
            echo "feats";
            die();
        }
    }

    private function getProfAndLang($con){

        $query = $con->prepare("SELECT `profandlang_information` FROM `web`.`ProfAndLang` WHERE `profandlang_charname`=:name AND `profandlang_charplayername`=:player");

        $query->bindParam(":player", $this->charPlayer);
        $query->bindParam(":name", $this->charName);

        if($query->execute()){
            while($row = $query->fetch()){
                $this->profAndLang = $row['profandlang_information'];
            }
        }else{
            echo "profandlang";
            die();
        }
    }

    private function getEquips($con){

        $query = $con->prepare("SELECT `equip_c`, `equip_s`, `equip_e`, `equip_g`, `equip_p`, `equip_information` FROM `web`.`InventAndEquip` WHERE `equip_charname`=:name AND `equip_charplayername`=:player");

        $query->bindParam(":player", $this->charPlayer);
        $query->bindParam(":name", $this->charName);

        if($query->execute()){
            while($row = $query->fetch()){
                $this->equips = new Equipment($row['equip_information'], $row['equip_c'], $row['equip_s'], $row['equip_e'], $row['equip_g'], $row['equip_p']);
            }
        }else{
            echo "equips";
            die();
        }
    }

}
?>