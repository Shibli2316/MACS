<?php
// The session for the logged in user is relayed to this page using the session start tag. In case the session is not started it will start the session.
// session_start();

include '../includes/header.php';
// Assigning usernme of the logged in user into a variable for easy access.
$user = $_SESSION['username'];

// Including the connection file of the database.
include "../../partials/_dbconnectAdmin.php";

?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Write something about the department</h1>

    <?php
    $sql = "SELECT * FROM details where id=6;";
    $run = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($run);
    echo "
    <div class='container text-center'>
    <img src=" . $row['imgpath'] . " alt='image'style='height: 300px; width: 300px;'/>
    <br><hr>

    
    <p>" . $row['about'] . "</p>
    <p>" . $row['detail'] . "</p>
    </div>
            <hr>
            ";
        
    

    ?>

    

</div>
<?php
include '../includes/footer.php';
?>