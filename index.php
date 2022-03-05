<?php

// Includes file is just a php document that only has a script in it, which will run. But the user won't be able to see that.

// Classes folder will only contain the classes which will be necessary for our project.

// And as we know, index will be the home page of our project.

session_start();
// Starting a session at the start of our homepage. Needed to display the messages.
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup and Login</title>
    <style>
      right-alignment{
        text-align: right;
      }
    </style>
</head>
<body>
    <h1>Login</h1>
    <h4>Don't have an account yet? Sign up.</h4><br>
    <div>
    <form method="post" action="includes/login.php">
        <label><b>Username:
        </b>
        </label>
        <input type="text" name="username" id="username" placeholder="Username">
        <br><br>
        <label><b>Password:
        </b>
        </label>
        <input type="Password" name="password" id="password" placeholder="Password">
        <br><br>
        <button type="submit" name="submit">Login</button>
        <br><br>
        <br><br>
    </form>
</div>

<h1>Sign Up</h1>
<h4>Create your new account here.</h4><br>
<div>
<form method="post" action="includes/signup.php">
    <label><b>Username:
    </b>
    </label>
    <input type="text" name="username" placeholder="Username">
    <br><br>
    <label><b>Password:
    </b>
    </label>
    <input type="Password" name="password" placeholder="Password">
    <br><br>
    <label><b>Confirm Password:
    </b>
    </label>
    <input type="Password" name="password_repeat" placeholder="Confirm Password">
    <br><br>
    <label><b>Email:
    </b>
    </label>
    <input type="text" name="email" placeholder="E-mail">
    <br><br>
    <button type="submit" name="submit">Sign Up</button>
    <br><br>
    <br><br>
</form>
</div>

</body>
</html>
