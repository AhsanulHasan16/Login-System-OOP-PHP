<?php

session_start();
session_unset();
session_destroy();

header('location: ../index.php?error=none');

// When logout is selected, session is unset and destroyed and user is returned to the home page.
