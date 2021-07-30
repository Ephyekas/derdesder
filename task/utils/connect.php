<?php
    //connexion à la bdd
    $bdd = new PDO('mysql:host=localhost;dbname=task', 'root','', 
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
?>
