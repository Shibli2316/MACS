<?php
// The session for the logged in user is relayed to this page using the session start tag. In case the session is not started it will start the session.
include '../includes/header.php';


// Assigning usernme of the logged in user into a variable for easy access.
$user = $_SESSION['username'];
$id=$_GET['id'];

// Including the connection file of the database.
include "../../partials/_dbconnect.php";

$sql = "SELECT
*
FROM teachers where t_id='$id';";
$result = mysqli_query($conn, $sql);

// Storing it into an associative array called details.
$details = mysqli_fetch_assoc($result);
?>

<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800">Manage Teachers</h1>


<div class="container text-center">

    <?php
            if ($details['t_img'] == "") {
                echo "<label class='form-label' for='name'>Upload profile image</label>";
            } else {
                echo "<img src='" . $details['t_img'] . "' height='100px' width='100px' style='border-radius:50%;' alt='profile image'><br>";
                echo "Profile Image";
            }
            ?>
            <br>
        </div>
            <hr>

            <div class="mb-3 mx-5">
            <label class='form-label' for="name">First Name</label>
            <input  class="form-control" type="text" name="f_name" id="f_name" readonly placeholder="<?php if ($details['f_name'] == "") {echo "Enter first name";} else {echo $details['f_name'];} ?>"> <br>

            </div>

            <div class="mb-3 mx-5">
            <label class='form-label' for="name">Last Name</label>
            <input  class="form-control" type="text" name="l_name" id="l_name" readonly placeholder="<?php if ($details['l_name'] == "") {echo "Enter last name";} else {echo $details['l_name'];} ?>"> <br>

            </div>

            <div class="mb-3 mx-5">
            <label class='form-label' for="name">Username</label>
            <input  class="form-control" type="text" name="u_name" id="u_name" readonly placeholder="<?php echo $details['username']; ?>"> <br>

            </div>

            <div class="mb-3 mx-5">
            <label class='form-label' for="email">Email</label>
            <input  class="form-control" type="email" name="email" id="email" readonly placeholder="<?php if ($details['email'] == "") {echo "Enter email";} else {echo $details['email'];} ?>"> <br>

            </div>

            <div class="mb-3 mx-5">
            <label class='form-label' for="name">Teacher ID</label>
            <input  class="form-control" type="text" name="teacherID" id="teacherID" readonly placeholder="<?php if ($details['teacherID'] == "") {echo "Enter Employee ID";} else {echo $details['teacherID'];} ?>"> <br>

            </div>
</div>

<?php
include '../includes/footer.php';
?>