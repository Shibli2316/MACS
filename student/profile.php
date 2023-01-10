<?php
session_start();
$user = $_SESSION['username'];
include "../partials/_dbconnect.php"
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Profile <?php echo $user; ?></title>
</head>

<body>
    <?php 
    require "../partials/_nav.php"; 
    $sql = "SELECT * FROM `students` WHERE username = '$user'";
    $result = mysqli_query($conn, $sql);
    $details= mysqli_fetch_assoc($result);
    if($details['f_name'] == ""){
        echo "Enter name";
    }
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $f_name = $_POST['f_name'];
        $l_name = $_POST['l_name'];
        $email = $_POST['email'];
        $exam = $_POST['exam'];
        $rank = $_POST['rank'];
           
        $updatingDetails = "UPDATE `students` SET `f_name` = '$f_name', `l_name` = '$l_name', `email` = '$email', `exam` = '$exam', `rank` = '$rank' WHERE `students`.`username` = '$user';";
        $run = mysqli_query($conn, $updatingDetails);
        if(!$run){
            echo "Error while updating records";
        }
    }
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="mx-2 my-2" method="post">
        <label for="name">First Name</label>
        <input type="text" name="f_name" id="f_name" placeholder="<?php if($details['f_name']==""){echo "Enter name";}else{echo $details['f_name'];}?>"> <br> <hr>
        <label for="name">Last Name</label>
        <input type="text" name="l_name" id="l_name"> <br> <hr>
        <label for="name">Username</label>
        <input type="text" name="u_name" id="u_name" readonly placeholder="<?php echo $details['username'];?>"> <br> <hr>
        <label for="email">Email</label>
        <input type="email" name="email" id="email"> <br> <hr>
        <label for="name">Exam</label>
        <input type="text" name="exam" id="exam"> <br> <hr>
        <label for="name">Rank</label>
        <input type="text" name="rank" id="rank"> <br> <hr>
        <input type="submit" value="Save">
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>