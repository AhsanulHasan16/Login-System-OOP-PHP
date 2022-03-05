<?php

// In this document, all the database related queries will take place.

class Signup extends Dbconfig{

  // In this class, all the methods will be built to query the database. And to access the connection we need to extend Dbconfig.

  // Method to check the user by the given data.

  protected function setUser($username, $password, $email){           // setUser function is to insert a user in the database.

      $stmt = $this->connect()->prepare('INSERT INTO users (users_username, users_password, users_email) VALUES (?, ?, ?);');
      // Using the way of ??? makes it more secure for our databse. 

      // Now time to implement some security features for our database.
      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);     // Hashing the password before executing the database query.

      if(!$stmt->execute(array($username, $hashedPassword, $email))){

        $stmt = null;
        header('location: ../index.php?error=stmtfailed');    // Redirecting to the homepage if the query execution failed for some reason.
        exit();
      }

      $stmt = null;         // Just ending off the statement after everything.
  }

  protected function checkUser($username, $email){

    $stmt = $this->connect()->prepare('SELECT users_username FROM users WHERE users_username = ? OR users_email = ?;');

    if(!$stmt->execute(array($username, $email))){

      $stmt = null;
      header('location: ../index.php?error=stmtfailed');    // Redirecting to the homepage if the query execution failed for some reason.
      exit();

    }

    $InfoCheck;
    if($stmt->rowCount() > 0){

      // Meaning the username or email is already present in the database.
      $InfoCheck = false;

    } else {

      $InfoCheck = true;

    }
    return $InfoCheck;
  }

}
