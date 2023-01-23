<!-- NEED TO KEEP TRACK OF STUDENT ID -->


<?php
// The session for the logged in user is relayed to this page using the session start tag. In case the session is not started it will start the session.
session_start();

// Assigning usernme of the logged in user into a variable for easy access.
$user = $_SESSION['username'];

// Including the connection file of the database.
include "../partials/_dbconnect.php"
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
require "../partials/_nav.php";

// Fetching the data of the logged in user.
$sql = "SELECT * FROM `students` WHERE username = '$user'";
$result = mysqli_query($conn, $sql);

// Storing it into an associative array called details.
$details = mysqli_fetch_assoc($result);

// If the request method of the form is post the data to be entered into the database are stored in various variables.
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        
    $filename = $_FILES["upload"]["name"];
    $tempname = $_FILES["upload"]["tmp_name"];

    $folder = "../images/".$filename;
    move_uploaded_file($tempname, $folder);

        $f_name = $_POST['f_name'];
        $l_name = $_POST['l_name'];
        $email = $_POST['email'];
        $exam = $_POST['exam'];
        $form_no = $_POST['form_no'];
        $rank = $_POST['rank'];

// The updating query being executed.
        $updatingDetails = "UPDATE `students` SET `s_img`='$folder',`f_name` = '$f_name', `l_name` = '$l_name', `email` = '$email', `exam` = '$exam', `form_no` = '$form_no', `rank` = '$rank'  WHERE `students`.`username` = '$user';";
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

<!-- If the data of the user is present it is being fetched and dispplayed into the respected fields from where the user can update it if needed. The username cannot be updated -->
    <form action="updateProfile.php?name=<?php echo $user;?>" class="mx-2 my-2" method="post" enctype="multipart/form-data">

    <?php 
        if($details['s_img'] == ""){
            echo "<label for='name'>Upload profile image</label>";
            echo "<input type='file' name='upload'>";
        }
        else{
            echo "<img src='".$details['s_img']."' height='100px' width='100px' style='border-radius:50%;'><br>";
            echo "<label for='name'>Change profile image</label>";
            // IMPORTANT
            // THE VALUE TAG IS NOT WORKING AS EXPECTED. The image should be pre selected.
            echo "<input type='file' name='upload' value='".$details['s_img']."' alt='profile image'>";
        }
    ?>
    <br>
    <hr>

        <label for="name">First Name</label>
        <input type="text" name="f_name" id="f_name" value="<?php if ($details['f_name'] == "") {echo "Enter First name";} else {echo $details['f_name'];} ?>"> <br>
        <hr>
        
        <label for="name">Last Name</label>
        <input type="text" name="l_name" id="l_name" value="<?php if ($details['l_name'] == "") {echo "Enter Last Name";} else {echo $details['l_name'];} ?>"> <br>
        <hr>
        
        <label for="name">Username</label>
        <input type="text" name="u_name" id="u_name" readonly placeholder="<?php echo $details['username']; ?>"> <br>
        <hr>
        
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<?php if ($details['email'] == "") {echo "Enter Email";} else {echo $details['email'];} ?>"> <br>
        <hr>
        
        <label for="name">Exam</label>
        <input type="text" name="exam" id="exam" value="<?php if ($details['exam'] == "") {echo "Enter Exam";} else {echo $details['exam'];} ?>"> <br>
        <hr>
        
        <label for="name">Application Number</label>
        <input type="text" name="form_no" id="form_no" value="<?php if ($details['form_no'] == "") {echo "Enter Application Number";} else {echo $details['form_no'];} ?>"> <br>
        <hr>
        
        <label for="name">Rank</label>
        <input type="text" name="rank" id="rank" value="<?php if ($details['rank'] == "") {echo "Enter your rank";} else {echo $details['rank'];} ?>"> <br>
        <hr>
        
        
        <input type="submit" value="Save">
        
    </form>

    <!-- Bootstrap JS file CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>