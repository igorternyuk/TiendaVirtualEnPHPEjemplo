<?php

class Database{
    private static $instance;
    private $location;
    private $dbName;
    private $username;
    private $password;
    private $connection;
    
    public static function getInstance(){
      if(!self::$instance){
          self::$instance = new self();
          
      }
      return self::$instance;
    }
    
    private function __construct() {
        $this->location = "127.0.0.1";
        $this->dbName = "myshop";
        $this->username = "zenko";
        $this->password = "1319";
        $this->connection = new mysqli($this->location,
                $this->username, $this->password, $this->dbName);
        
        if(mysqli_connect_error()){
            echo "Could not connect to the database ".mysqli_connect_error();
            exit();
        }
        mysqli_set_charset($this->connection, "utf8");
    }
    
    public function getConnection(){
        return $this->connection;
    }
    
    public function closeConnection(){
        $this->connection->close();
        self::$instance = null;
    }    
}

        
     