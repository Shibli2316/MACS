<?php
// The session for the logged in user is relayed to this page using the session start tag. In case the session is not started it will start the session.
session_start();

// Assigning usernme of the logged in user into a variable for easy access.
$user = $_SESSION['username'];

// Including the connection file of the database.
include "../../partials/_dbconnect.php"
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
    require "../../partials/_nav.php";
?>


<div class="container">
    <h1>Displaying students data</h1>
</div>

<!-- Making table to display the records -->
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">S.No</th>
      <th scope="col">Image</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      
      <th scope="col">Exam</th>
      <th scope="col">Rank</th>
      <th scope="col">View Documents</th>
      <th scope="col">View Details</th>
      <th scope="col">Comment</th>

    </tr>
  </thead>

<?php
// Since in the table there maybe discreate numbering so to keep the numbering in order a varable is assigned and its value is updated with each itteration of the rows of the database
$sno = 1;

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
      $sID= $row['s_id'];
        echo "
        <tbody>
        <tr>
          <th scope='row'>".$sno."</th>
          <td><img src='".$row['s_img']."' height='100px' width='100px' style='border-radius:50%;'></td>
          <td>".$row['f_name']."</td>
          <td>".$row['l_name']."</td>
          <td>".$row['exam']."</td>
          <td>".$row['rank']."</td>
          <td><a href='studDoc.php?id=".$sID."'><button class='btn btn-primary btn-success'>View</button></a></td>
          <td><a href='studTemp.php?id=".$sID."'><button class='btn btn-primary btn-success'>View</button></a></td>
          <td><input type='text' placeholder='Write a remark' name='comments'><button class='btn btn-primary btn-success'>Comment</button></a></td>
        </tr>
      </tbody>";
        $sno = $sno+1;
    }
}

// If there is 0 records it will display no records.
else{
  echo "No records yet";
}

if($_SERVER['REQUEST_METHOD']=='POST'){
  $comment = $_POST['comment'];

  $sql = "INSERT INTO `evaluation` (`teacherID`, `studentID`, `remark`) VALUES (`$user`, `$sID`, `$comment`);";
  $running = mysqli_query($conn, $sql);
  if($running){
    echo "done";
  }
  else{
    echo "error";
  }

}

?>

</table>
<form action='viewStudents.php' method='post'>
  <input type='text' name='comment'>
  <button type='submit' class='btn btn-primary'>Submit</button>
</form>
<!-- Bootstap JS file CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  
</body>
</html>