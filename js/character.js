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

    $("a").click(function (event) {
        var id = event.target.id;
        if (~id.indexOf("delete")) {
            $("#nameChar").html(getCookie("charName"));
            $("#ex").modal({
                showClose: false
            });
        }

        $("button").click(function (event) {
            var id = event.target.id;
            if (~id.indexOf("yes")) {
                deleteChar($("#nameChar").html());
                $.modal.close();
            } else if (~id.indexOf("no")) {
                $.modal.close();
            }
        });
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

function deleteChar(name) {
    $.post("../controller/characterController.php",
        {
            actionTag: 'delete',
            charName: name
        },
        function (data, status) {
            setCookie("charName", "", 5);
            window.location.href = "homePage.html";
        });
}