<?php
// The session for the logged in user is relayed to this page using the session start tag. In case the session is not started it will start the session.


// Assigning usernme of the logged in user into a variable for easy access.
include '../includes/header.php';
$user = $_SESSION['username'];

// Including the connection file of the database.
include "../../partials/_dbconnectAdmin.php"
?>

    <?php

    // Fetching the data of the logged in user.
    $sql = "SELECT * FROM `admin` WHERE username = '$user'";
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
        
        // The updating query being executed.
        $updatingDetails = "UPDATE `admin` SET `a_img`='$folder', `name` = '$f_name' WHERE `admin`.`username` = '$user';";
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

<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Edit Profile</h1>


    <!-- In this form the input fields are editable and the details of the user if exists has been displayed in placeholder. The user can further use the update button to update his/her details. -->
  
    <div class="container">

    
    <form action="edit.php?name=<?php echo $user;?>" class="mx-2 my-2" method="post" enctype="multipart/form-data">

<div class="container text-center">

    <?php 
        if($details['a_img'] == ""){
            echo "<label class='form-label' for='name'>Upload profile image</label>";
            echo "<input class='form-control' type='file' name='upload'>";
        }
        else{
            echo "<img src='".$details['a_img']."' height='100px' width='100px' style='border-radius:50%;' alt='profile image'><br>";
            echo "<label class='form-label' for='name'>Change profile image</label>";
            // IMPORTANT
            // THE VALUE TAG IS NOT WORKING AS EXPECTED
            echo "<input class='form-control' type='file' name='upload' value='".$details['a_img']."' alt=profile image'>";
        }
        ?>
        </div>
    <br>
    <hr>

    <div class="mb-3 mx-5">
        <label class='form-label' for="name">Name</label>
        <input class='form-control' type="text" name="f_name" id="f_name" value="<?php if ($details['name'] == "") {echo "Enter First Name";} else {echo $details['name'];} ?>"> <br>

        </div>
        <br>
        
        <div class="mb-3 mx-5">
        <label class='form-label' for="name">Username</label>
        <input class='form-control' type="text" name="u_name" id="u_name" readonly placeholder="<?php echo $details['username']; ?>"> <br>

        </div>
        <br>
        <div class="container text-center">

            <input type="submit" value="Save" class="btn btn-success">
        </div>

    </form>

    </div>

    <!-- Bootstap JS file CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </div>
<?php
include '../includes/footer.php';
?>