<?php
// The session for the logged in user is relayed to this page using the session start tag. In case the session is not started it will start the session.
session_start();

// Assigning usernme of the logged in user into a variable for easy access.
$user = $_SESSION['username'];

// Including the connection file of the database.
include "../../partials/_dbconnectAdmin.php"
?>


<?php

// Navbar is required before moving forward

// Fetching the data of the logged in user.
$sql = "SELECT * FROM `admin` WHERE username = '$user'";
$result = mysqli_query($conn, $sql);

// Storing it into an associative array called details.
$details = mysqli_fetch_assoc($result);
?>

<?php
include '../includes/header.php';
?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Admin's Profile</h1>

    <!-- In this form the input fields are read-only and the details of the user if exists has been displayed in placeholder. The user can further use the update button to update his/her details. -->
    <div class="container">


        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="mx-2 my-2" method="post" enctype="multipart/form-data">

            <?php
            if ($details['a_img'] == "") {
                echo "<label for='name'>Upload profile image</label>";
            } else {
                echo "<img src='" . $details['a_img'] . "' height='100px' width='100px' style='border-radius:50%;' alt='profile image'><br>";
                echo "Profile Image";
            }
            ?>
            <br>
            <hr>

            <label for="name">Name</label>
            <input type="text" name="name" id="name" readonly placeholder="<?php if ($details['name'] == "") {echo "Enter name";} else {echo $details['name'];} ?>"> <br>
            <hr>

            <label for="name">Username</label>
            <input type="text" name="u_name" id="u_name" readonly placeholder="<?php echo $details['username']; ?>"> <br>

            <!-- The update button directing the user to the update page from where he or she can update his/her profile -->
            <?php
            echo "<a href='edit.php?name=" . $details['username'] . "'><input type='button' value='Update'></a>"
            ?>

        </form>

    </div>

    <!-- Bootstap JS file CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</div>
<?php
include '../includes/footer.php';
?>