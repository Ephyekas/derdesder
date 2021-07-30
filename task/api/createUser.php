<?php

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    
    include '../config/database.php';
    include '../classes/user.php';

    $database = new Database();
    $db = $database->getConnection();

    $item = new User($db);

    $data = json_decode(file_get_contents("php://input"));
    var_dump($data);
    $item->name_user = $data->name_user;
    $item->first_name_user = $data->first_name_user;
    $item->login_user = $data->login_user;
    $item->mdp_user = $data-> mdp_user;

    $name_user = $data->name_user;
    $first_name_user = $data->first_name_user;
    $login_user = $data->login_user;
    $mdp_user = $data-> mdp_user;
    
    $item->createUser($name_user,$first_name_user,$login_user,$mdp_user);
    
?>