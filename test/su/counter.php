<?php
include '../../partials/_dbconnect.php';

// $sql = "SELECT * FROM start";
// $res = mysqli_query($conn, $sql);
// $dwt = mysqli_fetch_assoc($res);
// $start = $dwt['sdate'];
// $end = $dwt['edate'];
// echo '<br>';
// $today = date('Y-m-d');
// if($today>$start && $today<$end){
//     echo "Time";
// }else{
//     echo "expired";
// }

$sql = "SELECT count(*) as total FROM verify where sub = 'Computer Applications'";
$tseatcs = 10;
$res = mysqli_query($conn, $sql);
$det = mysqli_fetch_assoc($res);
$now = $det['total'];
$scCS = $tseatcs - $now;
echo $scCS;

?>




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
    <div class="container">
        <div class="card">
            <h5 class="card-header text-center">LIVE SEAT UPDATE</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Computer Science</h5>
                                <p class="card-text">Total seats - <?=$tseatcs?></p>
                                <p class="card-text">Alloted - <?=$det['total']?></p>
                                <p class="card-text">Remaining - <?=$scCS?></p>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Maths</h5>
                                <p class="card-text">Total seats - <?=$tseatcs?></p>
                                <p class="card-text">Alloted - <?=$det['total']?></p>
                                <p class="card-text">Remaining - <?=$scCS?></p>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>