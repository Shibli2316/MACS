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

    <!-- The title will display the username making the first char uppercase -->
    <title>Profile: <?php echo ucfirst($user); ?></title>
</head>

<body>
<?php

// Navbar is required before moving forward
require "../../partials/_nav.php";
include '../../partials/_studNav.php';



// Fetching the data of the logged in user.
$sql = "SELECT * FROM `s_specifics` WHERE username = '$user'";
$result = mysqli_query($conn, $sql);

// Storing it into an associative array called details.
$details = mysqli_fetch_assoc($result);




$sql1 = "SELECT * FROM `students` WHERE username = '$user'";
$result1 = mysqli_query($conn, $sql1);

// Storing it into an associative array called details.
$details1 = mysqli_fetch_assoc($result1);
$id=$details1['s_id'];
// echo $id;
// If the request method of the form is post the data to be entered into the database are stored in various variables.
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        
        $p_add_hno = $_POST['p_add_hno'];
        $p_add_locality = $_POST['p_add_locality'];
        $p_add_city = $_POST['p_add_city'];
        $p_add_state = $_POST['p_add_state'];
        $c_add_hno = $_POST['c_add_hno'];
        $c_add_locality = $_POST['c_add_locality'];
        $c_add_city = $_POST['c_add_city'];
        $c_add_state = $_POST['c_add_state'];
        
// The updating query being executed.

        $updatingDetails = "UPDATE `s_specifics` SET `s_id`=$id, `p_add_hno`= '$p_add_hno' , `p_add_locality` = '$p_add_locality' , `p_add_city` = '$p_add_city' , `p_add_state` = '$p_add_state' ,`c_add_hno`='$c_add_hno' , `c_add_locality` = '$c_add_locality' , `c_add_city` = '$c_add_city' , `c_add_state` = '$c_add_state' WHERE `s_specifics`.`username` = '$user';";
        // echo $updatingDetails;
        $run = mysqli_query($conn, $updatingDetails);
        if (!$run) {
            echo "Error while updating records";
        } else {
            echo "<script>alert('Your records has been updated successfully!!!')</script>";
    ?>

<!-- Redirecting to profile page -->
            <meta http-equiv="refresh" content="0; url = uploadingAddress.php" />
    <?php
        }
    }
    ?>


<div class="container text-center card-header my-4">
    <h3>Update address</h3>
</div>
    <!-- In this fprm the input required fields are read-only and the details of the user if exists has been displayed in placeholder. The user can further use the update button to update his/her details. -->
    <div class="container border">
    <form action="<?php echo $_SERVER['PHP_SELF']."?name=".$user; ?>" class="mx-2 my-2" method="post">
    <div class="container text-center">

        <h3>Permanent Address</h3>
    </div>
    <div class="mb-3 mx-5">

        <label class="form-label" for="name">House No</label>
        <input required class="form-control" type="text" name="p_add_hno" id="p_add_hno" value="<?php if ($details['p_add_hno'] == "") {echo "Enter House Number";} else {echo $details['p_add_hno'];} ?>" > <br>
    </div>
    
        <div class="mb-3 mx-5">

            <label class="form-label" for="name">Locality</label>
            <input required class="form-control" type="text" name="p_add_locality" id="p_add_locality" value="<?php if ($details['p_add_locality'] == "") {echo "Enter Locality";} else {echo $details['p_add_locality'];} ?>" > <br>
        </div>
        
<div class="mb-3 mx-5">

    <label class="form-label" for="name">City</label>
    <input required class="form-control" type="text" name="p_add_city" id="p_add_city" value="<?php if ($details['p_add_city'] == "") {echo "Enter City/District";} else {echo $details['p_add_city'];} ?>" > <br>
</div>

        <div class="mb-3 mx-5">

            <label class="form-label" for="state">State</label>
            <input required class="form-control" type="text" name="p_add_state" id="p_add_state" value="<?php if ($details['p_add_state'] == "") {echo "Enter State";} else {echo $details['p_add_state'];} ?>" > <br>
        </div>
        
        
        <div class="container text-center">

            <h3>Corresponding Address</h3>
        </div>
    <div class="mb-3 mx-5">

        <label class="form-label" for="name">House No</label>
        <input required class="form-control" type="text" name="c_add_hno" id="c_add_hno" value="<?php if ($details['c_add_hno'] == "") {echo "Enter House Number";} else {echo $details['c_add_hno'];} ?>" > <br>
    </div>
    
    <div class="mb-3 mx-5">

        <label class="form-label" for="name">Locality</label>
        <input required class="form-control" type="text" name="c_add_locality" id="c_add_locality" value="<?php if ($details['c_add_locality'] == "") {echo "Enter Locality";} else {echo $details['c_add_locality'];} ?>" > <br>
    </div>    
    
<div class="mb-3 mx-5">

    <label class="form-label" for="name">City</label>
    <input required class="form-control" type="text" name="c_add_city" id="c_add_city" value="<?php if ($details['c_add_city'] == "") {echo "Enter City/District";} else {echo $details['c_add_city'];} ?>" > <br>
</div>

      <div class="mb-3 mx-5">

          <label class="form-label" for="state">State</label>
          <input required class="form-control" type="text" name="c_add_state" id="c_add_state" value="<?php if ($details['c_add_state'] == "") {echo "Enter State";} else {echo $details['c_add_state'];} ?>" > <br>
        </div>  
      

        <div class="container text-center">
            <!-- SAVE BUTTON -->
            
            <input type="submit" value="Save" class="btn btn-primary">
            
        </div>
    </form>
    </div>

    <!-- Bootstap JS file CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <?php include '../../partials/_footer.php';?>