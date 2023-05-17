<?php
$showError = false;

include "../partials/_dbconnectAdmin.php";

$username = $_POST['username'];
$pass = $_POST['password'];
$username = mysqli_real_escape_string($conn, $username);

$sql = "SELECT * FROM admin WHERE username = '$username'";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
   

if ($num == 1){
    while($row=mysqli_fetch_assoc($result)){
        if ($pass == $row['pass']){

            session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['username']=$username;
            
            header('location: home.php');
        }
        else{
            $showError = "Invalid Password";
        }
    }
} 
else{
    $showError = "Invalid Credentials";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css' rel='stylesheet'
        integrity='sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi' crossorigin='anonymous'>
    <!-- JavaScript Bundle with Popper -->
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js'
        integrity='sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3'
        crossorigin='anonymous'></script>
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<?php

if ($showError){
    echo '<div class="alert alert-danger alert-success fade show" role="alert">
    <strong>Error! </strong>'. $showError.' <br>Click <a href="index.php">here</a> to try again
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}

?>