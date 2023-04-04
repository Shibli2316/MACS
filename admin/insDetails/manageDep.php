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
    <title>Manage Records</title>
</head>
<body>

<?php
    // Navbar is required before moving forward
    require "../../partials/_nav.php";
?>



<div class="container">
    <h1>Write something about the department</h1>
</div>
<div class="container">

    <form action="manageDep.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Name of the department</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="about" class="form-label">About</label>
            <textarea class="form-control" id="about" name="about" cols="30" rows="10"> </textarea>
        </div>
        <div class="mb-3">
            <label for="fac" class="form-label">Faculty of</label>
            <input type="text" class="form-control" id="fac" name="fac">
        </div>
        <div class="mb-3">
            <label for="sub" class="form-label">subject</label>
            <input type="text" class="form-control" id="sub" name="sub">
        </div>
        <div class="mb-3">
            <label for="img" class="form-label">Image</label>
            <input type="file" name="upload" id="img" class="form-control">
        </div>
        <div class="mb-3">
            <label for="nStud" class="form-label">No of Students</label>
            <input type="text" name="nStud" id="nStud" class="form-control">
        </div>
        <div class="mb-3">
            <label for="nTeac" class="form-label">No of Teachers</label>
            <input type="text" name="nTeac" id="nTeac" class="form-control">
        </div>
        <div class="mb-3">
            <label for="nCour" class="form-label">No of courses</label>
            <input type="text" name="nCour" id="nCour" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
</body>
</html>

<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
    require '../../partials/_dbconnectAdmin.php';

    $filename = $_FILES["upload"]["name"];
    $tempname = $_FILES["upload"]["tmp_name"];

    $folder = "../images/".$filename;
    move_uploaded_file($tempname, $folder);

        $name = $_POST['name'];
        $about = $_POST['about'];
        $fac = $_POST['fac'];
        $sub = $_POST['sub'];
        $nStud = $_POST['nStud'];
        $nTeac = $_POST['nTeac'];
        $nCour = $_POST['nCour'];
    
        $sql = "INSERT INTO `department` (`name`, `facOf`, `noOfStud`, `subject`, `noOfTeacher`, `noOfCourse`, `imgPath`, `about`) VALUES ('$name', '$fac', '$nStud', '$sub', '$nTeac', '$nCour', '$folder', '$about');";

        $run = mysqli_query($conn, $sql);
        if (!$run) {
            echo "Error while updating records";
        } else {
            echo "<script>alert('Your records has been updated successfully!!!')</script>";
        }
}

?>