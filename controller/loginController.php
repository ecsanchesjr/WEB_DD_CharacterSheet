<?php
    require_once("../model/user.class.php");

    switch($_POST['tag']){
        case 'login':
            $user = new User;
        
            $user->setUsername($_POST["login"]);
            $user->setPassword($_POST["passwd"]);
        
            unset($_POST['login']);
            unset($_POST['passwd']);
        
            $result = $user->validateUser();

            if(empty($result)){
                echo "0";
            }else{
                if($result[0]["player_pwd"] == $user->getPassword()){
                    session_start();
                    $_SESSION["userLogin"] = $result[0]['player_login'];
    
                    unset($user);
                    unset($result);
                    
                    echo "1";
                }else{
                    echo "2";
                }
            }
        break;

        case 'logoff':
            session_start();
            unset($_SESSION["userLogin"]);
            session_destroy();
            break;
    }
    /* if(isset($_POST["login"]) && isset($_POST["passwd"])){
        $user = new User;

        $user->setUsername($_POST["login"]);
        $user->setPassword($_POST["passwd"]);

        unset($_POST['login']);
        unset($_POST['passwd']);

        $result = $user->validateUser();
        
        if(empty($result)){
            echo "0";
        }else{
            if($result[0]["player_pwd"] == $user->getPassword()){
                session_start();
                $_SESSION["userLogin"] = $result[0]['player_login'];

                unset($user);
                unset($result);
                
                echo "1";
            }else{
                echo "2";
            }
        }
    }else{
        echo "MY GOD";
    } */
?>