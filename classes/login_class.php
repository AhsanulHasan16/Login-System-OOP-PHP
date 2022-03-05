<?php

// In this document, all the database related queries will take place.

class Login extends Dbconfig{

  // In this class, all the methods will be built to query the database. And to access the connection we need to extend Dbconfig.

  // Method to check the user by the given data.

  protected function getUser($username, $password){           // setUser function is to insert a user in the database.

      $stmt = $this->connect()->prepare('SELECT users_password FROM users WHERE users_username = ? OR users_email = ?;');
      // Using the way of ??? makes it more secure for our databse.

      if(!$stmt->execute(array($username, $password))){

        $stmt = null;
        header('location: ../index.php?error=stmtfailed');    // Redirecting to the homepage if the query execution failed for some reason.
        exit();
      }

      if($stmt->rowCount() == 0){

        $stmt = null;
        header('location: ../index.php?error=stmtfailed');    // Redirecting to the homepage if the there are no rows meaning no data in the database.
        exit();

      }

        $hashedPassword = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPassword = password_verify($password, $hashedPassword[0]["users_password"]);
        // Because hashedPassword gave the data in an associative array so to get the password from the database we had to write it this way.
        // [0] is the first index. And ["users_password"] is the column where the passwords are stored in the database.

        if($checkPassword == false){

          $stmt = null;
          header('location: ../index.php?error=wrongpassword');    // Redirecting to the homepage if the there are no rows meaning no data in the database.
          exit();

        } elseif($checkPassword == true){

          $stmt = $this->connect()->prepare('SELECT * FROM users WHERE users_username = ? OR users_email = ? AND users_password = ?;');

          if(!$stmt->execute(array($username, $username, $password))){

            $stmt = null;
            header('location: ../index.php?error=stmtfailed');    // Redirecting to the homepage if the query execution failed for some reason.
            exit();
          }

          if($stmt->rowCount() == 0){

            $stmt = null;
            header('location: ../index.php?error=stmtfailed');    // Redirecting to the homepage if the there are no rows meaning no data in the database.
            exit();

          }

          $user = $stmt -> fetchAll(PDO::FETCH_ASSOC);

          session_start();
          $_SESSION['userid'] = $user[0]['users_id'];
          $_SESSION['userusername'] = $user[0]['users_username'];

          $stmt = null;

        }

      $stmt = null;         // Just ending off the statement after everything.
  }

}
