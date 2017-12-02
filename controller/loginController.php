<?php
    require_once("../model/user.class.php");

    if(isset($_POST["login"]) && isset($_POST["passwd"])){
        $user = new User;

        $user->setUsername($_POST["login"]);
        $user->setPassword($_POST["passwd"]);

        $result = $user->validateUser();
        
        if($result==0){
            echo "0";
        }else{
            if($result[0]["player_pwd"] == $user->getPassword()){
                echo "1";
            }else{
                echo "2";
            }
        }
    }else{
        echo "MY GOD";
    }
?>