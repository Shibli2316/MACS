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
$databse="admin_db";

$conn=mysqli_connect($server, $username, $password, $databse);
if (!$conn){
    die("Error ". mysqli_connect_error());
}


$title = $_GET['title'];
$sql = "SELECT * FROM notice WHERE `title` = '$title'";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($res);
$num = mysqli_num_rows($res);


?>


<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset='UTF-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <!-- CSS only -->
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65' crossorigin='anonymous'>
  <!-- JavaScript Bundle with Popper -->
  <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4' crossorigin='anonymous'></script>

  <title>Info Notice</title>
</head>

<body>
    <?php
include "nav.php";
echo "<h1 mx-2 my-2>Title: <i>".$title ."</i></h1>";
echo "<p mx-2 my-4>".$row['description']. "</p>";
echo "<br>".$row['tstamp'];

?>