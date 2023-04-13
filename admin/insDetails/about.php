<?php
// The session for the logged in user is relayed to this page using the session start tag. In case the session is not started it will start the session.
session_start();

// Assigning usernme of the logged in user into a variable for easy access.
$user = $_SESSION['username'];

// Including the connection file of the database.
include "../../partials/_dbconnectAdmin.php"
?>

<?php
include '../includes/header.php';
?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Write something about the department</h1>

    <?php
    $sql = "SELECT * FROM details;";
    $run = mysqli_query($conn, $sql);
    if (mysqli_num_rows($run) > 0) {
        while ($row = mysqli_fetch_assoc($run)) {
            echo "
            <p>" . $row['about'] . "</p>
            <img src=" . $row['imgpath'] . " alt='image'style='height: 100px; width: 100px;'/>
            <p>" . $row['detail'] . "</p>
            <hr>
            ";
        }
    }

    ?>


    <div class="container">

        <a href="aboutIns.php" class="btn btn-primary">Submit</a>
    </div>

</div>
<?php
include '../includes/footer.php';
?>