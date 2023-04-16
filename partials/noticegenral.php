<?php

session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: ../student/index.php");
    exit;
}
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

  <title>Notice View</title>
</head>

<body>
  <?php include '_nav.php'; ?>
  <div class="container text-center">

    <h1 class="mx-3 my-2">Notice</h1>
  
  <?php
 
 $server="localhost";
 $username="root";
 $password="";
 $databse="macsa";
 
 $conn=mysqli_connect($server, $username, $password, $databse);
 if (!$conn){
     die("Error ". mysqli_connect_error());
 }
 
 


  // $_SESSION['loggedin'] = true;
  $sql = 'SELECT * FROM notice';
  $res = mysqli_query($conn, $sql);
  $num = mysqli_num_rows($res);
  $sno = 1;
  // $print = mysqli_fetch_array($res);
  while ($row = mysqli_fetch_array($res)) {
    $title = $row['name'];
    echo "
    <div class='card text-center mx-2 my-4'>
    <div class='card-header'>
      Notice " .$sno ."
    </div>
    <div class='card-body'>
      <h5 class='card-title'>" .$row['name'] ."</h5>
      <p class='card-text'>" . ($row['about']) . "</p>
      
    </div>
    <div class='card-footer text-muted'>
      " . ($row['timestamp']) . "
    </div>
  </div>
  ";
  $sno+=1;
  }
  ?>
  </div>
</body>

</html>