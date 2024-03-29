<!-- list of all the notice and an add button to add department
department can be edited or deleted from here -->

<?php
// The session for the logged in user is relayed to this page using the session start tag. In case the session is not started it will start the session.


// Including the connection file of the database.
include "../../partials/_dbconnectAdmin.php"
?>

<?php
include '../includes/header.php';
$user = $_SESSION['username'];
?>


<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Notice List</h1>


<!-- Making table to display the records -->
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">S.No</th>
      
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Published on</th>
      
      <th scope="col">Manage</th>
    </tr>
  </thead>

<?php
// Since in the table there maybe discreate numbering so to keep the numbering in order a varable is assigned and its value is updated with each itteration of the rows of the database
$sno = 1;

// Fetching students records
$fetching = "SELECT * FROM notice;";
$run = mysqli_query($conn, $fetching);
if(!$run){
    echo "error";
}

// Chechking the number of rows the database has and iterating it only if the number of rows are greater than 0
$howManyRows = mysqli_num_rows($run);
if($howManyRows>0){
    while($row = mysqli_fetch_assoc($run)){
      $id=$row['id'];
        echo "
        <tbody>
        <tr>
          <th scope='row'>".$sno."</th>
          
          <td>".$row['name']."</td>
          <td>".$row['about']."</td>
          <td>".$row['timestamp']."</td>

          <td>
          
          <a href='updateNotice.php?id=".$id."'><button class='btn btn-primary btn-success'>Update</button></a><hr>
          
          <form action='delNotice.php?id=".$id."' method='post'>
          <button class='btn btn-danger btn-danger'>Delete</button></td>
          </form>
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