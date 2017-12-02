function get(name) {
    var element = document.getElementsByName(name)[0];

    if (element.value == "") {
        if (element.type == "number") {
            return ("0");
        }
    }
    return (element.value);
}

function submit() {
    $.post("../controller/characterController.php",
        {
            data: getJson()
        }, function (data, status) {
            console.log(data);
        });
}

function getAttacks() {
    var rows = 7; // rows total
    var obj = [];

    for (i = 1; i <= rows; i++) {
        if (!(get("input_spellsName" + i) == "")) {
            obj.push({
                name: get("input_spellsName" + i),
                attack: get("input_spellsAttack" + i),
                damage: get("input_spellsDamage" + i),
                range: get("input_spellsRange" + i),
                ammo: get("input_spellsAmmo" + i),
                used: get("input_spellsUsed" + i)
            });
        }
    }
    return (obj);
}

function getFeatures() {
    var rows = 5, colunms = 2;
    var str = "";

    for (i = 1; i <= colunms; i++) {
        for (j = 1; j <= rows; j++) {
            var contain = get("input_featAndTraits" + i + j);
            if (contain != "") {
                str += contain + "|";
            }
        }
    }
    return (str);
}

function getProficiencies() {
    var rows = 5;
    var str;

    for (j = 1; j <= rows; j++) {
        var contain = get("input_profAndLang" + j);
        if (contain != "") {
            str += contain + "|";
        }
    }
    return (str);
}

function getEquipInfos() {
    var rows = 8, colunms = 2;
    var str;

    for (i = 1; i <= colunms; i++) {
        for (j = 1; j <= rows; j++) {
            var contain = get("input_equipamentInfo" + i + j);
            if (contain != "") {
                str += contain + "|";
            }
        }
    }
    return (str);
}

function getJson() {
    var json = {
        tag: 0,
        charName: get("input_charNome"),
        charLevel: get("input_charLevel"),
        charRace: get("input_charRace"),
        charExp: get("input_charExp"),
        charBack: get("input_charBack"),
        charAlign: get("input_charAlign"),
        charPlayer: get("input_charPlayer"),
        charGroup: get("input_charGroup"),
        //attributes
        atribStr: get("input_atribStr"),
        atribDex: get("input_atribDex"),
        atribCon: get("input_atribCon"),
        atribInt: get("input_atribInt"),
        atribWis: get("input_atribWis"),
        atribCha: get("input_atribCha"),
        //??
        inspiration: get("input_insp"),
        profBonus: get("input_profBonus"),
        passivePerc: get("input_passivePerc"),
        //saving throws
        savingStr: get("input_savStr"),
        savingDex: get("input_savDex"),
        savingCon: get("input_savCon"),
        savingInt: get("input_savInt"),
        savingWis: get("input_savWis"),
        savingCha: get("input_savCha"),
        //skills
        skillAcrobatics: get("input_skillAcrobatics"),
        skillAnimalHand: get("input_skillAnimalHandling"),
        skillArcana: get("input_skillArcana"),
        skillAthletics: get("input_skillAthletics"),
        skillDeception: get("input_skillDeception"),
        skillHistory: get("input_skillHistory"),
        skillInsight: get("input_skillInsight"),
        skillIntimidation: get("input_skillIntimidation"),
        skillInvestigation: get("input_skillInvestigation"),
        skillMedicine: get("input_skillMedicine"),
        skillNature: get("input_skillNature"),
        skillPerception: get("input_skillPerception"),
        skillPerformance: get("input_skillPerformance"),
        skillPersuasion: get("input_skillPersuasion"),
        skillReligion: get("input_skillReligion"),
        skillSleightHand: get("input_skillSleightOfHand"),
        skillStealth: get("input_skillStealth"),
        skillSurvival: get("input_skillSurvival"),
        //Status
        statusArmor: get("input_armor"),
        statusMaxHp: get("input_maxHp"),
        statusTempHp: get("input_tempHp"),
        statusCurrentHp: get("input_currentHp"),
        statusInitiate: get("input_statusInitiate"),
        statusSpeed: get("input_statusSpeed"),
        statusVision: get("input_statusVision"),
        // Attacks And SpellCasting
        atkAndSpells: getAttacks(),
        // Features and Traits
        featAndTraits: getFeatures(),
        // Proficiencies and Languages
        profAndLang: getProficiencies(),
        // Equipament
        equipamentInfo: getEquipInfos(),
        equipC: get("input_equipamentC"),
        equipS: get("input_equipamentS"),
        equipE: get("input_equipamentE"),
        equipG: get("input_equipamentG"),
        equipP: get("input_equipamentP"),
    }
    return (json);
}