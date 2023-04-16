
<?php
// The session for the logged in user is relayed to this page using the session start tag. In case the session is not started it will start the session.


// Including the connection file of the database.
include "../../partials/_dbconnectAdmin.php";

?>


<?php
include '../includes/header.php';
$user = $_SESSION['username'];
$id= $_GET['id'];

   // Fetching the data of the logged in user.
   $sql = "DELETE FROM `notice` WHERE id = '$id'";
   

   // Storing it into an associative array called details.
   $run = mysqli_query($conn, $sql);
        if (!$run) {
            echo "Error while updating records";
        } else {
            echo "<script>alert('Your records has been deleted successfully!!!')</script>";

            ?>

            <!-- Redirecting to profile page -->
                        <meta http-equiv="refresh" content="0; url = viewNotice.php" />
                <?php
                    }
                
                ?>
