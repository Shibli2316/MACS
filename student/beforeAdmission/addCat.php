<?php   

session_start();

// Assigning usernme of the logged in user into a variable for easy access.
$user = $_SESSION['username'];
$idUser = $_SESSION['s_id'];

$insert =false;
$update=false;
$delete=false;
include '../../partials/_dbconnect.php';
if ($_SERVER['REQUEST_METHOD'] =='POST'){
    $id=$_POST['id'];
    $name=$_POST['name'];
    $designation=$_POST['designation'];
    $address=$_POST['address'];
    $sql = "INSERT INTO `empfile` (`id`, `name`, `designation`, `address`) VALUES ('$id', '$name', '$designation', '$address')";
    $result= mysqli_query($conn, $sql);
    if($result){
        $insert = true;
    }
    else{
        echo "try again";
    }
}

if (!$conn){
    die("Sorry access denied". mysqli_connect_error());
}
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Entry</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
</head>

<body>
<?php include '../../partials/_nav.php';?>
<?php include '../../partials/_studNav.php';?>
<div class="container card text-center my-4 border">
    <div class="card-header">

        <h3>Enter Education Details</h3>
    </div>
</div>

    <?php
    if($insert){
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success!</strong> Your record has been inserted.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }
    ?>

<div class="container border my-4">

    <form action="addCat.php" method="post">
        <div class="mb-3 mx-5 my-4">
            <label for="id" class="form-label">Enter Employee ID</label>
            <input type="text" class="form-control" id="id" name="id" placeholder="123">
        </div>
        <div class="mb-3 mx-5">
            <label for="empName" class="form-label">Enter Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Shibli">
        </div>
        <div class="mb-3 mx-5">
            <label for="designation" class="form-label">Enter Designation</label>
            <input type="text" class="form-control" id="designation" name="designation" placeholder="Prof">
        </div>
        <div class="mb-3 mx-5">
            <label for="address" class="form-label">Enter Address</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Aligarh">
        </div>
        <div class="container text-center">
            <button class="btn btn-primary my-2" id="save">Submit</button>
        </div>
        <!-- <button class="btn btn-primary">Reset</button> -->
    </form>

</div>
<?php include '../../partials/_footer.php';?>