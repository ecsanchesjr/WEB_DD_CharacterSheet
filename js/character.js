
$(document).ready(function () {
    if (getCookie("load") == "false") {
        document.getElementsByName("input_charPlayer")[0].value = getCookie("userName");
        document.getElementsByName("input_charPlayer")[0].disabled = true;


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
            var values = JSON.parse(data);
            console.log(values);
        });
}