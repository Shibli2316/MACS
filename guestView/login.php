<!-- This page should be the login route for admins of institute. -->
<?php
// By default the variables for login and error are false that means the user is not logged in and there is no error
$login = false;
$showError = false;

// Check if the request method of the form is post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Includes the db connect file that contains the connectivity for the database.
    include "../partials/_dbconnect.php";

    // Taking input and assigning variables to it
    $username = $_POST["username"];
    $password = $_POST["password"];

    // This is done to remove any unanted charachter that might break the code in the future. It removes all the special chars.
    $username = mysqli_real_escape_string($conn, $username);

    // The query that is to be executed.
    $sql = "SELECT * FROM admin where username='$username'";

    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    // Only if there is one entry with the given username only then check the password. This reduces the chance of sql injections. 
    if ($num == 1) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($password == $row['pass']) {
                $login = true;

                // Starting the session and storing the required variables in the associative array
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;

                // Once logged in the user is redirected to the page given below
                header("location: ../instituteView/home.php");
            }

            // Show error if the password is incorrect.
            else {
                $showError = "Invalid Credentils";
            }
        }
    } else {
        $showError = "Invalid Credentils";
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS file CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Log In</title>
</head>

<body>


    <?php
    require "../partials/_nav.php";
    // The modal that apears if there is any error in the credentials entered by the user.
    if ($showError) {
        echo '<div class="alert alert-danger alert-success fade show" role="alert">
        <strong>Error!</strong>' . $showError . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    ?>

    <div class="container">
        <h1 class="text-center">
            Login to our website
        </h1>

        <form action="login.php" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>

    <!-- Bootstrap JS file CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>