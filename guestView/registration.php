<?php
$showAlert = false;
$showError = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "../partials/_dbconnectAdmin.php";
    $username = $_POST["username"];
    $username = mysqli_real_escape_string($conn, $username);
    $name = $_POST['name'];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $existSql = "SELECT * FROM `admin` WHERE username= '$username'";
    $result = mysqli_query($conn, $existSql);
    
    $numExistRows = mysqli_num_rows($result);
    if (strlen($password) < 5) {
        echo '<div class="alert alert-danger alert-success fade show" role="alert">
        <strong>Error! </strong>Password too Short <br>Click <a href="signUp.php">here</a> to try again
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    } else {
        if ($numExistRows > 0) {
            $showError = "Username already exists";
        } else {
            if (($password == $cpassword)) {
                // $hash=password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO admin (name, username, pass) VALUES ('$username', '$name', '$password')";

                $result = mysqli_query($conn, $sql);
                if ($result) {
                    $_SESSION['username'] = $username;


                    $showAlert = true;
                }
            } else {
                $showError = "Passwords do not match";
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi' crossorigin='anonymous'>
    <!-- JavaScript Bundle with Popper -->
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js' integrity='sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3' crossorigin='anonymous'></script>
    <title>Document</title>
</head>

<body>

</body>

</html>

<?php

if ($showAlert) {
    echo '<div class="alert alert-success alert-success fade show" role="alert">
    <strong>Success!</strong> Your account has been created. 
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
if ($showError) {
    echo '<div class="alert alert-danger alert-success fade show" role="alert">
    <strong>Error!</strong>' . $showError . ' <br>Click <a href="signUp.php">here</a> to try again
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}

?>