<?php
// The session for the logged in user is relayed to this page using the session start tag. In case the session is not started it will start the session.
session_start();

// Assigning usernme of the logged in user into a variable for easy access.
$user = $_SESSION['username'];

// Including the connection file of the database.
include "../../partials/_dbconnect.php";

// Getting the id from the URL
$id=$_GET['id'];
echo $id;

$query = "SELECT * FROM students WHERE s_id=$id;";
$result = mysqli_query($conn, $query);

if($result && (mysqli_num_rows($result)==1)){
  $res = mysqli_fetch_assoc($result);
}else{
  echo "Failed";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Detail</title>
</head>
<body>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Image</th>
      <th scope="col">Mother</th>
      <th scope="col">Aadhar</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>
    <?php
    echo "
    <tr>
      <th scope='row'>".$res['s_id']."</th>
      <td>".$res['f_name']."</td>
      <td> <img src='../".$res['s_img']."' alt='Student Image' height='100px' width='100px' style='border-radius:50%;'></td>
      <td>".$res['mother_name']."</td>
      <td>".$res['aadhar']."</td>
      <td>".$res['username']."</td>
      <td>".$res['email']."</td>
    </tr>
";
    ?>
  </tbody>
</table>

</body>
</html>