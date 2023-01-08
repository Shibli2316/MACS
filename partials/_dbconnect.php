<?php

// Variables for the connection
$server = "localhost";
$user = "root";
$pass = "";
$db = "macs";

// Making the connection with the database
$conn = mysqli_connect($server, $user, $pass, $db);

// Checiking the connection
if(!$conn){
    echo "Error while connecting with the database". mysqli_connect_error();
}
?>