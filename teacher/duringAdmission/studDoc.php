<?php
// The session for the logged in user is relayed to this page using the session start tag. In case the session is not started it will start the session.
session_start();

// Assigning usernme of the logged in user into a variable for easy access.
$user = $_SESSION['username'];

// Including the connection file of the database.
include "../../partials/_dbconnect.php";

// Getting the id from the URL
$id=$_GET['id'];
// echo $id;

$query = "SELECT * FROM students WHERE s_id=$id;";
$result = mysqli_query($conn, $query);

if($result && (mysqli_num_rows($result)==1)){
  $res = mysqli_fetch_assoc($result);
}else{
//   echo "Failed";
}
?>


<?php 
include '../includes/header.php';
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<?php

    // Navbar is required before moving forward
    
    // Fetching the data of the logged in user.
    $sql = "SELECT * FROM `s_specifics` WHERE s_id = '$id'";
    $result = mysqli_query($conn, $sql);

    // Storing it into an associative array called details.
    $details = mysqli_fetch_assoc($result);
    ?>

<div class="container text-center card-header my-4">
    <h3>View Images</h3>
</div>

    <!-- In this fprm the input fields are read-only and the details of the user if exists has been displayed in placeholder. The user can further use the update button  class='btn btn-primary'to update his/her details. -->
    <div class="container border row text-center mx-auto">
<div class="col-md-4 my-4">

    
<?php 
        if($details['s_img'] == ""){
            echo "<label for='name'>Profile image</label>";
        }
        else{
            echo "<img src='".$details['s_img']."' height='100px' width='100px' style='border-radius:50%;' alt='profile image'><br>";
            echo "Profile Image";
        }
    ?>
    <br>


    </div>
<div class="col-md-4 my-4">

   
        
    <?php 
        if($details['s_sign'] == ""){
            echo "<label for='name'>Student signature</label>";
        }
        else{
            echo "<img src='".$details['s_sign']."' height='100px' width='100px' style='border-radius:50%;' alt='Student Signature'><br>";
            echo "Student Signature";
        }
        ?>
    <br>




</div>

<div class="col-md-4 my-4">
    
    

    <?php 
        if($details['s_thumb'] == ""){
            echo "<label for='name'>Student thumb impression</label>";
        }
        else{
            echo "<img src='".$details['s_thumb']."' height='100px' width='100px' style='border-radius:50%;' alt='Thumb Impression'><br>";
            echo "Thumb Impression";
        }
        ?>
    <br>

</div>

</div>
    <!-- Bootstap JS file CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</main>

<?php
include '../includes/footer.php';
?>