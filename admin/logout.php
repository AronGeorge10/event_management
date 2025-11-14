<?php
session_start();

session_unset(); // Unset all session variables
session_destroy(); //Destroy current session

header('Location: login.php'); // Move to login page
exit();
?>