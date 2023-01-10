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
    $details = mysqli_fetch_assoc($result);
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="mx-2 my-2" method="post">
        <label for="name">First Name</label>
        <input type="text" name="f_name" id="f_name" placeholder="<?php if ($details['f_name'] == "") {echo "Enter First Name";} else {echo $details['f_name'];} ?>" readonly> <br>
        <hr>
        <label for="name">Last Name</label>
        <input type="text" name="l_name" id="l_name" placeholder="<?php if ($details['l_name'] == "") {echo "Enter Last Name";} else {echo $details['l_name'];} ?>" readonly> <br>
        <hr>
        <label for="name">Username</label>
        <input type="text" name="u_name" id="u_name" readonly placeholder="<?php echo $details['username']; ?>"> <br>
        <hr>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="<?php if ($details['email'] == "") {echo "Enter Email";} else {echo $details['email'];} ?>" readonly> <br>
        <hr>
        <label for="name">Exam</label>
        <input type="text" name="exam" id="exam" placeholder="<?php if ($details['exam'] == "") {echo "Enter name";} else {echo $details['exam'];} ?>" readonly> <br>
        <hr>
        <label for="name">Rank</label>
        <input type="text" name="rank" id="rank" placeholder="<?php if ($details['rank'] == "0") {echo "Enter Rank";} else {echo $details['rank'];} ?>" readonly> <br>
        <hr>
        <?php
        echo "<a href='updateProfile.php?name=".$details['username']."'><input type='button' value='Update'></a>"
        ?>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>