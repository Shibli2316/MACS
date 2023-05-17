
<?php
include "../partials/_dbconnectAdmin.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
$id=$_GET['a_id'];
$verify=$_POST['verify'];
// The updating query being executed.
        $updatingDetails = "UPDATE `admin` SET `verified`='$verify' WHERE `admin`.`a_id` = '$id';";
        $run = mysqli_query($conn, $updatingDetails);
        if (!$run) {
            echo "Error while updating records";
        } else {
            echo "<script>alert('Your records has been updated successfully!!!')</script>";


    ?>

<!-- Redirecting to profile page -->
            <meta http-equiv="refresh" content="0; url = home.php" />
    <?php
        }
    }
    ?>