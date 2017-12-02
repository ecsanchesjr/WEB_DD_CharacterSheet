<?
    require_once("../model/User.class.php");

    
    $data = $_POST["charData"];

    //print_r($data);

    foreach($data as $name => $value){
        echo $name;
        if($name == "featAndTraits"){
            print_r($value);
            echo "\n\n\n";
            print_r(explode("|", $value, -1));
        }
    } 


?>