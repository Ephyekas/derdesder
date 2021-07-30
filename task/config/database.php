<?php 

    class Database {

        private $host = "localhost";
        private $database_name = "task1";
        private $username = "root";
        private $password = "";

        public $conn;

        public function getConnection(){
            $this->conn = null;
            try{
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database_name, $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                $this->conn->exec("set names utf8");
            }catch(PDOException $e){
                echo "Database could not be connected: " . $e->getMessage();
            }
            return $this->conn;
        }
    }  
?>