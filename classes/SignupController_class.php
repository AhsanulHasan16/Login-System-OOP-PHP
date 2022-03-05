<?php

// This is the controller part for the signup.

// Tasks like changing the database will take place here.

// Also the error handlers will be included in this document.

class SignupController extends Signup{

  private $username;
  private $password;
  private $password_repeat;
  private $email;

  public function __construct($username, $password, $password_repeat, $email){

    $this->username = $username;
    $this->password = $password;
    $this->password_repeat = $password_repeat;
    $this->email = $email;

  }

  public function signupUser(){

    if($this->emptyInput() == false){
      header('location: ../index.php?error=emptyinput');
      exit();
    }
    if($this->invalidUsername() == false){
      header('location: ../index.php?error=invalidusername');
      exit();
    }
    // if($this->invalidEmail() == false){
    //   header('location: ../index.php?error=invalidemail');
    //   exit();
    // }
    if($this->passwordMatch() == false){
      header('location: ../index.php?error=passwordnotmatch');
      exit();
    }
    if($this->userMatch() == false){
      header('location: ../index.php?error=usernameoremailalreadytaken');
      exit();
    }

    $this->setUser($this->username, $this->password, $this->email);

  }


  // Error handling starts from here. Let's go!

  // This method is for the error handling of any empty input.

  private function emptyInput(){

    $result;
    if(empty($this->username) || empty($this->password) || empty($this->password_repeat) || empty($this->email)){

      $result = false;

    } else {

      $result = true;

    }
    return $result;

  }

  // This method will check for unvalid characters in a username.

  private function invalidUsername(){

    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $this->username)){

      $result = false;

    } else {

      $result = true;

    }
    return $result;

  }

  // This method will check for invalid email addresses.

  /*private function invalidEmail(){

    $result;
    if(!filter_var($this->email, FILTER_VALIDATE_EMAIL){

      $result = false;

    } else {

      $result = true;

    }
    return $result;

  }*/

  // This method will check if both the passwords typed are matched or not.

  private function passwordMatch(){

    $result;
    if($this->password !== $this->password_repeat){

      $result = false;

    } else {

      $result = true;

    }
    return $result;

  }

  private function userMatch(){

    $result;
    if(!$this->checkUser($this->username, $this->email)){               // Used the checkUser method from the signup class.

      $result = false;

    } else {

      $result = true;

    }
    return $result;

  }

}
