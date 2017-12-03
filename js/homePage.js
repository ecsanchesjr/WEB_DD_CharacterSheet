
$(document).ready(function () {
    loadPage();
});

function loadPage() {
    $.post("../controller/homePageController.php",
        {
            actionTag: 'load'
        },
        function (data, status) {
            $("#main-div").html(data);

            $("button").click(function (event) {
                var id = event.target.id;
                if (~id.indexOf("view!")) {
                    id = id.replace("view!", "");
                    openCharPage(id);
                } else if (~id.indexOf("delete!")) {
                    id = id.replace("delete!", "");
                    $("#nameChar").html(id);
                    $("#ex").modal({
                        showClose: false
                    });
                } else if (~id.indexOf("newChar")) {
                    openCreateCharPage();
                } else if (~id.indexOf("yes")) {
                    deleteChar($("#nameChar").html());
                    $.modal.close();
                } else if (~id.indexOf("no")) {
                    $.modal.close();
                }
            });
        });
}

function openCharPage(name) {
    setCookie("load", "true", 5);
    window.location.href = "../view/charPage.html";
}

function openCreateCharPage() {
    setCookie("load", "false", 5);
    window.location.href = "../view/charPage.html";
}

function deleteChar(name) {
    $.post("../controller/homePageController.php",
        {
            actionTag: 'delete',
            charName: name
        },
        function (data, status) {
            loadPage();
        });
}