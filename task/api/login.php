<?php

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Allow-Headers: Access-Control-Allow-Origin, Accept");

    include '../config/database.php';
    include '../classes/user.php';

    $database = new Database();
    $db = $database->getConnection();

    $item = new User($db);

    $data = json_decode(file_get_contents("php://input"));

    $item->login_user = $data->login_user;
    $item->mdp_user = $data-> mdp_user;

    $login_user = $data->login_user;
    $mdp_user = $data-> mdp_user;
    $item->login($login_user,$mdp_user);
    
?>