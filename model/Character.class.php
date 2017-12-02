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

    public function insertChar(){
        $con = startCon();
        
        if(!insertBasicInfos($con)){
            echo "basics";
        }
    }

    private function insertBasicInfos($con){

        $query = $con->prepare("INSERT INTO `web`.`Character` (`char_name`, `char_level`, `char_class`, `char_background`, `char_playername`, `char_exppoints`, `char_alignment`, `char_advgroup`) VALUES (:name, :level, :class, :back, :player, :exp, :align, :group);");

        $query->bindParam(":name", $this->charName);
        $query->bindParam(":level", $this->charLevel);
        $query->bindParam(":class", $this->charRace);
        $query->bindParam(":back", $this->charBack);
        $query->bindParam(":player", $this->charPlayer);
        $query->bindParam(":exp", $this->charExp);
        $query->bindParam(":align", $this->charAlign);
        $query->bindParam(":group", $this->charGroup);

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