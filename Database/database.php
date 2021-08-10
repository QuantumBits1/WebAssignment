<?php
    class Database {
        protected $server = "localhost";
        protected $username = "root";
        protected $password = "root";
        protected $database = "webassigndb";
        protected $port = "3307";

        public $conn;
        public $error;

        function _construct() {
            
        }

        function _destruct() {
            $conn = null;
        }

        protected function checkConnection() {
            return $this->conn;
        }

        function connectDatabase() {
            //$this->conn = mysqli_connect($server, $username, $password, $database, $port);

            // if (!$this->conn) {
            //     //if error occurs
            //     exit('Failed to connect to MySQL: ' . mysqli_connect_error());
            // }
            
            try {
                $conn = new PDO("mysql:host=$this->server;dbname=$this->database;port=$this->port", $this->username, $this->password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
            } catch(PDOException $e) {
                echo $e->getMessage();
            }

        }

        protected function query($query) {
            if(!$this->checkConnection())
                return false;
            
            return mysqli_query($this->conn, $query);
        }

        function execute($sql) {
            $execute = $this->query($sql);
            $entry = mysqli_fetch_assoc($execute);
        }

        function select($sql) {
            
        }
    }
?>