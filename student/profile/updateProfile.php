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

    <!-- Bootstrap CSS file CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- The title will display the username making the first char uppercase -->
    <title>Profile <?php echo ucfirst($user); ?></title>
</head>

<body>
<?php

// Navbar is required before moving forward
include "../../partials/_nav.php";

// Fetching the data of the logged in user.
$sql = "SELECT * FROM `students` WHERE username = '$user'";
$result = mysqli_query($conn, $sql);

// Storing it into an associative array called details.
$details = mysqli_fetch_assoc($result);

// If the request method of the form is post the data to be entered into the database are stored in various variables.
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        


        $f_name = $_POST['f_name'];
        $l_name = $_POST['l_name'];
        $email = $_POST['email'];
        
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $mobile = $_POST['mobile'];
        // echo $mobile;
        $aadhar = $_POST['aadhar'];
        $nationality = $_POST['nationality'];

        // $form_no = $_POST['form_no'];
        // $rank = $_POST['rank'];

// The updating query being executed.
        $updatingDetails = "UPDATE `students` SET `f_name` = '$f_name', `l_name` = '$l_name', `email` = '$email', `dob` = '$dob', `gender`='$gender', `mobile`='$mobile', `aadhar`='$aadhar', `nationality`='$nationality' WHERE `students`.`username` = '$user';";
        $run = mysqli_query($conn, $updatingDetails);
        if (!$run) {
            echo "Error while updating records";
        } else {
            echo "<script>alert('Your records has been updated successfully!!!')</script>";
    ?>

<!-- Redirecting to profile page -->
            <meta http-equiv="refresh" content="0; url = profile.php" />
    <?php
        }
    }
    ?>
<?php include '../../partials/_studNav.php';?>

<!-- If the data of the user is present it is being fetched and dispplayed into the respected fields from where the user can update it if needed. The username cannot be updated -->
<div class="container border">

<div class="container text-center card-header my-4">
    <h3>Update Profile</h3>
</div>
<form action="updateProfile.php?name=<?php echo $user;?>" class="mx-2 my-2" method="post" enctype="multipart/form-data">

    
    
<div class="mb-3 mx-5">

    <label for="name" class="form-label">First Name</label>
    <input required type="text" name="f_name" id="f_name" value="<?php if ($details['f_name'] == "") {echo "Enter First name";} else {echo $details['f_name'];} ?>" class="form-control"> <br>
</div>
    
        <div class="mb-3 mx-5">

            <label class="form-label" for="name">Last Name</label>
            <input required class="form-control" type="text" name="l_name" id="l_name" value="<?php if ($details['l_name'] == "") {echo "Enter Last Name";} else {echo $details['l_name'];} ?>"> <br>
        </div>
            
        <div class="mb-3 mx-5">

            <label class="form-label" for="name">Username</label>
            <input required class="form-control" type="text" name="u_name" id="u_name" readonly placeholder="<?php echo $details['username']; ?>"> <br>
        </div>
            
        <div class="mb-3 mx-5">

            <label class="form-label" for="email">Email</label>
            <input required class="form-control" type="email" name="email" id="email" placeholder="<?php if ($details['email'] == "") {echo "Enter Email";} else {echo $details['email'];} ?>" readonly> <br>
        </div>
            
        
            
        
        <div class="mb-3 mx-5">
        <label class="form-label" for="fname">Date of Birth</label>
        <input required class="form-control" type="date" name="dob" id="dob" value="<?php if ($details['dob'] == "") {echo "Enter Date of Birth";} else {echo $details['dob'];} ?>" > <br>

        </div>

        
        <!-- GENDER -->
        <div class="mb-3 mx-5">
            <label class="form-label" for="fname">Gender</label>
            <input required class="form-control" type="text" name="gender" id="gender" value="<?php if ($details['gender'] == "") {echo "Enter gender";} else {echo $details['gender'];} ?>" > <br>
            
        </div>
        
        
        <div class="mb-3 mx-5">
            <label class="form-label" for="fname">Mobile</label>
            <input required class="form-control" type="text" name="mobile" id="mobile" value="<?php if ($details['mobile'] == "") {echo "Enter mobile number";} else {echo $details['mobile'];} ?>" > <br>
            
        </div>
        <div class="mb-3 mx-5">
        <label class="form-label" for="name">Aadhar Number</label>
        <input required class="form-control" type="text" name="aadhar" id="aadhar" value="<?php if ($details['aadhar'] == "") {echo "Enter Aadhar Number";} else {echo $details['aadhar'];} ?>" > <br>

        </div>

        <div class="mb-3 mx-5">
        <label class="form-label" for="name">Nationality</label>
        <input required class="form-control" type="text" name="nationality" id="nationality" value="<?php if ($details['nationality'] == "") {echo "Enter Nationality";} else {echo $details['nationality'];} ?>" > <br>

        </div>
       
            
        
        
        <div class="container text-center">
            <button class="btn btn-primary my-2" id="save">Submit</button>
        </div>
        
    </form>
</div>
    <!-- Bootstrap JS file CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <?php include '../../partials/_footer.php';?>
</body>

</html>