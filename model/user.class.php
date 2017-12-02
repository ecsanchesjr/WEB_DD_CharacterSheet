<?php 
class User{
    private $username;
    private $password;
    private $email;

    public function setUsername($user){
        $this->username = $user;
    }   
    public function setPassword($pass){
        $this->password = $pass;
    }
    public function setEmail($email){
        $this->email = $email;
    }

    public function getUsername(){
        return ($this->username);
    }
    public function getPassword(){
        return ($this->password);
    }
    public function getEmail(){
        return ($this->email);
    }

    public function validateUser(){

        require_once("DBCon.php");

        $db = startCon();

        $query = $db->prepare("SELECT * FROM `web`.`Player` WHERE `player_login` = :login;");
        $query->bindParam(":login", $this->username);
        $query->execute();

        return($query->fetchAll());
    }

    public function createUser(){
        
        require_once("DBCon.php");
        
        $db = startCon();
        $query = $db->prepare("INSERT INTO `web`.`Player` (`player_login`, `player_email`, `player_pwd`) VALUES (:login, :email, :pass);");
        
        $query->bindParam(":login", $this->username);
        $query->bindParam(":email", $this->email);
        $query->bindParam(":pass", $this->password);
        
        return($query->execute());
    }
    
    
    public function uniqueUser(){
        require_once("DBCon.php");

        $db = startCon();
        $query = $db->prepare("SELECT * FROM `web`.`Player` WHERE `player_login` = :login;");
        $query->bindParam(":login", $this->username);

        $query->execute();

        return($query->rowCount()==0);
    }

    public function uniqueEmail(){
        require_once("DBCon.php");

        $db = startCon();
        $query = $db->prepare("SELECT * FROM `web`.`Player` WHERE `player_email`=:email;");
        $query->bindParam(":email", $this->email);

        $query->execute();

        return($query->rowCount()==0);
    }
}

?>