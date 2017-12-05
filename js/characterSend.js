function get(name) {
    var element = document.getElementsByName(name)[0];

    if (element.value == "") {
        if (element.type == "number") {
            return ("0");
        }
    }
    return (element.value);
}

function sendInfos() {
    if (getCookie("load") == "true") {
        $.post("../controller/characterController.php",
            {
                actionTag: 'update',
                charName: getCookie("charName"),
                charData: getJson()
            }, function (data, status) {
                $("#result").html("Character updated!");
                $("#confirm").modal({
                    showClose: false
                });
            });
    } else {
        $.post("../controller/characterController.php",
            {
                actionTag: 'send',
                charData: getJson()
            }, function (data, status) {
                $("#result").html("Character created!");
                $("#confirm").modal({
                    showClose: false
                });
            });
    }
}

function getJson() {
    var json = {
        charName: get("input_charNome"),
        charLevel: get("input_charLevel"),
        charRace: get("input_charRace"),
        charExp: get("input_charExp"),
        charBack: get("input_charBack"),
        charAlign: get("input_charAlign"),
        charPlayer: get("input_charPlayer"),
        charGroup: get("input_charGroup"),
        attributes: getAttributes(),
        inspiration: get("input_insp"),
        profBonus: get("input_profBonus"),
        passivePerc: get("input_passivePerc"),
        savingThrows: getSavThrows(),
        skills: getSkills(),
        status: getStatus(),
        atkAndSpells: getAttacks(),
        featAndTraits: getFeatures(),
        profAndLang: getProficiencies(),
        equips: getEquips()
    }
    return (json);
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
    var rows = 9;
    var str = "";

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
    var str = "";

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

function getStatus() {
    var json = {
        armor: get("input_armor"),
        maxHp: get("input_maxHp"),
        tempHp: get("input_tempHp"),
        currentHp: get("input_currentHp"),
        initiate: get("input_statusInitiate"),
        speed: get("input_statusSpeed"),
        vision: get("input_statusVision")
    }
    return (json);
}

function getEquips() {
    var json = {
        info: getEquipInfos(),
        c: get("input_equipamentC"),
        s: get("input_equipamentS"),
        e: get("input_equipamentE"),
        g: get("input_equipamentG"),
        p: get("input_equipamentP")
    }
    return (json);
}

function getSkills() {
    var json = {
        acrobatics: get("input_skillAcrobatics"),
        animalHand: get("input_skillAnimalHandling"),
        arcana: get("input_skillArcana"),
        athletics: get("input_skillAthletics"),
        deception: get("input_skillDeception"),
        history: get("input_skillHistory"),
        insight: get("input_skillInsight"),
        intimidation: get("input_skillIntimidation"),
        investigation: get("input_skillInvestigation"),
        medicine: get("input_skillMedicine"),
        nature: get("input_skillNature"),
        perception: get("input_skillPerception"),
        performance: get("input_skillPerformance"),
        persuasion: get("input_skillPersuasion"),
        religion: get("input_skillReligion"),
        sleightHand: get("input_skillSleightOfHand"),
        stealth: get("input_skillStealth"),
        survival: get("input_skillSurvival")
    }
    return (json);
}

function getSavThrows() {
    var json = {
        strenght: get("input_savStr"),
        dexterity: get("input_savDex"),
        constituition: get("input_savCon"),
        intelligence: get("input_savInt"),
        wisdom: get("input_savWis"),
        charisma: get("input_savCha")
    }
    return (json);
}

function getAttributes() {
    var json = {
        strenght: get("input_atribStr"),
        dexterity: get("input_atribDex"),
        constituition: get("input_atribCon"),
        intelligence: get("input_atribInt"),
        wisdom: get("input_atribWis"),
        charisma: get("input_atribCha")
    }
    return (json);
}