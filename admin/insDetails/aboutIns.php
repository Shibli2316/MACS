<?php
// The session for the logged in user is relayed to this page using the session start tag. In case the session is not started it will start the session.

// Assigning usernme of the logged in user into a variable for easy access.
include '../includes/header.php';
$user = $_SESSION['username'];

// Including the connection file of the database.
include "../../partials/_dbconnect.php";
?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Write something about the department</h1>


    <div class="container">

        <form action="aboutIns.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="about" class="form-label">About</label>
                <textarea class="form-control" id="about" name="about" cols="30" rows="10">
            </textarea>
            </div>
            <div class="mb-3">
                <label for="detail" class="form-label">Other relevent detail</label>
                <textarea class="form-control" id="detail" name="detail" cols="30" rows="10"> </textarea>
            </div>
            <div class="mb-3">
                <label for="img" class="form-label">Image</label>
                <input type="file" name="upload" id="img" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
<?php
include '../includes/footer.php';
?>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require '../../partials/_dbconnectAdmin.php';

    $filename = $_FILES["upload"]["name"];
    $tempname = $_FILES["upload"]["tmp_name"];

    $folder = "../images/" . $filename;
    move_uploaded_file($tempname, $folder);

    $about = $_POST['about'];
    $detail = $_POST['detail'];
    $sql = "INSERT INTO `details` (`about`, `detail`, `imgpath`) VALUES ('$about', '$detail', '$folder');";

    $run = mysqli_query($conn, $sql);
    if (!$run) {
        echo "Error while updating records";
    } else {
        echo "<script>alert('Your records has been updated successfully!!!')</script>";
    }
}

?>