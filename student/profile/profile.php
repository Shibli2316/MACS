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
    ?>
<?php include '../../partials/_studNav.php';?>

<div class="container border text-center my-4">
    <h1>
        Welcome student: <?php echo ucfirst($user);?>
    </h1>
</div>

    <!-- In this fprm the input fields are read-only and the details of the user if exists has been displayed in placeholder. The user can further use the update button to update his/her details. -->
    <div class="container border">
<div class=" text-center card-header">
    <h3>Your Profile</h3>
</div>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="mx-2 my-2" method="post" enctype="multipart/form-data">
            <div class="container text-cente">

                <?php 
        if($details['s_img'] == ""){
            echo "<label for='name'>Upload profile image</label>";
        }
        else{
            echo "<img src='".$details['s_img']."' height='100px' width='100px' style='border-radius:50%;' alt='profile image'><br>";
            echo "Profile Image";
        }
        ?>
        </div>
    <br>
    <hr>
<div class="mb-3 mx-5">

    <label class="form-label" for="name">First Name</label>
    <input class="form-control" type="text" name="f_name" id="f_name" placeholder="<?php if ($details['f_name'] == "") {echo "Enter First Name";} else {echo $details['f_name'];} ?>" readonly> <br>
    
</div>
        <div class="mb-3 mx-5">

            <label class="form-label" for="name">Last Name</label>
            <input class="form-control" type="text" name="l_name" id="l_name" placeholder="<?php if ($details['l_name'] == "") {echo "Enter Last Name";} else {echo $details['l_name'];} ?>" readonly> <br>
            
        </div>
        <div class="mb-3 mx-5">

            <label class="form-label" for="name">Username</label>
            <input class="form-control" type="text" name="u_name" id="u_name" readonly placeholder="<?php echo $details['username']; ?>"> <br>
            
        </div>
        <div class="mb-3 mx-5">

            <label class="form-label" for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email" placeholder="<?php if ($details['email'] == "") {echo "Enter Email";} else {echo $details['email'];} ?>" readonly> <br>
            
        </div>
        <div class="mb-3 mx-5">

            <label class="form-label" for="name">Exam</label>
            <input class="form-control" type="text" name="exam" id="exam" placeholder="<?php if ($details['exam'] == "") {echo "Enter name";} else {echo $details['exam'];} ?>" readonly> <br>
            
        </div>
<div class="mb-3 mx-5">

    <label class="form-label" for="name">Application Number</label>
    <input class="form-control" type="text" name="form_no" id="form_no" placeholder="<?php if ($details['form_no'] == "") {echo "Enter Application Number";} else {echo $details['form_no'];} ?>" readonly> <br>
    
</div>
        <div class="mb-3 mx-5">

            <label class="form-label" for="name">Rank</label>
            <input class="form-control" type="text" name="rank" id="rank" placeholder="<?php if ($details['rank'] == "") {echo "Enter your Rank";} else {echo $details['rank'];} ?>" readonly> <br>
            
        </div>
        
        
        <div class="container text-center">

            <!-- The update button directing the user to the update page from where he or she can update his/her profile -->
            <?php
        echo "<a href='updateProfile.php?name=".$details['username']."'><input type='button' value='Update' class='btn btn-primary'></a>"
        ?>

</div>
    </form>
    
</div>
    <!-- Bootstap JS file CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <?php include '../../partials/_footer.php';?>
</body>

</html>