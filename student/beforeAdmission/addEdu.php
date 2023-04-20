<!-- INSERT INTO `s_education` (`s_id`, `level`, `year_passing`, `roll_no`, `board`, `result`, `grade_type`, `grade`, `certificate`) VALUES ('1', 'ssc', '2020', '123', 'cbse', 'passed', 'a', '23', 'ew'); -->


<?php   

session_start();

// Assigning usernme of the logged in user into a variable for easy access.
$user = $_SESSION['username'];
// $idUser = $_SESSION['s_id'];

$insert =false;
$update=false;
$delete=false;
include '../../partials/_dbconnect.php';


// $user = $_SESSION['username'];
// $idUser = $_GET['id'];
?>
    

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Entry</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
</head>

<body>
<?php include '../../partials/_nav.php';?>
<?php include '../../partials/_studNav.php';?>
<div class="container card text-center my-4 border">
    <div class="card-header">

        <h3>Enter Education Details</h3>
    </div>
</div>

    <?php
    if($insert){
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success!</strong> Your record has been inserted.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }
    ?>

<div class="container border my-4">

    <form action="addEdu.php" method="post" enctype="multipart/form-data">
        <div class="mb-3 mx-5 my-4">
            <label for="id" class="form-label">Enter Level of qualification</label>
            <input type="text" class="form-control" id="id" name="level" placeholder="SSC">
        </div>
        <div class="mb-3 mx-5">
            <label for="empName" class="form-label">Year of passing</label>
            <input type="text" class="form-control" id="name" name="year_passing" placeholder="2020">
        </div>
        <div class="mb-3 mx-5">
            <label for="designation" class="form-label">Enter Roll Number</label>
            <input type="text" class="form-control" id="designation" name="roll_no" placeholder="123E">
        </div>
        <div class="mb-3 mx-5">
            <label for="address" class="form-label">Enter Board of Studies</label>
            <input type="text" class="form-control" id="address" name="board" placeholder="CBSC">
        </div>
        <div class="mb-3 mx-5">
            <label for="address" class="form-label">Enter Result Status</label>
            <input type="text" class="form-control" id="address" name="result" placeholder="Passed">
        </div>
        <div class="mb-3 mx-5">
            <label for="address" class="form-label">Enter Grade Type</label>
            <input type="text" class="form-control" id="address" name="grade_type" placeholder="Percentage">
        </div>
        <div class="mb-3 mx-5">
            <label for="address" class="form-label">Enter Grade</label>
            <input type="text" class="form-control" id="address" name="grade" placeholder="22%">
        </div>
        <div class="mb-3 mx-5">
            <label for="address" class="form-label">Upload Certificate</label>
            <input type="file" class="form-control" id="address" name="upload">
        </div>
        <div class="container text-center">
            <button class="btn btn-primary my-2" id="save">Submit</button>
        </div>
        <!-- <button class="btn btn-primary">Reset</button> -->
    </form>

</div>


<?php
if ($_SERVER['REQUEST_METHOD'] =='POST'){

$filename = $_FILES["upload"]["name"];
$tempname = $_FILES["upload"]["tmp_name"];

$folder = "../../documents/marksheet/".$filename;
move_uploaded_file($tempname, $folder);
// Should be student id
// $id=$_POST['id'];
$level=$_POST['level'];
$year_passing=$_POST['year_passing'];
$roll_no=$_POST['roll_no'];
$board=$_POST['board'];
$result=$_POST['result'];
$grade_type=$_POST['grade_type'];
$grade=$_POST['grade'];


// $certificate=$_POST['upload'];


$sql = "INSERT INTO `s_education` (`level`, `year_passing`, `roll_no`, `board`, `result`, `grade_type`, `grade`, `certificate`) VALUES ('$level', '$year_passing', '$roll_no', '$board', '$result', '$grade_type', '$grade', '$folder');";
// var_dump($sql);
$result= mysqli_query($conn, $sql);
if (!$result) {
    echo "Error while updating records";
} else {
    echo "<script>alert('Your records has been updated successfully!!!')</script>";
?>

<!-- Redirecting to profile page -->
    <!-- <meta http-equiv="refresh" content="0; url = uploadingAddress.php" /> -->
<?php
}
}
?>

<?php include '../../partials/_footer.php';?>