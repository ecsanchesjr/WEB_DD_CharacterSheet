
$(document).ready(function () {
    if (getCookie("load") == "false") {
        console.log( getCookie("userName"));
        document.getElementsByName("input_charPlayer")[0].value = getCookie("userName");
        document.getElementsByName("input_charPlayer")[0].disabled = true;
    }
});