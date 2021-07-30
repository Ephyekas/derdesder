//id_cat   Int  Auto_increment  NOT NULL ,         
name_cat Varchar (50) NOT NULL  ,
CONSTRAINT cat_PK PRIMARY KEY (id_cat) 

<?php 
    class Utilisateur
    {   
        /*-----------------------------------------------------
                            attributs :
        -----------------------------------------------------*/
        protected $id_cat;
        protected $nom_cat;

        protected $id_role_cat;
        /*-----------------------------------------------------
                            constucteur :
        -----------------------------------------------------*/        
        public function __construct($nom_cat, $id_cat,$id_role_cat)
        {   $this->nom_cat = $nom_cat;
        
            $this = $id_cat;
    
            $this->id_role_cat =1;            
        }
        /*-----------------------------------------------------
                        Getter and Setter :
        -----------------------------------------------------*/
        //getter id_cat
        public function getIdCat()
        {
            return $this->id_cat;
        }
        //sette
        public function setIdCat($new_id_cat)
        {
            $this->id_cat = $new_id_cat;
        }
        //gette
       
        //getter nom_cat
        public function getNomCat(){
            return $this->nom_cat;
        }
        //setter nom_cat
        public function setNomCat($new_nom_cat){
            $this->nom_cat = $new_nom_cat;
        }
       
        //getter id_role_cat
        public function getId_role(){
            return $this->id_role_cat;
        }
        //setter id_role_cat
        public function setId_role($new_id_role){
            $this->id_role_cat = $new_id_role;
        }
        /*-----------------------------------------------------
                            Fonctions :
        -----------------------------------------------------*/
    
        //fonction affichage des informations
        public function showUser($nom_cat){
            $mess= "Catégorie ajouté à la BDD : <br>'.$nom_cat.' ";
            echo "$mess";
        }             
        //fonction affichage des erreurs 
        public function showError($nom_cat){
            $mess = 'Veuillez saisir un nom de catégorie';
            echo '<div class="alert  alert-warning" role="alert"></div>
                    </div>';
            echo '<script>            
            let divToast = document.querySelector(".alert")
            divToast.innerHTML = "'.$mess.'"
            </script>';            
        }
        //fonction insertion d'un utilisateur en BDD
        public function createCat($nom_cat, $bdd){                                 
            //préparation de la requête SQL
            $req = $bdd->prepare('INSERT INTO cat(id_cat,nom_cat, id_role_cat) 
            VALUES (:id_cat,:nom_user, :id_role_cat)');
            //éxécution de la requête SQL
            $req->execute(array(
            'nom_cat' => iconv("UTF-8", "ISO-8859-1//TRANSLIT", $nom_cat),
            'id_role_cat' => iconv("UTF-8", "ISO-8859-1//TRANSLIT", 1),                                                                   
            ));
            $mess = 'La catégorie : '.$nom_cat.' à était ajouté !!!';
            //echo 'console.log("message erreur")';
            echo '<div class="alert  alert-warning" role="alert"></div>
                    </div>';
            echo '<script>
                console.log("message erreur")
                let divToast = document.querySelector(".alert")            
                divToast.innerHTML = "'.$mess.'"
            </script>';
            //fermeture de la connexion à la bdd
            $req->closeCursor();                          
        }
        public function createCat2($nom_cat, $bdd){                                 
            //connexion à la base de données
            include('utils/connect.php');
            //requete pour stocker le contenu de toute la table
            $reponse = $bdd->query('SELECT * FROM cat WHERE login_user = "'.$nom_cat.'" LIMIT 1');
            //boucle pour parcourir et afficher le contenu de chaque ligne de la table
            while ($donnees = $reponse->fetch())
            {   
                //test si l existe
                if ($nom_cat == $donnees['nom_cat'])
                {   
                    $catExist=1;                                  
                }                                              
            }
            if(isset($catExist)){
                header("Location: createFormateur.php?cpterror"); 
            }
            if(!isset($catExist)){
                //connexion à la base de données
                include('utils/connect.php');
                //préparation de la requête SQL
                $req = $bdd->prepare('INSERT INTO cat(id_cat,nom_cat, id_role_cat) 
                VALUES (:id_cat,:nom_user, :id_role_cat)');
                //éxécution de la requête SQL
                $req->execute(array(
                'nom_cat' => iconv("UTF-8", "ISO-8859-1//TRANSLIT", $nom_cat),
                'id_role_cat' => iconv("UTF-8", "ISO-8859-1//TRANSLIT", 1),                                                                   
                ));
                
                $mss = 'la categorie : '.$nom_cat.'  à était ajouté !!!';
                //echo 'console.log("message erreur")';
                echo '<div class="alert  alert-warning" role="alert"></div>
                    </div>';
                echo '<script>
                console.log("message erreur")
                let divToast = document.querySelector(".alert")             
                divToast.innerHTML = "'.$mss.'"
                </script>';
                //fermeture de la connexion à la bdd
                $req->closeCursor();    
            }                                  
        }
                                
                
    }
?>