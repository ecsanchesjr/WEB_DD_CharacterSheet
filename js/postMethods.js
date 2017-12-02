function loginPost() {
    $.post("controller/loginController.php",
        {
            login: $("#input_login").val(),
            passwd: $("#input_pwd").val()
        },
        function (data, status) {
            console.log(data);
            if (data == "1") {
                location.href = "view/homePage.html";
            } else {
                if (data == "0") {
                    document.getElementById("result").innerHTML = "User not found!";
                } else {
                    document.getElementById("result").innerHTML = "Invalid password";
                }
                $("#ex").modal();
            }
        });
}

function registerPost() {
    var login, email, passwd1, passwd2;

    login = $("#input_login").val();
    email = $("#input_email").val();
    passwd1 = $("#input_pwd1").val();
    passwd2 = $("#input_pwd2").val();

    if (passwd1 === passwd2) {
        $.post("../controller/registerController.php",
            {
                login: login,
                email: email,
                passwd: passwd2
            },
            function (data, status) {
                var error = "";
                if (~data.indexOf("1")) {
                    document.getElementById("result").innerHTML = "Register success.";
                    $('#ex').on($.modal.BEFORE_CLOSE, function (event, modal) {
                        window.location.href = "../index.html";
                    });
                } else {
                    if (~data.indexOf("2")) {
                        error += "User already exists!\n ";
                    }
                    if (~data.indexOf("3")) {
                        error += "Email already exists!\n ";
                    }
                    if (~data.indexOf("0")) {
                        error += "FAILED!";
                    }
                    document.getElementById("result").innerHTML = error;
                }
                $("#ex").modal();
            });
} else {
    document.getElementById("result").innerHTML = "Passwords not match!";
    $('#ex').modal();
    $("#input_pwd1").css('background-color', '#FFDBDB');
    $("#input_pwd2").css('background-color', '#FFDBDB');
}
}