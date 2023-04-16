
<?php
// The session for the logged in user is relayed to this page using the session start tag. In case the session is not started it will start the session.


// Assigning usernme of the logged in user into a variable for easy access.

// Including the connection file of the database.
include "../../partials/_dbconnectAdmin.php"
?>

<?php
include '../includes/header.php';
$user = $_SESSION['username'];

$id= $_GET['id'];

   // Fetching the data of the logged in user.
   $sql = "SELECT * FROM `courses` WHERE id = '$id'";
   $result = mysqli_query($conn, $sql);

   // Storing it into an associative array called details.
   $details = mysqli_fetch_assoc($result);
?>


<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Manage Courses</h1>

<div class="container">

    <form action="upCourse.php?id=<?=$id?>" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Name of the department</label>
            <input value="<?=$details['nameD']?>" type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="fac" class="form-label">Name of Course</label>
            <input value="<?=$details['nameC']?>" type="text" class="form-control" id="fac" name="fac">
        </div>
        <div class="mb-3">
            <label for="about" class="form-label">About</label>
            <textarea value="<?=$details['about']?>" class="form-control" id="about" name="about" cols="30" rows="10"> </textarea>
        </div>
        <div class="mb-3">
            <label for="nStud" class="form-label">No of Students</label>
            <input value="<?=$details['noOfStud']?>" type="text" name="nStud" id="nStud" class="form-control">
        </div>
        <div class="mb-3">
            <label for="nTeac" class="form-label">Teachers</label>
            <input value="<?=$details['teacher']?>" type="text" name="nTeac" id="nTeac" class="form-control">
        </div>
        <div class="mb-3">
            <label for="nCour" class="form-label">Courses Id</label>
            <input value="<?=$details['cid']?>" type="text" name="nCour" id="nCour" class="form-control">
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
    
        $sql = "UPDATE `courses` SET `nameD`='$name', `nameC`='$fac', `about`='$about', `noOfStud`='$nStud', `teacher`='$nTeac', `cid`='$nCour' WHERE id='$id';";

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