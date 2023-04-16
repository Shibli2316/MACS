<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/join.css">
    <title>Join US</title>
</head>

<body>
    <!-- Nav bar -->
<?php 
include "nav.php";
?>

    <!-- Main body -->
    
    <div class="body">
        <div class="container">
            <!-- Card 1 -->
            <div class="card">
                <div class="imgBx">
                    <img src="../images/studying.png" alt="">
                </div>
                <div class="contentBx">
                    <h2>Student</h2>
                    <p>Access time table, notices and other related details by logging in here. <br>
                        To login with your studnet's account click on the button below</p>
                    <a href="../student/index.php"><span>Click here</span></a>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="card">
                <div class="imgBx">
                    <img src="../images/male.png" alt="">
                </div>
                <div class="contentBx">
                    <h2>Teacher</h2>
                    <p>Access time table, notices and other related details by logging in here. <br>
                        To login with your teacher's account click on the button below</p>
                    <a href="../teacher/index.php"><span>Click here</span></a>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="card">
                <div class="imgBx">
                    <img src="../images/graduated.png" alt="">
                </div>
                <div class="contentBx">
                    <h2>Admin</h2>
                    <p>Admin can aceess all the information of the website by logging in here<br>
                        To login with your admin's account click on the button below</p>
                    <a href="../admin/index.php"><span>Click here</span></a>
                </div>
            </div>
        </div>
    </div>

    <!-- footer goes here -->
    <footer>
        footer goes here
    </footer>
</body>

</html>