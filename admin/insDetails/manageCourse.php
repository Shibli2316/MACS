
<?php
// The session for the logged in user is relayed to this page using the session start tag. In case the session is not started it will start the session.


// Assigning usernme of the logged in user into a variable for easy access.

// Including the connection file of the database.
include "../../partials/_dbconnect.php"
?>

<?php
include '../includes/header.php';
$user = $_SESSION['username'];
?>


<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Add Courses</h1>

<div class="container">

    <form action="manageCourse.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Name of the department</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="fac" class="form-label">Name of Course</label>
            <input type="text" class="form-control" id="fac" name="fac">
        </div>
        <div class="mb-3">
            <label for="about" class="form-label">About</label>
            <textarea class="form-control" id="about" name="about" cols="30" rows="10"> </textarea>
        </div>
        <div class="mb-3">
            <label for="nStud" class="form-label">No of Students</label>
            <input type="text" name="nStud" id="nStud" class="form-control">
        </div>
        <div class="mb-3">
            <label for="nTeac" class="form-label">Teachers</label>
            <input type="text" name="nTeac" id="nTeac" class="form-control">
        </div>
        <div class="mb-3">
            <label for="nCour" class="form-label">Courses Id</label>
            <input type="text" name="nCour" id="nCour" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
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
        $fac = $_POST['fac'];
        $nStud = $_POST['nStud'];
        $nTeac = $_POST['nTeac'];
        $nCour = $_POST['nCour'];
    
        $sql = "INSERT INTO `courses` (`nameD`, `nameC`, `about`, `noOfStud`, `teacher`, `cid`) VALUES ('$name', '$fac', '$about', '$nStud', '$nTeac', '$nCour');";

        $run = mysqli_query($conn, $sql);
        if (!$run) {
            echo "Error while updating records";
        } else {
            echo "<script>alert('Your records has been updated successfully!!!')</script>";
            ?>

            <!-- Redirecting to profile page -->
                        <meta http-equiv="refresh" content="0; url = courseList.php" />
                <?php
                    }
                }
                ?>