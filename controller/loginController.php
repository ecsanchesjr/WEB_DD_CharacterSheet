<?php
    require_once("../model/user.class.php");
    
    switch($_POST['tag']){
        case 'login':
            tryLogin();
        break;

        case 'logoff':
            session_start();
            $_SESSION=array();
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000,
                    $params["path"], $params["domain"],
                    $params["secure"], $params["httponly"]
                );
            }
            session_destroy();
        break;

        case 'session':
            session_start();
            if(isset($_SESSION['userLogin'])){
                echo "ok";
            }else{
                echo "not today!";
            }
        break;
    }

    
    function tryLogin(){
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
    }
?>