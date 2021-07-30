<?php
    //méthode création d'une catégorie de tâche
    function create_cat_task()

    //localhost://task/api/api_create_task_cat.php 
    {
        //test des super globales $_POST['name_cat']
        if(isset($_POST['name_cat']))
        {
        $name = $_POST['name_cat'];
        try
                {
                    //connexion à la bdd
                    include('../utils/connect.php');
                    //enregistrer au format UTF 8 optionnel en fonction de votre version de php
                    $bdd->exec("set names utf8");
                    //requête insert ajout d'une catégorie de tâche
                    $bdd->query('insert into cat(name_cat)values("'.$name.'")');
                    
                }
                catch(Exception $e)
                {
                //affichage d'une exception en cas d’erreur
                die('Erreur : '.$e->getMessage());
                }
        }
    }
    //appel de la fonction    
    create_cat_task();
?>