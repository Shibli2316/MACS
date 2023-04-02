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
    $sql = "SELECT * FROM `teachers` WHERE username = '$user'";
    $result = mysqli_query($conn, $sql);

    // Storing it into an associative array called details.
    $details = mysqli_fetch_assoc($result);
    ?>

<div class="container">
    <h1>
        Welcome teacher: <?php echo ucfirst($user);?>
    </h1>
</div>

    <!-- In this form the input fields are read-only and the details of the user if exists has been displayed in placeholder. The user can further use the update button to update his/her details. -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="mx-2 my-2" method="post" enctype="multipart/form-data">

    <?php 
        if($details['t_img'] == ""){
            echo "<label for='name'>Upload profile image</label>";
        }
        else{
            echo "<img src='".$details['t_img']."' height='100px' width='100px' style='border-radius:50%;' alt='profile image'><br>";
            echo "Profile Image";
        }
    ?>
    <br>
    <hr>

        <label for="name">First Name</label>
        <input type="text" name="f_name" id="f_name" readonly placeholder="<?php if ($details['f_name'] == "") {echo "Enter first name";} else {echo $details['f_name'];} ?>"> <br>
        <hr>
        
        <label for="name">Last Name</label>
        <input type="text" name="l_name" id="l_name" readonly placeholder="<?php if ($details['l_name'] == "") {echo "Enter last name";} else {echo $details['l_name'];} ?>"> <br>
        <hr>
        
        <label for="name">Username</label>
        <input type="text" name="u_name" id="u_name" readonly placeholder="<?php echo $details['username']; ?>"> <br>
        <hr>
        
        <label for="email">Email</label>
        <input type="email" name="email" id="email" readonly placeholder="<?php if ($details['email'] == "") {echo "Enter email";} else {echo $details['email'];} ?>"> <br>
        <hr>
        
        <label for="name">Teacher ID</label>
        <input type="text" name="teacherID" id="teacherID" readonly placeholder="<?php if ($details['teacherID'] == "") {echo "Enter Employee ID";} else {echo $details['teacherID'];} ?>"> <br>
        <hr>
    
        <!-- The update button directing the user to the update page from where he or she can update his/her profile -->
        <?php
        echo "<a href='updateProfile.php?name=".$details['username']."'><input type='button' value='Update'></a>"
        ?>

    </form>

    <!-- Bootstap JS file CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>