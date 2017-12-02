<?php 
    require_once("../model/user.class.php");

    if(isset($_POST["login"]) && isset($_POST["email"]) && isset($_POST["passwd"])){
        $user = new User;

        $user->setUsername($_POST["login"]);
        $user->setEmail($_POST["email"]);
        $user->setPassword($_POST["passwd"]);

        echo $user->createUser();
    }else{
        echo "WTF";
    }
?>