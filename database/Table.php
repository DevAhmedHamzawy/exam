<?php 

  class Table{

    public $name;
    public $conn;


    public function __construct($name, $db)
    {
        // Initialize connection and table name
        $this->name = $name;
        $this->conn = $db;

        // create the table
        $this->create();
    }
 


    public function create()
    {
        if($this->name == 'products'){
            $query = "CREATE TABLE IF NOT EXISTS products (
                id int(11) auto_increment primary key,
                fruit varchar(255) not null,
                weight varchar(255) not null,
                price varchar(255) not null)";
        }

        if($this->name == 'categories')
        {
            $query = "CREATE TABLE IF NOT EXISTS categories (
                id int(11) auto_increment primary key,
                name varchar(255) not null)";
        }

        $this->conn->exec($query);
       

    }


  }