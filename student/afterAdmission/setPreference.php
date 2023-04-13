<?php
// The session for the logged in user is relayed to this page using the session start tag. In case the session is not started it will start the session.
session_start();

// Assigning usernme of the logged in user into a variable for easy access.
$user = $_SESSION['username'];

// Including the connection file of the database.
include "../../partials/_dbconnect.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstap CSS file CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>View Records</title>
</head>
<body>

<?php
    // Navbar is required before moving forward
    require "../../partials/_nav.php";
?>


<div class="container">
    <h1>Displaying students data</h1>
</div>


this will have the preference list and the awarded subject and accepting and rejection of the admission

<form action="setPreference.php" method="post">
    <label for="">Preference 1</label>
    <select name="" id="">
        <option value="0">--SELECT--</option>
        <option value="Maths">Maths</option>
        <option value="Comp">Computer</option>
        <option value="Stats">Stats</option>
        <option value="Phy">Physics</option>
        <option value="Chem">Chemistry</option>
        <option value=""></option>
    </select>
</form>