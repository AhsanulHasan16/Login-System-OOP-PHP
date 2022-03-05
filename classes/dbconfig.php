<?php

// This file will contain the connection to the database.

class Dbconfig{

  protected function connect(){         // Method to connect to the database. Protected because signup needs to access this one.

    try {

      $username = "root";
      $password = "";
      $db = new PDO('mysql:host=localhost;dbname=login', $username, $password);
      return $db;

    } catch (PDOException $e) {

      print "Error!: " . $e->getMessage();
      die();

    }

  }
}
