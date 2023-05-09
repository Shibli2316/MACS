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

<?php
include '../partials/_nav.php';
include '../partials/_dbconnect.php';
$sqlCS = "SELECT count(*) as total FROM verify where sub = 'Computer Applications'";
$tSeatCS = 10;
$resCS = mysqli_query($conn, $sqlCS);
$detCS = mysqli_fetch_assoc($resCS);
$nowCS = $detCS['total'];
$scCS = $tSeatCS - $nowCS;
// echo $scCS;
$sqlM = "SELECT count(*) as total FROM verify where sub = 'Maths'";
$tSeatM = 10;
$resM = mysqli_query($conn, $sqlM);
$detM = mysqli_fetch_assoc($resM);
$nowM = $detM['total'];
$scM = $tSeatM - $nowM;

$sqlStat = "SELECT count(*) as total FROM verify where sub = 'Stats'";
$tSeatStat = 10;
$resStat = mysqli_query($conn, $sqlStat);
$detStat = mysqli_fetch_assoc($resStat);
$nowStat = $detStat['total'];
$scStat = $tSeatStat - $nowStat;

$sqlChem = "SELECT count(*) as total FROM verify where sub = 'Chemestry'";
$tSeatChem = 10;
$resChem = mysqli_query($conn, $sqlChem);
$detChem = mysqli_fetch_assoc($resChem);
$nowChem = $detChem['total'];
$scChem = $tSeatChem - $nowChem;

$sqlBio = "SELECT count(*) as total FROM verify where sub = 'Bio Chemestry'";
$tSeatBio = 10;
$resBio = mysqli_query($conn, $sqlBio);
$detBio = mysqli_fetch_assoc($resBio);
$nowBio = $detBio['total'];
$scBio = $tSeatBio - $nowBio;

$sqlPhy = "SELECT count(*) as total FROM verify where sub = 'Physics'";
$tSeatPhy = 10;
$resPhy = mysqli_query($conn, $sqlPhy);
$detPhy = mysqli_fetch_assoc($resPhy);
$nowPhy = $detPhy['total'];
$scPhy = $tSeatPhy - $nowPhy;

?>

    <div class="container">
        <div class="card">
            <h5 class="card-header text-center">LIVE SEAT UPDATE</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Computer Science</h5>
                                <p class="card-text">Total seats - <?=$tSeatCS?></p>
                                <p class="card-text">Alloted - <?=$detCS['total']?></p>
                                <p class="card-text">Remaining - <?=$scCS?></p>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Maths</h5>
                                <p class="card-text">Total seats - <?=$tSeatM?></p>
                                <p class="card-text">Alloted - <?=$detM['total']?></p>
                                <p class="card-text">Remaining - <?=$scM?></p>
                                
                            </div>
                        </div>
                    </div>
                </div>

                &nbsp;
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Stats</h5>
                                <p class="card-text">Total seats - <?=$tSeatStat?></p>
                                <p class="card-text">Alloted - <?=$detStat['total']?></p>
                                <p class="card-text">Remaining - <?=$scStat?></p>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Chemestry</h5>
                                <p class="card-text">Total seats - <?=$tSeatChem?></p>
                                <p class="card-text">Alloted - <?=$detChem['total']?></p>
                                <p class="card-text">Remaining - <?=$scChem?></p>
                                
                            </div>
                        </div>
                    </div>
                </div>
                &nbsp;
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">BioChemestry</h5>
                                <p class="card-text">Total seats - <?=$tSeatBio?></p>
                                <p class="card-text">Alloted - <?=$detBio['total']?></p>
                                <p class="card-text">Remaining - <?=$scBio?></p>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Physics</h5>
                                <p class="card-text">Total seats - <?=$tSeatPhy?></p>
                                <p class="card-text">Alloted - <?=$detPhy['total']?></p>
                                <p class="card-text">Remaining - <?=$scPhy?></p>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php
include '../partials/_footer.php';
    ?>
</body>
</html>