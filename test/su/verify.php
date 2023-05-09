<?php
// The session for the logged in user is relayed to this page using the session start tag. In case the session is not started it will start the session.
session_start();

// Assigning usernme of the logged in user into a variable for easy access.
$user = $_SESSION['username'];

// Including the connection file of the database.
include "../../partials/_dbconnect.php";

// Getting the id from the URL
$id=$_GET['id'];
// echo $id;

$sql = "SELECT * FROM teachers where username = '$user'";
$res = mysqli_query($conn, $sql);
$det = mysqli_fetch_assoc($res);
$tid = $det['t_id'];


if ($_SERVER['REQUEST_METHOD']=='POST') {


    // $image = $_POST['image'];
    $remark = $_POST['remark'];
    $verified = $_POST['verified'];
    $sub = $_POST['sub'];

    



    $sql = "UPDATE `verify` SET `tid` = '$tid', `remark`='$remark', `verified`='$verified', `sub`='$sub';";
// var_dump($sql);

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('Data inserted');</script>";
        ?>
        <meta http-equiv="refresh" content = "0; url = viewStudents.php"/>
        <?php
    } else {
        echo "<script>alert('Error while uploading');</script>";
    ?>
    <meta http-equiv="refresh" content = "0; url = viewStudents.php"/>
    <?php
    }
}
?>
