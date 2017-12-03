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
}

/* class Character{
    public $charName;
    public $charLevel;
    public $charRace;
    public $charExp; 
    public $charBack;
    public $charAlign; 
    public $charPlayer; 
    public $charGroup; 
    //attributes
    public $atribStr; 
    public $atribDex; 
    public $atribCon; 
    public $atribInt; 
    public $atribWis; 
    public $atribCha; 
    //??
    public $inspiration; 
    public $profBonus; 
    public $passivePerc; 
    //saving throws
    public $savingStr; 
    public $savingDex; 
    public $savingCon; 
    public $savingInt;
    public $savingWis; 
    public $savingCha; 
    //skills
    public $skillAcrobatics; 
    public $skillAnimalHand; 
    public $skillArcana; 
    public $skillAthletics; 
    public $skillDeception; 
    public $skillHistory; 
    public $skillInsight; 
    public $skillIntimidation; 
    public $skillInvestigation; 
    public $skillMedicine; 
    public $skillNature; 
    public $skillPerception; 
    public $skillPerformance; 
    public $skillPersuasion; 
    public $skillReligion; 
    public $skillSleightHand; 
    public $skillStealth; 
    public $skillSurvival; 
    //Status
    public $statusArmor; 
    public $statusMaxHp; 
    public $statusTempHp; 
    public $statusCurrentHp; 
    public $statusInitiate; 
    public $statusSpeed; 
    public $statusVision; 
    // Attacks And SpellCasting
    public $atkAndSpells; 
    // Features and Traits
    public $featAndTraits; 
    // Proficiencies and Languages
    public $profAndLang; 
    // Equipament
    public $equipamentInfo; 
    public $equipC; 
    public $equipS; 
    public $equipE; 
    public $equipG; 
    public $equipP; 
} */

?>