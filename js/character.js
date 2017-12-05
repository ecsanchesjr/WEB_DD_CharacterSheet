verifySession();

$(document).ready(function () {

    if (getCookie("load") == "false") {
        document.getElementsByName("input_charPlayer")[0].value = getCookie("userName");
        document.getElementsByName("input_charPlayer")[0].disabled = true;

        $("#save").show();
    } else {
        $.post("../controller/characterController.php",
            {
                actionTag: "load",
                charName: getCookie("charName")
            },
            function (data, status) {

                $("#update").show();

                setAllData(JSON.parse(data));
                toggleFields(true);
            });
    }

    $("#save").click(function () {
        $("#form-send").click();
        if(getCookie("update") == "true"){
            toggleFields(true);
            $("#save").hide();
            $("#update").show();
        }
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

    $("#update").click(function(){
        toggleFields(false);
        setCookie("update", "true", 5);
        $("#update").hide();
        $("#save").show();
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

function clearFields(){
    var elements = document.getElementsByTagName("input");
    
        for(i=0; i<elements.length; i++){
            elements[i].value = "";
        }
}

function toggleFields(block){
    var elements = document.getElementsByTagName("input");
    
    if(block == true){
        for(i=0; i<elements.length; i++){
            elements[i].disabled = true;
        }
    }else{
        for(i=0; i<elements.length; i++){
            elements[i].disabled = false;
        }
    }
}