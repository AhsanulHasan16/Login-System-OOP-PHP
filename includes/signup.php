<?php

  // Checking whether the submit button was clicked or not.

  if(isset($_POST['submit'])){

    // If the submit button was clicked, then grab the data.

    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_repeat = $_POST['password_repeat'];
    $email = $_POST['email'];

    // Instantiating the SignupController class.
    // Including all the files that are needed for signup to work properly.
    // Need to order the include files properly.

    include "../classes/dbconfig.php";
    include "../classes/signup_class.php";
    include "../classes/SignupController_class.php";

    $signup = new SignupController($username, $password, $password_repeat, $email);

    // Running error handlers and user signup.

    $signup->signupUser();            // The error handling method from SignupController which also has the setUser method executed in it.


    // Redirecting to the home page.

    header('location: ../index.php?error=none');

  }
