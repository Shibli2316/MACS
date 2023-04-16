<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: index.php");
    exit;
}
?>


<?php
$server="localhost";
$username="root";
$password="";
$databse="users_db";

$conn=mysqli_connect($server, $username, $password, $databse);
if (!$conn){
    die("Error ". mysqli_connect_error());
}

$sql1 = "SELECT * FROM students";
$sql2 = "SELECT * FROM alumni";
$sql3 = "SELECT * FROM teacher";

$result1 = mysqli_query($conn, $sql1);
$num1 = mysqli_num_fields($result1);
$result2 = mysqli_query($conn, $sql2);
$num2 = mysqli_num_fields($result2);
$result3 = mysqli_query($conn, $sql3);
$num3 = mysqli_num_fields($result3);

$count1 = 0;
$count2 = 0;
$count3 = 0;
if(mysqli_num_rows($result1)>0){
    while($row = mysqli_fetch_assoc($result1)){
        $count1+=1;
    }
}
if(mysqli_num_rows($result2)>0){
    while($row = mysqli_fetch_assoc($result2)){
        $count2+=1;
    }
}
if(mysqli_num_rows($result3)>0){
    while($row = mysqli_fetch_assoc($result3)){
        $count3+=1;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65' crossorigin='anonymous'>
    <!-- JavaScript Bundle with Popper -->
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4' crossorigin='anonymous'></script>
    <title>Dashboard</title>
</head>

<body>
    <?php
    include '_nav.php';
    ?>
    <h1 style="text-align: center; margin: 10px;">Dashboard</h1>
    <div class="card my-3 mx-3">
        <div class="card-header">
            Stats of Students
        </div>
        <div class="card-body">
            <h5 class="card-title">The number of Students are </h5>
            <p class="card-text"><?php echo $count1;?></p>
            <a href="/Project-Smart/admin/manage/managestudent.php" class="btn btn-primary">View All</a>
        </div>
    </div>
    <div class="card my-3 mx-3">
        <div class="card-header">
            Stats of Alumni
        </div>
        <div class="card-body">
            <h5 class="card-title">The number of Alumni are </h5>
            <p class="card-text"><?php echo $count2;?></p>
            <a href="/Project-Smart/admin/manage/managealumni.php" class="btn btn-primary">View All</a>
        </div>
    </div>
    <div class="card my-3 mx-3">
        <div class="card-header">
            Stats of Teacher
        </div>
        <div class="card-body">
            <h5 class="card-title">The number of Teachers are </h5>
            <p class="card-text"><?php echo $count3;?></p>
            <a href="/Project-Smart/admin/manage/manageteacher.php" class="btn btn-primary">View All</a>
        </div>
    </div>
</body>

</html>