<!-- INSERT INTO `s_education` (`s_id`, `level`, `year_passing`, `roll_no`, `board`, `result`, `grade_type`, `grade`, `certificate`) VALUES ('1', 'ssc', '2020', '123', 'cbse', 'passed', 'a', '23', 'ew'); -->


<?php   
session_start();

// Assigning usernme of the logged in user into a variable for easy access.
$user = $_SESSION['username'];

include '../../partials/_dbconnect.php';


// $user = $_SESSION['username'];
// $idUser = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] =='POST'){

    // $filename = $_FILES["upload"]["name"];
    // $tempname = $_FILES["upload"]["tmp_name"];

    // $folder = "../../documents/marksheet/".$filename;
    // move_uploaded_file($tempname, $folder);
    // Should be student id
    // $id=$_POST['id'];
    $level=$_POST['level'];
    $course=$_POST['course'];



    // $certificate=$_POST['upload'];


    $appNum = '202305';
    $random = rand(10,100);
    $appNum = $appNum+$random;
    $sql = "UPDATE `students` SET `level`='$level', `course`='$course', `form_no`='$appNum' WHERE username='$user';";
    // echo $appNum;
    // var_dump($sql);
    $result= mysqli_query($conn, $sql);
    $sql1 = "SELECT * FROM students where `username`= '$user';";
    $result1= mysqli_query($conn, $sql1);
    $detail = mysqli_fetch_assoc($result1);
    $sid = $detail['s_id'];
    
    $sql2 = "INSERT into `verify` (`username`, `sid`) values ('$user', '$sid');";
    $result3 = mysqli_query($conn, $sql2);
    if (!$result) {
        echo "Error while updating records";
    } else {
        echo "<script>alert('Your records has been updated successfully!!!')</script>";
?>

<!-- Redirecting to profile page -->
        <meta http-equiv="refresh" content="0; url = dashboard.php" />
<?php
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS file CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- The title will display the username making the first char uppercase -->
    <title>Profile <?php echo ucfirst($user); ?></title>
</head>

<body>
    <?php include '../../partials/_nav.php'; ?>
    <?php include '../../partials/_studNav.php'; ?>
    <div class="container">
<form action="applyfor.php" method="post">

    <div class="card my-4 text-center">
        <div class="card-header text-center">
                Apply for
            </div>
            <div class="card-body text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label" for="sub">Choose Level</label>
                        </div>
                        <div class="col-md-6">
                            <select class="form-control" name="level" id="">
                                <option value="0">--SELECT--</option>
                                <option value="UG">UG</option>
                                <option value="PG">PG</option>
                                <option value="School">School</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="container my-2">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label" for="sub">Choose Course</label>
                        </div>
                        <div class="col-md-6">
                            <select class="form-control" name="course" id="">
                                <option value="0">--SELECT--</option>
                                <option value="Science">Science</option>
                                <option value="Commerse">Commerse</option>
                                <option value="Arts">Arts</option>
                            </select>
                        </div>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary mx-auto" value="SAVE">
            </div>
        </div>
        
    </form>
    </div>
    <?php include '../../partials/_footer.php'; ?>