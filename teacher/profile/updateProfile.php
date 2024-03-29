<?php
// The session for the logged in user is relayed to this page using the session start tag. In case the session is not started it will start the session.
session_start();

// Assigning usernme of the logged in user into a variable for easy access.
$user = $_SESSION['username'];

// Including the connection file of the database.
include "../../partials/_dbconnect.php"
?>

    <?php

    // Navbar is required before moving forward
    require "../includes/header.php";

    // Fetching the data of the logged in user.
    $sql = "SELECT * FROM `teachers` WHERE username = '$user'";
    $result = mysqli_query($conn, $sql);
    
    // Storing it into an associative array called details.
    $details = mysqli_fetch_assoc($result);
    
    // If the request method of the form is post the data to be entered into the database are stored in various variables.
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $filename = $_FILES["upload"]["name"];
    $tempname = $_FILES["upload"]["tmp_name"];

    $folder = "../../imagesT/".$filename;
    move_uploaded_file($tempname, $folder);
        $f_name = $_POST['f_name'];
        $l_name = $_POST['l_name'];
        $email = $_POST['email'];
        $teacherID = $_POST['teacherID'];
        
        // The updating query being executed.
        $updatingDetails = "UPDATE `teachers` SET `t_img`='$folder', `f_name` = '$f_name', `l_name` = '$l_name', `email` = '$email', `teacherID` = '$teacherID' WHERE `teachers`.`username` = '$user';";
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

    <!-- In this form the input fields are editable and the details of the user if exists has been displayed in placeholder. The user can further use the update button to update his/her details. -->
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <form action="updateProfile.php?name=<?php echo $user;?>" class="mx-2 my-2" method="post" enctype="multipart/form-data">


    <div class="container text-center">
<div class="mb-3 mx-5">

    <?php 
        if($details['t_img'] == ""){
            echo "<label class='form-label' for='name'>Upload profile image</label>";
            echo "<input  type='file' name='upload'>";
        }
        else{
            echo "<img src='".$details['t_img']."' height='100px' width='100px' style='border-radius:50%;' alt='profile image'><br>";
            echo "<label class='form-label' for='name'>Change profile image</label>";
            // IMPORTANT
            // THE VALUE TAG IS NOT WORKING AS EXPECTED
            echo "<input class='form-control' type='file' name='upload' value='".$details['t_img']."' alt=profile image'>";
        }
        ?>
    <br>
    <hr>
</div>
    </div>
    
    <div class="mb-3 mx-5">
    <label class='form-label' for="name">First Name</label>
        <input class='form-control' type="text" name="f_name" id="f_name" value="<?php if ($details['f_name'] == "") {echo "Enter First Name";} else {echo $details['f_name'];} ?>"> <br>

        </div>
        
        <div class="mb-3 mx-5">
        <label class='form-label' for="name">Last Name</label>
        <input class='form-control' type="text" name="l_name" id="l_name" value="<?php if ($details['l_name'] == "") {echo "Enter Last Name";} else {echo $details['l_name'];} ?>"> <br>

        </div>
        
        <div class="mb-3 mx-5">
        <label class='form-label' for="name">Username</label>
        <input class='form-control' type="text" name="u_name" id="u_name" readonly placeholder="<?php echo $details['username']; ?>"> <br>

        </div>
        
        <div class="mb-3 mx-5">
        <label class='form-label' for="email">Email</label>
        <input class='form-control' type="email" name="email" id="email" value="<?php if ($details['email'] == "") {echo "Enter Email";} else {echo $details['email'];} ?>"> <br>

        </div>
        
        <div class="mb-3 mx-5">
        <label class='form-label' for="name">Teacher ID</label>
        <input class='form-control' type="text" name="teacherID" id="teacherID" value="<?php if ($details['teacherID'] == "") {echo "Enter Employee ID";} else {echo $details['teacherID'];} ?>"> <br>

        </div>
        <div class="container text-center mb-3 mx-5">

            <input type="submit" value="Save" class="btn btn-success">
        </div>

    
    </form>
<?php
include '../includes/footer.php';
?>
    </main>

    <!-- Bootstap JS file CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>