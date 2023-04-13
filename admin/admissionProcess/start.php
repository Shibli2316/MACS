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
    <h1 class="h3 mb-4 text-gray-800">Start the process</h1>
    
    <div class="container">
        <form action="start.php" method="post">
            <label for="level">Which class do you want to start for</label>
            <input type="text" placeholder="Undergrad/Postgrad" name="class">
            <br>

            <label for="subject">Which Subject</label>
            <select name="sub" id="sub">
                <?php
                    // $sno = 1;

                    // Fetching students records
                    $fetching = "SELECT * FROM courses;";
                    $run = mysqli_query($conn, $fetching);
                    if(!$run){
                        echo "error";
                    }
                    
                    // Chechking the number of rows the database has and iterating it only if the number of rows are greater than 0
                    $howManyRows = mysqli_num_rows($run);
                    if($howManyRows>0){
                        while($row = mysqli_fetch_assoc($run)){
                            echo"
                            <option value=".$row['nameC'].">".$row['nameC']."</option>
                            ";
                        }
                    }
                ?>
            </select>
            <br>
            <label for="dep">Which Department</label>
            <select name="dep" id="dep">
                <?php
                    // $sno = 1;

                    // Fetching students records
                    $fetching = "SELECT * FROM department;";
                    $run = mysqli_query($conn, $fetching);
                    if(!$run){
                        echo "error";
                    }
                    
                    // Chechking the number of rows the database has and iterating it only if the number of rows are greater than 0
                    $howManyRows = mysqli_num_rows($run);
                    if($howManyRows>0){
                        while($row = mysqli_fetch_assoc($run)){
                            echo"
                            <option value=".$row['name'].">".$row['name']."</option>
                            ";
                        }
                    }
                ?>
            </select>
            <br>
            <label for="sDate">Starts On</label>
            <input type="date" name="sdate" id="sdate">
            <br>
            <label for="sDate">Ends On</label>
            <input type="date" name="edate" id="edate">
            <br>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
    
    </div>
<?php
include '../includes/footer.php';
?>
<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
    require '../../partials/_dbconnectAdmin.php';
        $class = $_POST['class'];
        $sub = $_POST['sub'];
        $dep = $_POST['dep'];
        $sdate = $_POST['sdate'];
        $edate = $_POST['edate'];
        
    
        $sql = "INSERT INTO `start` (`class`, `sub`, `dep`, `sdate`, `edate`) VALUES ('$class', '$dep', '$sub', '$sdate', '$edate');";

        $run = mysqli_query($conn, $sql);
        if (!$run) {
            echo "Error while updating records";
        } else {
            echo "<script>alert('Your records has been updated successfully!!!')</script>";
        }
}
?>