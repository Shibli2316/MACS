<?php

// The session is continued in this page
session_start();

// The session variables if any are unset and turned into default values with the help of unset variable
session_unset();

// The session is destroyed and the user is finally logged out
session_destroy();

// The user is redirected to the home page
header("location: ../");
exit;
?>