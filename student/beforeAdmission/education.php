<?php   
session_start();

// Assigning usernme of the logged in user into a variable for easy access.
$user = $_SESSION['username'];
// $idUser = $_SESSION['s_id'];

$insert =false;
$update=false;
$delete=false;

include '../../partials/_dbconnect.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile <?php echo ucfirst($user); ?></title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <!-- //cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>
    
</head>
<body>
<?php include '../../partials/_nav.php';?>
<?php include '../../partials/_studNav.php';?>



<div class="container border my-4 card">

<div class="container card-header my-4 text-center">
    
    <h3>Education details</h3>
</div>
    <div class="container my-4">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">SNo</th>
                    <th scope="col">Level</th>
                    <th scope="col">Year</th>
                    <th scope="col">Roll</th>
                    <th scope="col">Board</th>
                    <th scope="col">Result</th>
                    <th scope="col">Grade type</th>
                    <th scope="col">Grade</th>
                </tr>
            </thead>
            <tbody>
            <?php
$sql = "SELECT * FROM `s_education`";
$result = mysqli_query($conn, $sql);
$sno=0;
while($row = mysqli_fetch_assoc($result)){
    $sno +=1;
    echo "<tr>
    <th scope='row'>".$sno."</th>
    <td>".$row['level']."</td>
    <td>".$row['year_passing']."</td>
    <td>".$row['roll_no']."</td>
    <td>".$row['board']."</td>
    <td>".$row['result']."</td>
    <td>".$row['grade_type']."</td>
    <td>".$row['grade']."</td>
    
    </tr>";
}
?>

</tbody>
</table>

</div>
<div class="container my-2">
    <a href="addEdu.php" class="btn btn-primary">ADD</a>
</div>
        
</div>
<?php include '../../partials/_footer.php';?>