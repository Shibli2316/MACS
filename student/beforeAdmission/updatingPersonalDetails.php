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
require "../../partials/_nav.php";

// Fetching the data of the logged in user.
$sql = "SELECT * FROM `students` WHERE username = '$user'";
$result = mysqli_query($conn, $sql);

// Storing it into an associative array called details.
$details = mysqli_fetch_assoc($result);

// If the request method of the form is post the data to be entered into the database are stored in various variables.
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        
        $father_name = $_POST['father_name'];
        $mother_name = $_POST['mother_name'];
        // $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $blood_group = $_POST['blood_group'];
        $mobile = $_POST['mobile'];
        $guardian_name = $_POST['guardian_name'];
        $guardian_number = $_POST['guardian_number'];
        $disability = $_POST['disability'];
        $aadhar = $_POST['aadhar'];
        $nationality = $_POST['nationality'];
        $domicile = $_POST['domicile'];
        $identity_mark = $_POST['identity_mark'];

// The updating query being executed.
        $updatingDetail = "UPDATE `students` SET `father_name`='$father_name',`mother_name` = '$mother_name', `blood_group` = '$blood_group', `mobile` = '$mobile', `guardian_name` = '$guardian_name', `guardian_number` = '$guardian_number', `disability` = '$disability', `aadhar` = '$aadhar', `nationality` = '$nationality', `domicile` = '$domicile', `identity_mark` = '$identity_mark', `gender` = '$gender' WHERE `students`.`username` = '$user';";
        // echo $updatingDetails;
        $run = mysqli_query($conn, $updatingDetail);
        // var_dump($run);
        if (!$run) {
            echo "Error while updating records";
        } else {
            echo "<script>alert('Your records has been updated successfully!!!')</script>";
    ?>

<!-- Redirecting to profile page -->
            <meta http-equiv="refresh" content="0; url = uploadingPersonalDetails.php" />
    <?php
        }
    }
    ?>

<div class="container">
    <h1>
        Welcome student: <?php echo ucfirst($user);?>
    </h1>
</div>

    <!-- In this fprm the input fields are read-only and the details of the user if exists has been displayed in placeholder. The user can further use the update button to update his/her details. -->
    <form action="<?php echo $_SERVER['PHP_SELF']."?name=".$user; ?>" class="mx-2 my-2" method="post">

        <label for="name">First Name</label>
        <input type="text" name="f_name" id="f_name" placeholder="<?php if ($details['f_name'] == "") {echo "Enter First Name";} else {echo $details['f_name'];} ?>" readonly> <br>
        <hr>
        
        <label for="name">Last Name</label>
        <input type="text" name="l_name" id="l_name" placeholder="<?php if ($details['l_name'] == "") {echo "Enter Last Name";} else {echo $details['l_name'];} ?>" readonly> <br>
        <hr>
        
        <label for="fname">Father's Name</label>
        <input type="text" name="father_name" id="father_name" value="<?php if ($details['father_name'] == "") {echo "Enter Father's Name";} else {echo $details['father_name'];} ?>" > <br>
        <hr>

        <label for="fname">Mother's Name</label>
        <input type="text" name="mother_name" id="mother_name" value="<?php if ($details['mother_name'] == "") {echo "Enter Mother's Name";} else {echo $details['mother_name'];} ?>" > <br>
        <hr>

        <!-- NOT WORKING -->
        <label for="fname">Date of Birth</label>
        <input type="date" name="dob" id="dob" value="<?php if ($details['dob'] == "") {echo "Enter Date of Birth";} else {echo $details['dob'];} ?>" > <br>
        <hr>
        
        <label for="fname">Blood Group</label>
        <input type="text" name="blood_group" id="blood_group" value="<?php if ($details['blood_group'] == "") {echo "Enter Blood Group";} else {echo $details['blood_group'];} ?>" > <br>
        <hr>

        <!-- GENDER -->

        <label for="name">Gender</label>
            <select name="gender">
                <option value="none">Select</option>
                <option value="male" 
                    <?php if($details['gender']=='male'){
                        echo "selected";
                    }?> 
                >Male</option>
                <option value="female"
                    <?php if($details['gender']=='female'){
                        echo "selected";
                    }?> 
                >Female</option>
            </select>
        <hr>

        <label for="fname">Mobile</label>
        <input type="text" name="mobile" id="mobile" value="<?php if ($details['mobile'] == "") {echo "Enter mobile number";} else {echo $details['mobile'];} ?>" > <br>
        <hr>

        <label for="fname">Guardian's Name</label>
        <input type="text" name="guardian_name" id="guardian_name" value="<?php if ($details['guardian_name'] == "") {echo "Enter Guardian's Name";} else {echo $details['guardian_name'];} ?>" > <br>
        <hr>
        
        <label for="fname">Guardian's Phone</label>
        <input type="text" name="guardian_number" id="guardian_number" value="<?php if ($details['guardian_number'] == "") {echo "Enter Guardian's Phone";} else {echo $details['guardian_number'];} ?>" > <br>
        <hr>

        <label for="fname">Disability</label>
        <input type="text" name="disability" id="disability" value="<?php if ($details['disability'] == "") {echo "Do you have any disability";} else {echo $details['disability'];} ?>" > <br>
        <hr>
        
        <label for="name">Aadhar Number</label>
        <input type="text" name="aadhar" id="aadhar" value="<?php if ($details['aadhar'] == "") {echo "Enter Aadhar Number";} else {echo $details['aadhar'];} ?>" > <br>
        <hr>

        <label for="name">Nationality</label>
        <input type="text" name="nationality" id="nationality" value="<?php if ($details['nationality'] == "") {echo "Enter Nationality";} else {echo $details['nationality'];} ?>" > <br>
        <hr>
        
        <label for="name">Domicile</label>
        <input type="text" name="domicile" id="domicile" value="<?php if ($details['domicile'] == "") {echo "Enter Domicile";} else {echo $details['domicile'];} ?>" > <br>
        <hr>
        
        <label for="name">Identity Mark</label>
        <input type="text" name="identity_mark" id="identity_mark" value="<?php if ($details['identity_mark'] == "") {echo "Enter Identity Mark";} else {echo $details['identity_mark'];} ?>" > <br>
        <hr>
        
        
        
        <!-- The update button directing the user to the update page from where he or she can update his/her profile -->
        <input type="submit" value="Save">

    </form>

    <!-- Bootstap JS file CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>