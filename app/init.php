<?php

  error_reporting(E_ALL ^ E_NOTICE);

  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');



  include_once '../config/Database.php';
  include_once '../database/Table.php';

  // Instantiate DB & connect
  $database = new Database($_POST['hoster'], $_POST['database_name'], $_POST['username'], $_POST['password']);
  $db = $database->connect();
  $db_name = $database->checkDatabaseOrCreate($_POST['database_name']);

  // Create Required Tables
  $table = new Table('products',$db);
  $table = new Table('categories',$db);

  echo 'done....';