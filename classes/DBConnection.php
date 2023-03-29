<?php
if(!defined('DB_SERVER')){
    require_once("../initialize.php");
}
class DBConnection{

    public $host = "localhost";
    public $username = "root";
    public $password = "";
    public $database = "scheduler_db_secured";
    
    public $conn;
    
    public function __construct(){

        if (!isset($this->conn)) {
            
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
            
            if (!$this->conn) {
                echo 'Cannot connect to database server';
                exit;
            }            
        }    
        
    }
    public function __destruct(){
        $this->conn->close();
    }
}
?>