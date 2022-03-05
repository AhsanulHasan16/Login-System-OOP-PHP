<?php

//**If this code looks familiar that is because it is all taken from the SignupController file.**

// This is the controller part for the signup.

// Tasks like changing the database will take place here.

// Also the error handlers will be included in this document.

class LoginController extends Login{

  private $username;
  private $password;

  public function __construct($username, $password){

    $this->username = $username;
    $this->password = $password;

  }

  public function loginUser(){

    if($this->emptyInput() == false){
      header('location: ../index.php?error=emptyinput');
      exit();
    }

    $this->getUser($this->username, $this->password);

  }


  // Error handling starts from here. Let's go!

  // This method is for the error handling of any empty input.

  private function emptyInput(){

    $result;
    if(empty($this->username) || empty($this->password)){

      $result = false;

    } else {

      $result = true;

    }
    return $result;

  }

}
