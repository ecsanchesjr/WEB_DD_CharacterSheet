<?php 
    function startCon(){
        $DB_HOST = "localhost";
        $DB_USER = "root";
        $DB_PASS = "";
        $DB_NAME = "web";
        try{
            $DB_CON = new PDO("mysql:host{$DB_HOST};dbname={$DB_NAME}", $DB_USER, $DB_PASS, 
            array(PDO::ATTR_PERSISTENT => true));
            return($DB_CON);
        }
        catch(PDOException $e){
            echo $e->getMessage();
            die();
            return(false);
        }
    }
?>