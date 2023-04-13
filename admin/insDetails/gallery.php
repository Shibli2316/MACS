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
    <h1 class="h3 mb-4 text-gray-800">Gallery of the department</h1>


this will have the list of photos and also the existing images

</div>
<?php
include '../includes/footer.php';
?>