<!-- NEED TO KEEP TRACK OF STUDENT ID -->


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
    include "../../partials/_nav.php";
    include "../../partials/_studNav.php";

    // Fetching the data of the logged in user.
    $sql = "SELECT * FROM `students` WHERE username = '$user'";
    $result = mysqli_query($conn, $sql);

    // Storing it into an associative array called details.
    $details = mysqli_fetch_assoc($result);
    ?>

<div class="container border my-4 text-center">
    <h1>
        Welcome student: <?php echo ucfirst($user);?>
    </h1>
</div>

<div class="container text-center card-header">
    <h3>Your Profile</h3>
</div>

    <!-- In this fprm the input fields are read-only and the details of the user if exists has been displayed in placeholder. The user can further use the update button to update his/her details. -->
    <div class="container border">

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="mx-2 my-2" method="post">
        
        <div class="mb-3 mx-5">
        <label class="form-label" for="name">First Name</label>
        <input class="form-control" type="text" name="f_name" id="f_name" placeholder="<?php if ($details['f_name'] == "") {echo "Enter First Name";} else {echo $details['f_name'];} ?>" readonly> <br>

        </div>
        
        <div class="mb-3 mx-5">
        <label class="form-label" for="name">Last Name</label>
        <input class="form-control" type="text" name="l_name" id="l_name" placeholder="<?php if ($details['l_name'] == "") {echo "Enter Last Name";} else {echo $details['l_name'];} ?>" readonly> <br>

        </div>
        
        <div class="mb-3 mx-5">
        <label class="form-label" for="fname">Father's Name</label>
        <input class="form-control" type="text" name="father_name" id="father_name" placeholder="<?php if ($details['father_name'] == "") {echo "Enter Father's Name";} else {echo $details['father_name'];} ?>" readonly> <br>

        </div>

        <div class="mb-3 mx-5">
        <label class="form-label" for="fname">Mother's Name</label>
        <input class="form-control" type="text" name="mother_name" id="mother_name" placeholder="<?php if ($details['mother_name'] == "") {echo "Enter Mother's Name";} else {echo $details['mother_name'];} ?>" readonly> <br>

        </div>

        <!-- NOT WORKING -->
        <div class="mb-3 mx-5">
        <label class="form-label" for="fname">Date of Birth</label>
        <input class="form-control" type="text" name="dob" id="dob" placeholder="<?php if ($details['dob'] == "") {echo "Enter Date of Birth";} else {echo $details['dob'];} ?>" readonly> <br>

        </div>

        <!-- GENDER -->
        <div class="mb-3 mx-5">
        <label class="form-label" for="fname">Gender</label>
        <input class="form-control" type="text" name="gender" id="gender" placeholder="<?php if ($details['gender'] == "") {echo "Enter gender";} else {echo $details['gender'];} ?>" readonly> <br>

        </div>

        <div class="mb-3 mx-5">
        <label class="form-label" for="fname">Blood Group</label>
        <input class="form-control" type="text" name="blood_group" id="blood_group" placeholder="<?php if ($details['blood_group'] == "") {echo "Enter Blood Group";} else {echo $details['blood_group'];} ?>" readonly> <br>

        </div>

        <div class="mb-3 mx-5">
        <label class="form-label" for="fname">Mobile</label>
        <input class="form-control" type="text" name="mobile" id="mobile" placeholder="<?php if ($details['mobile'] == "") {echo "Enter mobile number";} else {echo $details['mobile'];} ?>" readonly> <br>

        </div>

        <div class="mb-3 mx-5">
        <label class="form-label" for="fname">Guardian's Name</label>
        <input class="form-control" type="text" name="guardian_name" id="guardian_name" placeholder="<?php if ($details['guardian_name'] == "") {echo "Enter Guardian's Name";} else {echo $details['guardian_name'];} ?>" readonly> <br>

        </div>
        
        <div class="mb-3 mx-5">
        <label class="form-label" for="fname">Guardian's Phone</label>
        <input class="form-control" type="text" name="guardian_number" id="guardian_number" placeholder="<?php if ($details['guardian_number'] == "") {echo "Enter Guardian's Phone";} else {echo $details['guardian_number'];} ?>" readonly> <br>

        </div>

        <div class="mb-3 mx-5">
        <label class="form-label" for="fname">Disability</label>
        <input class="form-control" type="text" name="disability" id="disability" placeholder="<?php if ($details['disability'] == "") {echo "Do you have any disability";} else {echo $details['disability'];} ?>" readonly> <br>

        </div>
        
        <div class="mb-3 mx-5">
        <label class="form-label" for="name">Aadhar Number</label>
        <input class="form-control" type="text" name="aadhar" id="aadhar" placeholder="<?php if ($details['aadhar'] == "") {echo "Enter Aadhar Number";} else {echo $details['aadhar'];} ?>" readonly> <br>

        </div>

        <div class="mb-3 mx-5">
        <label class="form-label" for="name">Nationality</label>
        <input class="form-control" type="text" name="nationality" id="nationality" placeholder="<?php if ($details['nationality'] == "") {echo "Enter Nationality";} else {echo $details['nationality'];} ?>" readonly> <br>

        </div>
        
        
        
        <div class="mb-3 mx-5">
        <label class="form-label" for="name">Identity Mark</label>
        <input class="form-control" type="text" name="identity_mark" id="identity_mark" placeholder="<?php if ($details['identity_mark'] == "") {echo "Enter Identity Mark";} else {echo $details['identity_mark'];} ?>" readonly> <br>

        </div>
        
        
        <div class="container text-center">

            <!-- The update button directing the user to the update page from where he or she can update his/her profile -->
            <?php
        echo "<a href='updatingPersonalDetails.php?name=".$details['username']."'><input type='button' value='Update' class='btn btn-primary'></a>"
        ?>
        </div>

    </form>

</div>
    <!-- Bootstap JS file CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <?php include '../../partials/_footer.php';?>