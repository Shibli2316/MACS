<?php
// The session class='form-label' for the logged in user is relayed to this page using the session start tag. In case the session is not started it will start the session.


// Assigning usernme of the logged in user into a variable class='form-label' for easy access.

// Including the connection file of the database.
include "../../partials/_dbconnectAdmin.php"
?>
<?php
include '../includes/header.php';
$user = $_SESSION['username'];
?>


<?php

// Navbar is required before moving forward

// Fetching the data of the logged in user.
$sql = "SELECT * FROM `admin` WHERE username = '$user'";
$result = mysqli_query($conn, $sql);

// Storing it into an associative array called details.
$details = mysqli_fetch_assoc($result);
?>


<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Admin's Profile</h1>

    <!-- In this form the input fields are read-only and the details of the user if exists has been displayed in placeholder. The user can further use the update button to update his/her details. -->
    <div class="container">


        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="mx-2 my-2" method="post" enctype="multipart/form-data">
<div class="container text-center">

    <?php
            if ($details['a_img'] == "") {
                echo "<label class='form-label' for='name'>Upload profile image</label>";
            } else {
                echo "<img src='" . $details['a_img'] . "' height='250px' width='250px' style='border-radius:50%;' alt='profile image'><br>";
                echo "Profile Image";
            }
            ?>
            </div>
            <hr>
            <br>
            
<div class="mb-3 mx-5">

    <label class='form-label' for="name">Name</label>
    <input class="form-control" type="text" name="name" id="name" readonly placeholder="<?php if ($details['name'] == "") {echo "Enter name";} else {echo $details['name'];} ?>"> <br>
</div>
            
<div class="mb-3 mx-5">

    <label class='form-label' for="name">Username</label>
    <input class="form-control" type="text" name="u_name" id="u_name" readonly placeholder="<?php echo $details['username']; ?>"> <br>
</div>
<div class="container text-center">

    <!-- The update button directing the user to the update page from where he or she can update his/her profile -->
    <?php
            echo "<a href='edit.php?name=" . $details['username'] . "'><input type='button' value='Update' class='btn btn-primary'></a>"
            ?>
            </div>

        </form>

    </div>

    <!-- Bootstap JS file CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</div>
<?php
include '../includes/footer.php';
?>