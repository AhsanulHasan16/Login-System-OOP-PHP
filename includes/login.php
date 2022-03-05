<?php

  // Checking whether the submit button was clicked or not.

  if(isset($_POST['submit'])){

    // If the submit button was clicked, then grab the data.

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Instantiating the SignupController class.
    // Including all the files that are needed for signup to work properly.
    // Need to order the include files properly.

    include "../classes/dbconfig.php";
    include "../classes/login_class.php";
    include "../classes/loginController_class.php";

    $login = new LoginController($username, $password);

    // Running error handlers and user signup.

    $login->loginUser();            // The error handling method from SignupController which also has the setUser method executed in it.


    // Redirecting to the home page.

    header('location: ../index.php?error=none');

  }
