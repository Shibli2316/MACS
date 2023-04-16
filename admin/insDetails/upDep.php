<?php


// Assigning usernme of the logged in user into a variable for easy access.

// Including the connection file of the database.
include "../../partials/_dbconnectAdmin.php"
?>

<?php
include '../includes/header.php';
$user = $_SESSION['username'];
$id=$_GET['id'];

$sql = "SELECT * FROM `department` WHERE id = '$id'";
$result = mysqli_query($conn, $sql);

// Storing it into an associative array called details.
$details = mysqli_fetch_assoc($result);

?>


<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Update department</h1>

<div class="container">

    <form action="upDep.php?id=<?=$id?>" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Name of the department</label>
            <input value='<?=$details['name']?>' type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="about" class="form-label">About</label>
            <textarea value='<?=$details['about']?>' class="form-control" id="about" name="about" cols="30" rows="10"> </textarea>
        </div>
        <div class="mb-3">
            <label for="fac" class="form-label">Faculty of</label>
            <input value='<?=$details['facOf']?>' type="text" class="form-control" id="fac" name="fac">
        </div>
        <div class="mb-3">
            <label for="sub" class="form-label">subject</label>
            <input value='<?=$details['subject']?>' type="text" class="form-control" id="sub" name="sub">
        </div>
        <div class="mb-3">
            <label for="img" class="form-label">Image</label>
            <input value='<?=$details['imgPath']?>' type="file" name="upload" id="img" class="form-control">
        </div>
        <div class="mb-3">
            <label for="nStud" class="form-label">No of Students</label>
            <input value='<?=$details['noOfStud']?>' type="text" name="nStud" id="nStud" class="form-control">
        </div>
        <div class="mb-3">
            <label for="nTeac" class="form-label">No of Teachers</label>
            <input value='<?=$details['noOfTeacher']?>' type="text" name="nTeac" id="nTeac" class="form-control">
        </div>
        <div class="mb-3">
            <label for="nCour" class="form-label">No of courses</label>
            <input value='<?=$details['noOfCourse']?>' type="text" name="nCour" id="nCour" class="form-control">
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
    
        $sql = "UPDATE `department` SET `name`='$name', `facOf`='$fac', `noOfStud`='$nStud', `subject`='$sub', `noOfTeacher`='$nTeac', `noOfCourse`='$nCour', `imgPath`='$folder', `about`='$about' WHERE id='$id';";

        $run = mysqli_query($conn, $sql);
        if (!$run) {
            echo "Error while updating records";
        } else {
            echo "<script>alert('Your records has been updated successfully!!!')</script>";
            ?>

            <!-- Redirecting to profile page -->
                        <meta http-equiv="refresh" content="0; url = depList.php" />
                <?php
                    }
                }
                ?>