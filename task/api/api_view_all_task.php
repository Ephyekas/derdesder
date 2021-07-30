<?php
//fonction création de la requête et exécution retourne une ArrayList
function view_all_task()

//localhost://task/api/view_all_task.php 
{
    try 
     {   //connexion à la Base de données
         //include('bddConnexion2.php');
        //connexion à la base de données
        $bdd = new PDO('mysql:host=localhost;dbname=task1', 'root','',);
         //requête SQL récupération de toutes les taches non validé (validé validate_task =1)
        $requete = "SELECT * from task WHERE validate_task = 0 '";

        // Exécution de la requête SQL.
        $reponse = $bdd->query($requete);
        //variable $output (Arraylist) contenant le résultat de la requête
        $output = $reponse->fetchAll(PDO::FETCH_ASSOC);
    }
     catch (Exception $e) 
    {
        die('Erreur : ' . $e->getMessage());
    }
    //retourne une Arraylist
    return $output;
}
//fonction encodage du résultat de la requête au format json
function encode_to_json()
{
    $json = json_encode(view_all_task());
    return $json;
}                   
// Print JSON encode of the array.
print_r(encode_to_json());
?>
