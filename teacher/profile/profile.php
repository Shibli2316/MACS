<?php
// The session class='form-label' for the logged in user is relayed to this page using the session start tag. In case the session is not started it will start the session.
session_start();

// Assigning usernme of the logged in user into a variable class='form-label' for easy access.
$user = $_SESSION['username'];

// Including the connection file of the database.
include "../../partials/_dbconnect.php"
?>

<body>
    <?php

    // Navbar is required before moving forward
    require "../includes/header.php";

    // Fetching the data of the logged in user.
    $sql = "SELECT * FROM `teachers` WHERE username = '$user'";
    $result = mysqli_query($conn, $sql);

    // Storing it into an associative array called details.
    $details = mysqli_fetch_assoc($result);
    ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <!-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"> -->
        <!-- <h1 class="h2">Dashboard</h1> -->
        <!-- </div> -->

        <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->



        <div class="container">
            <h1>
                Welcome teacher: <?php echo ucfirst($user); ?>
            </h1>
        </div>

        <!-- In this form the input fields are read-only and the details of the user if exists has been displayed in placeholder. The user can further use the update button to update his/her details. -->
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="mx-2 my-2" method="post" enctype="multipart/form-data">

            <?php
            if ($details['t_img'] == "") {
                echo "<label class='form-label' for='name'>Upload profile image</label>";
            } else {
                echo "<img src='" . $details['t_img'] . "' height='100px' width='100px' style='border-radius:50%;' alt='profile image'><br>";
                echo "Profile Image";
            }
            ?>
            <br>
            <hr>

            <label class='form-label' for="name">First Name</label>
            <input  class="form-control" type="text" name="f_name" id="f_name" readonly placeholder="<?php if ($details['f_name'] == "") {echo "Enter first name";} else {echo $details['f_name'];} ?>"> <br>
            <hr>

            <label class='form-label' for="name">Last Name</label>
            <input  class="form-control" type="text" name="l_name" id="l_name" readonly placeholder="<?php if ($details['l_name'] == "") {echo "Enter last name";} else {echo $details['l_name'];} ?>"> <br>
            <hr>

            <label class='form-label' for="name">Username</label>
            <input  class="form-control" type="text" name="u_name" id="u_name" readonly placeholder="<?php echo $details['username']; ?>"> <br>
            <hr>

            <label class='form-label' for="email">Email</label>
            <input  class="form-control" type="email" name="email" id="email" readonly placeholder="<?php if ($details['email'] == "") {echo "Enter email";} else {echo $details['email'];} ?>"> <br>
            <hr>

            <label class='form-label' for="name">Teacher ID</label>
            <input  class="form-control" type="text" name="teacherID" id="teacherID" readonly placeholder="<?php if ($details['teacherID'] == "") {echo "Enter Employee ID";} else {echo $details['teacherID'];} ?>"> <br>
            <hr>

            <!-- The update button directing the user to the update page from where he or she can update his/her profile -->
            <?php
            echo "<a href='updateProfile.php?name=" . $details['username'] . "'><input type='button' value='Update'></a>"
            ?>

        </form>

    </main>
    <!-- Bootstap JS file CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <?php
    include '../../teacher/includes/footer.php';
    ?>