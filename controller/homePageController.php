<?php
    require_once("../model/user.class.php");
    require_once("../model/Character.class.php");

    session_start();

    switch($_POST['actionTag']){
        case 'load':
            $char = new Character();

            $result = $char->getAllCharsPlayer($_SESSION['userLogin']);
            
            while($row = $result->fetch()){
                addEntry($row['char_name'], $row['char_level']);
            }
        break;

        case 'delete':
            
            $char = new Character();
            
            echo $char->deleteChar($_POST['charName'], $_SESSION['userLogin']);

        break;
    }

    function addEntry($name, $level){
        echo "<label>$name</label>
        <label>Lv $level</label>
        <button id='view!$name'>View</button>
        <button id='delete!$name'>Delete</button>";
    }
?>