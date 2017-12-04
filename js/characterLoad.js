function set(name, value){
    var element = document.getElementsByName(name)[0];
    if(value == ""){
        if(element.type == "number"){
            element.value = 0;
        }else{
            element.value = value;
        }
    }else{
        element.value = value;
    }
}

function getOne(array){
    if(array.length > 0){
        return(array.shift());
    }else{
        return("");
    }
}

function setAllData(json){
    console.log(json);

    set("input_charNome", json.charName);
    set("input_charLevel", json.charLevel);
    set("input_charRace", json.charRace);
    set("input_charExp", json.charExp);
    set("input_charBack", json.charBack);
    set("input_charAlign", json.charAlign);
    set("input_charPlayer", json.charPlayer);
    set("input_charGroup", json.charGroup);
    setAttributes(json.attribs);
    set("input_insp", json.inspiration);
    set("input_profBonus", json.profBonus);
    set("input_passivePerc", json.passivePerc)
    setSavingThrows(json.savingThrows);
    setSkills(json.skills);
    setStatus(json.status);
    setAttacks(json.attacks);
    setFeatures(json.featAndTraits);
    setProficiency(json.profAndLang);
    setEquips(json.equips);
}

function setAttributes(data){
    set("input_atribStr", data.strenght);
    set("input_atribDex", data.dexterity);
    set("input_atribCon", data.constituition);
    set("input_atribInt", data.intelligence);
    set("input_atribWis", data.wisdom);
    set("input_atribCha", data.charisma);
}

function setSavingThrows(data){
    set("input_savStr", data.strenght);
    set("input_savDex", data.dexterity);
    set("input_savCon", data.constituition);
    set("input_savInt", data.intelligence);
    set("input_savWis", data.wisdom);
    set("input_savCha", data.charisma); 
}

function setSkills(data){
    set("input_skillAcrobatics", data.acrobactics);
    set("input_skillAnimalHandling", data.animalHand);
    set("input_skillArcana", data.arcana);
    set("input_skillAthletics", data.athletics);
    set("input_skillDeception", data.deception);
    set("input_skillHistory", data.history);
    set("input_skillInsight", data.insight);
    set("input_skillIntimidation", data.intimidation);
    set("input_skillInvestigation", data.investigation);
    set("input_skillMedicine", data.medicine);
    set("input_skillNature", data.nature);
    set("input_skillPerception", data.perception);
    set("input_skillPerformance", data.performance);
    set("input_skillPersuasion", data.persuasion);
    set("input_skillReligion", data.religion);
    set("input_skillSleightOfHand", data.sleightHand);
    set("input_skillStealth", data.stealth);
    set("input_skillSurvival", data.survival)
}

function setStatus(data){
    set("input_armor", data.armor)
    set("input_maxHp", data.maxHp);
    set("input_tempHp", data.tempHp);
    set("input_currentHp", data.currentHp);
    set("input_statusInitiate", data.initiate);
    set("input_statusSpeed", data.speed);
    set("input_statusVision", data.vision);
}

function setAttacks(data){
    var rows = data.length;

    for(i = 1; i <= rows; i++){
        set("input_spellsName" + i, data[i-1].name);
        set("input_spellsAttack" + i, data[i-1].attack);
        set("input_spellsDamage" + i, data[i-1].damage);
        set("input_spellsRange" + i, data[i-1].range);
        set("input_spellsAmmo" + i, data[i-1].ammo);
        set("input_spellsUsed" + i, data[i-1].used);
    }
}

function setFeatures(data){
    var str = data.split("|");
    str.pop(); // last element is ""

    var j=1, value;
    while(str.length != 0){
        set("input_featAndTraits" + 1 + j, getOne(str));
        set("input_featAndTraits" + 2 + j, getOne(str));
        j++;
    }
}

function setProficiency(data){
    var str = data.split("|");
    str.pop(); // last element is ""

    var j=1;
    while(str.length != 0){
        set("input_profAndLang" + j, getOne(str));
        j++;
    }
}

function setEquips(data){
    var str = data.infos;
    str = str.split("|");
    str.pop();

    set("input_equipamentC", data.c)
    set("input_equipamentS", data.s)
    set("input_equipamentE", data.e)
    set("input_equipamentG", data.g)
    set("input_equipamentP", data.p)

    setEquipInfos(str);
}

function setEquipInfos(data){
    var j = 1;
    while(data.length != 0){
        set("input_equipamentInfo" + 1 + j, getOne(data));
        set("input_equipamentInfo" + 2 + j, getOne(data));
        j++;
    }
}