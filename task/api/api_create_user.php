<?php
   /* header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    //récupération du json
    $data = json_decode(file_get_contents("php://input")); */
    $data = array(
        'name_user' => "mithridate",
        'first_name_user' => "mathieu",
        'login_user' => "mmathieu",
        'mdp_user' => "test"
        );
    
    $name = $data['name_user'];
    $first_name = $data['first_name_user'];
    $login = $data['login_user'];
    $mdp = $data['mdp_user'];
    $mdp = md5($mdp);
    echo "<p>$name</p>";
    echo "<p>$first_name</p>";
    echo "<p>$login</p>";
    echo "<p>$mdp</p>";  
?>