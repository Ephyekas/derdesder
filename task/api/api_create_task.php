<?php
    //fonction création de tâche
    function create_task()

    //localhost://task/api/api_create_task.php ?id_user=1 (dans le cas où l’id utilisateur égale 1) 
    {
        //test des super globales $_POST['name_task'], $_POST['content_task'], $_POST['date_task']
        //on passe la catégorie de la tache en $_POST['id_cat']
        //et de la super globale $_GET['id_user']
        if(isset($_POST['name_task']) and isset($_POST['content_task']) 
        and $_POST['date_task'] and isset($_POST['id_cat']))
        {
            //variables création d'une tache
            $name = $_POST['name_task'];
            $content = $_POST['content_task'];
            $date = $_POST['date_task'];
            //catégorie de tache
            $id_cat= $_POST['id_cat'];
            //utilisateur
            $id_user = $_GET['id_user'];

            //validation de la tâche par défaut : valide_task = 0
            try
                {   
                    //connexion à la bdd
                    include('../utils/connect.php');
                    //enregistrer au format UTF 8 optionnel en fonction de votre version de php
                    $bdd->exec("set names utf8");
                    //requête insert ajout d'une catégorie de tâche
                    $bdd->query('insert into task(name_task, content_task, date_task, validate_task, id_user, id_cat)
                    values("'.$name.'", "'.$content.'", "'.$date.'", 0, '.$id_user.', '.$id_cat.')');
                    
                }
                catch(Exception $e)
                {
                //affichage d'une exception en cas d’erreur
                die('Erreur : '.$e->getMessage());
                }
        }
    }
    //appel de la fonction
    create_task();    
?>
