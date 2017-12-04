verifySession();

$(document).ready(function () {
    if (getCookie("load") == "false") {
        document.getElementsByName("input_charPlayer")[0].value = getCookie("userName");
        document.getElementsByName("input_charPlayer")[0].disabled = true;
    } else {
        $.post("../controller/characterController.php",
            {
                actionTag: "load",
                charName: getCookie("charName")
            },
            function (data, status) {
                setAllData(JSON.parse(data));
            });
    }

    $("#save").click(function () {
        $("#form-send").click();
    });
});

function rollDice() {
    $.post("../controller/characterController.php",
        {
            actionTag: "roll"
        },
        function (data, status) {
            setAttributes(JSON.parse(data));
        });
}