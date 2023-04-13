<?php
// The session for the logged in user is relayed to this page using the session start tag. In case the session is not started it will start the session.
session_start();

// Assigning usernme of the logged in user into a variable for easy access.
$user = $_SESSION['username'];

?>
<?php
include '../includes/header.php';
?>
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Publish Notice</h1>

    <div class="container">

    <form action="notice.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Title of the notice</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="about" class="form-label">Description</label>
            <textarea class="form-control" id="about" name="about" cols="30" rows="10"> </textarea>
        </div>
        <button type="submit" class="btn btn-primary">Publish</button>
    </form>
    </div>
    </div>
<?php
include '../includes/footer.php';
?>
<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
    require '../../partials/_dbconnectAdmin.php';

        $name = $_POST['name'];
        $about = $_POST['about'];

    
        $sql = "INSERT INTO `notice` (`name`, `about`) VALUES ('$name', '$about');";

        $run = mysqli_query($conn, $sql);
        if (!$run) {
            echo "Error while updating records";
        } else {
            echo "<script>alert('Your records has been updated successfully!!!')</script>";
        }
}

?>
