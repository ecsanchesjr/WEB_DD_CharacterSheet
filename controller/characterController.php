<?
    require_once("../model/Character.class.php");
    session_start();

    $tag = $_POST["actionTag"];

    if(isset($_POST["charData"])){
        $data = $_POST["charData"];
        unset($_POST);
    }

    switch($tag){
        case "send":
            $char = new Character;
            getCharInfos($char, $data);
            $char->addNewChar();
            print_r($char);
        break;

        case "delete":

        break;

        case "roll":
            $values = array("str"=>rand(3,18), "dex"=>rand(3,18), "con"=>rand(3,18), "int"=>rand(3,18), "wis"=>rand(3,18), "cha"=>rand(3,18));
            echo json_encode($values);
        break;

        case "load":
            $char = new Character;
            $char->charPlayer = $_SESSION['userLogin'];
            $char->charName = $_POST['charName'];
            $char->getCharInfos();

        break;
    }


    function getCharInfos($char, $data){
        $char->charName = $data['charName'];
        $char->charLevel = $data['charLevel'];
        $char->charRace = $data['charRace'];
        $char->charExp = $data['charExp'];
        $char->charBack = $data['charBack'];
        $char->charAlign = $data['charAlign'];
        $char->charPlayer = $_SESSION['userLogin'];
        $char->charGroup = $data['charGroup'];

        $aux = $data['attributes'];
        $char->attribs = new Attributes($aux['strenght'], $aux['dexterity'], $aux['constituition'], $aux['intelligence'], $aux['wisdom'], $aux['charisma']);
        unset($aux);

        $char->inspiration = $data['inspiration'];
        $char->profBonus = $data['profBonus'];
        $char->passivePerc = $data['passivePerc'];

        $aux = $data['savingThrows'];
        $char->savingThrows = new SavingThrows($aux['strenght'], $aux['dexterity'], $aux['constituition'], $aux['intelligence'], $aux['wisdom'], $aux['charisma']);
        unset($aux);

        $aux = $data['skills'];
        $char->skills = new Skill($aux['acrobatics'], $aux['animalHand'], $aux['arcana'], $aux['athletics'], $aux['deception'], $aux['history'], $aux['insight'], $aux['intimidation'], $aux['investigation'], $aux['medicine'], $aux['nature'], $aux['perception'], $aux['performance'], $aux['persuasion'], $aux['religion'], $aux['sleightHand'], $aux['stealth'], $aux['survival']);
        unset($aux);

        $aux = $data['status'];
        $char->status = new Status($aux['armor'], $aux['maxHp'], $aux['tempHp'], $aux['currentHp'], $aux['initiate'], $aux['speed'], $aux['vision']);
        unset($aux);

        $aux = 0;
        $char->attacks = array();
        if(isset($data['atkAndSpells'])){
            foreach($data['atkAndSpells'] as $key => $value){
                $char->attacks[$aux] = new AtkAndSpell($value['name'], $value['attack'], $value['damage'], $value['range'], $value['ammo'], $value['used']);
                $aux++;
            }
        }
        unset($aux);

        $char->featAndTraits = $data['featAndTraits'];
        $char->profAndLang = $data['profAndLang'];

        $aux = $data['equips'];
        $char->equips = new Equipment($aux['info'], $aux['c'], $aux['s'], $aux['e'], $aux['g'], $aux['p']);
        unset($aux);
    }

?>