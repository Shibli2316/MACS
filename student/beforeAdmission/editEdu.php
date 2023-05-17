<!-- INSERT INTO `s_education` (`s_id`, `level`, `year_passing`, `roll_no`, `board`, `result`, `grade_type`, `grade`, `certificate`) VALUES ('1', 'ssc', '2020', '123', 'cbse', 'passed', 'a', '23', 'ew'); -->


<?php   

session_start();

// Assigning usernme of the logged in user into a variable for easy access.
$user = $_SESSION['username'];
// $idUser = $_SESSION['s_id'];
$no = $_GET['roll'];
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

<?php
$sql = "SELECT s_id from students where username = '$user';";
$run = mysqli_query($conn, $sql);
$fetch = mysqli_fetch_assoc($run);
$sid = $fetch['s_id'];
?>
<?php
$sql = "SELECT * FROM `s_education` WHERE username = '$user' and roll_no = $no";
$result = mysqli_query($conn, $sql);

// Storing it into an associative array called details.
$details = mysqli_fetch_assoc($result);


if ($_SERVER['REQUEST_METHOD'] =='POST'){


    $level=$_POST['level'];
    $year_passing=$_POST['year_passing'];
    $roll_no=$_POST['roll_no'];
    $board=$_POST['board'];
    $result=$_POST['result'];
    $grade_type=$_POST['grade_type'];
    $grade=$_POST['grade'];
    
    
    // $certificate=$_POST['upload'];
    
    
    $sql = "UPDATE `s_education` SET `s_id`='$sid', `level`='$level', `year_passing`='$year_passing', `roll_no`='$roll_no', `board`='$board', `result`='$result', `grade_type`='$grade_type', `grade`='$grade' where username='$user' and roll_no=$no;";
    // var_dump($sql);
    $result= mysqli_query($conn, $sql);
    if (!$result) {
        echo "Error while updating records";
    } else {
        echo "<script>alert('Your records has been updated successfully!!!')</script>";
    ?>
    
    <!-- Redirecting to profile page -->
        <meta http-equiv="refresh" content="0; url = education.php" />
    <?php
    }
    }


?>
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

    <form action="editEdu.php?name=<?=$user?>&roll=<?=$no?>" method="post" enctype="multipart/form-data">
        <div class="mb-3 mx-5 my-4">
            <label for="id" class="form-label">Enter Level of qualification</label>
            <input required type="text" class="form-control" id="id" name="level" value="<?php if ($details['level'] == "") {echo "Enter Level of qualification";} else {echo $details['level'];} ?>">
        </div>
        <div class="mb-3 mx-5">
            <label for="empName" class="form-label">Year of passing</label>
            <input required type="text" class="form-control" id="name" name="year_passing" value="<?php if ($details['year_passing'] == "") {echo "Enter year of passing";} else {echo $details['year_passing'];} ?>">
        </div>
        <div class="mb-3 mx-5">
            <label for="designation" class="form-label">Enter Roll Number</label>
            <input required type="text" class="form-control" id="designation" name="roll_no" value="<?php if ($details['roll_no'] == "") {echo "Enter Roll no";} else {echo $details['roll_no'];} ?>">
        </div>
        <div class="mb-3 mx-5">
            <label for="address" class="form-label">Enter Board of Studies</label>
            <input required type="text" class="form-control" id="address" name="board" value="<?php if ($details['board'] == "") {echo "Enter board of studies";} else {echo $details['board'];} ?>">
        </div>
        <div class="mb-3 mx-5">
            <label for="address" class="form-label">Enter Result Status</label>
            <input required type="text" class="form-control" id="address" name="result" value="<?php if ($details['result'] == "") {echo "Passed/Awaited/Appearing";} else {echo $details['result'];} ?>">
        </div>
        <div class="mb-3 mx-5">
            <label for="address" class="form-label">Enter Grade Type</label>
            <input required type="text" class="form-control" id="address" name="grade_type" value="<?php if ($details['grade_type'] == "") {echo "Enter type of grade";} else {echo $details['grade_type'];} ?>">
        </div>
        <div class="mb-3 mx-5">
            <label for="address" class="form-label">Enter Grade</label>
            <input required type="text" class="form-control" id="address" name="grade" value="<?php if ($details['grade'] == "") {echo "Enter your grades";} else {echo $details['grade'];} ?>">
        </div>
        
        <div class="container text-center">
            <button class="btn btn-primary my-2" id="save">Submit</button>
        </div>
        <!-- <button class="btn btn-primary">Reset</button> -->
    </form>

</div>




<?php include '../../partials/_footer.php';?>