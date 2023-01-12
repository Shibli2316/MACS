<?php
// The session for the logged in user is relayed to this page using the session start tag. In case the session is not started it will start the session.
session_start();

// Assigning usernme of the logged in user into a variable for easy access.
$user = $_SESSION['username'];

// Including the connection file of the database.
include "../partials/_dbconnect.php"
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstap CSS file CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>View Records</title>
</head>
<body>

<?php

    // Navbar is required before moving forward
    require "../partials/_nav.php";
?>



<div class="container">
    <h1>Displaying students data</h1>
</div>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">S.No</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Exam</th>
      <th scope="col">Rank</th>
    </tr>
  </thead>

<?php
$sno = 1;
$fetching = "SELECT * FROM students;";
$run = mysqli_query($conn, $fetching);
if(!$run){
    echo "error";
}
$howManyRows = mysqli_num_rows($run);
if($howManyRows>0){
    while($row = mysqli_fetch_assoc($run)){
        echo "
        <tbody>
        <tr>
          <th scope='row'>".$sno."</th>
          <td><img src='".$row['s_img']."' height='100px' width='100px' style='border-radius:50%;'></td>
          <td>".$row['f_name']."</td>
          <td>".$row['l_name']."</td>
          <td>".$row['username']."</td>
          <td>".$row['email']."</td>
          <td>".$row['exam']."</td>
          <td>".$row['rank']."</td>
        </tr>
      </tbody>";
        $sno = $sno+1;
    }
}

?>


</table>

<!-- Bootstap JS file CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  
</body>
</html>