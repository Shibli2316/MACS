<!-- NEED TO KEEP TRACK OF STUDENT ID -->


<?php
// The session for the logged in user is relayed to this page using the session start tag. In case the session is not started it will start the session.
session_start();

// Assigning usernme of the logged in user into a variable for easy access.
$user = $_SESSION['username'];
$idUser = $_SESSION['s_id'];
// $user = 'shibli';
// $idUser = 1;

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
    include "../../partials/_studNav.php";
    // Fetching the data of the logged in user.
    $sql = "SELECT * FROM `s_specifics` WHERE id = '$idUser'";
    $result = mysqli_query($conn, $sql);

    // Storing it into an associative array called details.
    $details = mysqli_fetch_assoc($result);
    ?>

<div class="container text-center card-header my-4">
    <h3>Required Images</h3>
</div>

    <!-- In this fprm the input fields are read-only and the details of the user if exists has been displayed in placeholder. The user can further use the update button  class='btn btn-primary'to update his/her details. -->
    <div class="container border row text-center mx-auto">
<div class="col-md-4 my-4">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="mx-2 my-2" method="post" enctype="multipart/form-data">
    
<?php 
        if($details['s_img'] == ""){
            echo "<label for='name'>Upload profile image</label>";
        }
        else{
            echo "<img src='".$details['s_img']."' height='100px' width='100px' style='border-radius:50%;' alt='profile image'><br>";
            echo "Profile Image";
        }
    ?>
    <br>
    <?php
        echo "<a href='updateImage.php?user=".$idUser."'><input type='button' class='btn btn-primary' value='Update'></a>"
        ?>


</form>
    </div>
<div class="col-md-4 my-4">

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="mx-2 my-2" method="post" enctype="multipart/form-data">
        
    <?php 
        if($details['s_sign'] == ""){
            echo "<label for='name'>Upload signature</label>";
        }
        else{
            echo "<img src='".$details['s_sign']."' height='100px' width='100px' style='border-radius:50%;' alt='Student Signature'><br>";
            echo "Student Signature";
        }
        ?>
    <br>
    <?php
        echo "<a href='updateSign.php?user=".$idUser."'><input type='button' class='btn btn-primary' value='Update'></a>"
        ?>


</form>
</div>

<div class="col-md-4 my-4">
    
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="mx-2 my-2" method="post" enctype="multipart/form-data">

    <?php 
        if($details['s_thumb'] == ""){
            echo "<label for='name'>Upload thumb impression</label>";
        }
        else{
            echo "<img src='".$details['s_thumb']."' height='100px' width='100px' style='border-radius:50%;' alt='Thumb Impression'><br>";
            echo "Thumb Impression";
        }
        ?>
    <br>
    
    <!-- The update button  class='btn btn-primary'directing the user to the update page from where he or she can update his/her profile -->
    <?php
        echo "<a href='updateThumb.php?user=".$idUser."'><input type='button' class='btn btn-primary' value='Update'></a>"
        ?>


</form>
</div>

</div>
    <!-- Bootstap JS file CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <?php include '../../partials/_footer.php';?>