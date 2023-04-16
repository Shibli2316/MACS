
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
   $sql = "SELECT * FROM `notice` WHERE id = '$id'";
   $result = mysqli_query($conn, $sql);

   // Storing it into an associative array called details.
   $details = mysqli_fetch_assoc($result);

?>


<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Update Notice</h1>

    <div class="container">

<form action="updateNotice.php?id=<?=$id?>" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="name" class="form-label">Title of the notice</label>
        <input type="text" name="name" value="<?=$details['name']?>" class="form-control" id="name" >
    </div>
    <div class="mb-3">
        <label for="about" class="form-label">Description</label>
        <textarea class="form-control"  id="about" name="about" cols="30" rows="10" value="<?=$details['about']?>" > </textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
    </div>

</div>
<?php
include '../includes/footer.php';
?>

<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
    

        $name = $_POST['name'];
        $about = $_POST['about'];

    
        $sql = "UPDATE `notice` set `name`='$name', `about`= '$about' WHERE id='$id';";

        $run = mysqli_query($conn, $sql);
        if (!$run) {
            echo "Error while updating records";
        } else {
            echo "<script>alert('Your records has been updated successfully!!!')</script>";

            ?>

            <!-- Redirecting to profile page -->
                        <meta http-equiv="refresh" content="0; url = viewNotice.php" />
                <?php
                    }
                }
                ?>
