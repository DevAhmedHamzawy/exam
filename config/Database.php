<?php 

class Database{


    // DB Params
    private $host;
    private $db_name;
    private $username;
    private $password;
    private $conn;

    public function __construct($host, $db_name, $username, $password)
    {
        $this->host = $host;
        $this->db_name = $db_name;
        $this->username = $username;
        $this->password = $password;
    }

    // DB Connect
    public function connect()
    {
        $this->conn = null;

        try{
            $this->conn = new PDO('mysql:host='.$this->host, $this->username , $this->password);   
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }catch(PDOException $e){
        echo 'Connection Error: '.$e->getMessage();   
        }

        return $this->conn;
    }

    // Check If Database Exists Or Create A New One
    public function checkDatabaseOrCreate($database_name)
    {
        $sql = "CREATE DATABASE IF NOT EXISTS ".$database_name;
        $this->conn->exec($sql);
        $sql = "use ".$database_name;
        $this->conn->exec($sql);
    }

    
}






?>