<?php
include '../includes/header.php';
?>

<?php

session_start();

// Assigning usernme of the logged in user into a variable for easy access.
$user = $_SESSION['username'];

// Including the connection file of the database.
include "../../partials/_dbconnect.php";
// Since in the table there maybe discreate numbering so to keep the numbering in order a varable is assigned and its value is updated with each itteration of the rows of the database
$sno = 0;

// Fetching students records
$fetching = "SELECT * FROM students;";
$run = mysqli_query($conn, $fetching);
if(!$run){
    echo "error";
}
// Chechking the number of rows the database has and iterating it only if the number of rows are greater than 0
$howManyRows = mysqli_num_rows($run);
if($howManyRows>0){
  while($row = mysqli_fetch_assoc($run)){
    $sno+=1;
}
}

$count = 0;

// Fetching students records
$fetching = "SELECT * FROM verify where accept='yes';";
$run = mysqli_query($conn, $fetching);
if(!$run){
    echo "error";
}
// Chechking the number of rows the database has and iterating it only if the number of rows are greater than 0
$howManyRows = mysqli_num_rows($run);
if($howManyRows>0){
  while($row = mysqli_fetch_assoc($run)){
    $count+=1;
}
}

?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<div class="container text-center card-header my-4">
    <h3>Teacher Dashboard</h3>
</div>
    <div class="container row mx-auto">

        <div class="card text-center col-md-5">
            <div class="card-header">
                Featured
            </div>
            <div class="card-body">
                <h5 class="card-title">Applicants</h5>
                <p class="card-text">The number of students who applied for are.</p>
                <p class="card-text"><?=$sno?></p>
                <a href="viewStudents.php" class="btn btn-primary">View</a>
            </div>
            <div class="card-footer text-muted">
                In total <?=$sno?> applicants
            </div>
        </div>

        <div class="card text-center col-md-5 mx-5">
            <div class="card-header">
                Featured
            </div>
            <div class="card-body">
                <h5 class="card-title">Admitted</h5>
                <p class="card-text">Total number of students who are admitted are <?=$count?>.</p>
                <a href="admitted.php" class="btn btn-primary">View</a>
            </div>
            <div class="card-footer text-muted">
                In total <?=$count?> admissions
            </div>
        </div>

    </div>

</main>

<?php
include '../includes/footer.php';
?>