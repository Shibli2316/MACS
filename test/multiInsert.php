<?php
include '../partials/_dbconnect.php';



if($_SERVER['REQUEST_METHOD']=='POST'){


        $name = $_POST['name'];
        

    
        $sql = "INSERT INTO `students` (`username`) VALUES ('$name');";

        $run = mysqli_query($conn, $sql);

        $sql = "INSERT INTO `s_education` (`username`) VALUES ('$name');";

        $run = mysqli_query($conn, $sql);

        $sql = "INSERT INTO `s_specifics` (`username`) VALUES ('$name');";

        $run = mysqli_query($conn, $sql);
        if (!$run) {
            echo "Error while updating records";
        } else {
            echo "<script>alert('Your records has been updated successfully!!!')</script>";
        }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="multiInsert.php" method="post">
        <label for="name">Insert name</label>
        <input type="text" name="name" id="">
        <button>Submit</button>
    </form>
    <a href="../images/img.txt" download="">Download</a>
</body>
</html>