<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <?php include 'nav.php'; ?>
    <div class="container my-4">
        <div class="card">
            <h5 class="card-header text-center">Data about the departments</h5>
            <div class="card-body">
                <div class="row">
    <?php
    
    include '../partials/_dbconnectAdmin.php';
    $sql = "select * from department;";
    $run = mysqli_query($conn, $sql);
    
        while($detail = mysqli_fetch_assoc($run)){
            echo "
                    <div class='col-sm-6'>
                        <div class='card'>
                            <img class='card-img-top' src='".$detail['imgPath']."' alt='Department image'>
                            <div class='card-body'>
                                <h5 class='card-title'>".$detail['name']."</h5>
                                <p class='card-text'>".$detail['about']."</p>
                                <p class='card-text'>It is under the faculty of".$detail['facOf']."</p>
                                <p class='card-text'>Number of students studying are".$detail['noOfStud']."</p>
                                <p class='card-text'>Number of teachers are".$detail['noOfTeacher']."</p>
                                <p class='card-text'>Number of courses are".$detail['noOfCourse']."</p>
                                <a href='join.php' class='btn btn-primary'>Apply</a>
                            </div>
                        </div>
                    </div>
";
        }
        ?>

                </div>
            </div>
        </div>

    </div>

    <?php include '../partials/_footer.php';
    ?>
</body>

</html>