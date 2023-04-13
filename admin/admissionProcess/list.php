<!-- list of all the department and an add button to add department
department can be edited or deleted from here -->

<?php
// The session for the logged in user is relayed to this page using the session start tag. In case the session is not started it will start the session.
session_start();

// Assigning usernme of the logged in user into a variable for easy access.
$user = $_SESSION['username'];

// Including the connection file of the database.
include "../../partials/_dbconnectAdmin.php"
?>

<?php
include '../includes/header.php';
?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">The list of ongoing exams</h1>
    
<!-- Making table to display the records -->
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">S.No</th>
      
      <th scope="col">Type</th>
      <th scope="col">Sub</th>
      <th scope="col">Department</th>
      <th scope="col">Start Date</th>
      <th scope="col">End Date</th>
      
      <th scope="col">Manage</th>
    </tr>
  </thead>

<?php
// Since in the table there maybe discreate numbering so to keep the numbering in order a varable is assigned and its value is updated with each itteration of the rows of the database
$sno = 1;

// Fetching students records
$fetching = "SELECT * FROM start;";
$run = mysqli_query($conn, $fetching);
if(!$run){
    echo "error";
}

// Chechking the number of rows the database has and iterating it only if the number of rows are greater than 0
$howManyRows = mysqli_num_rows($run);
if($howManyRows>0){
    while($row = mysqli_fetch_assoc($run)){
        echo "
        <tbody>
        <tr>
          <th scope='row'>".$sno."</th>
          
          <td>".$row['class']."</td>
          <td>".$row['sub']."</td>
          <td>".$row['dep']."</td>
          <td>".$row['sdate']."</td>
          <td>".$row['edate']."</td>
          <td><a href='manageDep.php'><button class='btn btn-primary btn-success'>Update</button></a><hr><a href='#'><button class='btn btn-danger btn-danger'>End</button></a></td>
        </tr>
      </tbody>";
        $sno = $sno+1;
    }
}

// If there is 0 records it will display no records.
else{
  echo "No records yet";
}

?>

</table>

<!-- Bootstap JS file CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  
</div>
<?php
include '../includes/footer.php';
?>