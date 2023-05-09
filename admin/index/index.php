<?php
include '../includes/header.php';
?>


<?php



// Assigning usernme of the logged in user into a variable for easy access.
$user = $_SESSION['username'];

// Including the connection file of the database.
include "../../partials/_dbconnect.php";
// Since in the table there maybe discreate numbering so to keep the numbering in order a varable is assigned and its value is updated with each itteration of the rows of the database
$sno = 0;

// Fetching students records
$fetching = "SELECT * FROM students;";
$run = mysqli_query($conn, $fetching);
if(!$run){
    echo "error";
}
// Chechking the number of rows the database has and iterating it only if the number of rows are greater than 0
$howManyRows = mysqli_num_rows($run);
if($howManyRows>0){
  while($row = mysqli_fetch_assoc($run)){
    $sno+=1;
}
}

$count = 0;

// Fetching students records
$fetching = "SELECT * FROM verify where accept = 'yes';";
$run = mysqli_query($conn, $fetching);
if(!$run){
    echo "error";
}
// Chechking the number of rows the database has and iterating it only if the number of rows are greater than 0
$howManyRows = mysqli_num_rows($run);
if($howManyRows>0){
  while($row = mysqli_fetch_assoc($run)){
    $count+=1;
}
}

?>
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Dashboard</h1>



    <div class="container row mx-auto">

        <div class="card text-center col-md-5">
            <div class="card-header">
                Featured
            </div>
            <div class="card-body">
                <h5 class="card-title">Applicants</h5>
                <p class="card-text">The number of students who applied for are.</p>
                <p class="card-text"><?=$sno?></p>
                <a href="../students/manageStudents.php" class="btn btn-primary">View</a>
            </div>
            <div class="card-footer text-muted">
                In total <?=$sno?> applicants
            </div>
        </div>

        <div class="card text-center col-md-5 mx-5">
            <div class="card-header">
                Featured
            </div>
            <div class="card-body">
                <h5 class="card-title">Admitted</h5>
                <p class="card-text">Total number of students who are admitted are <?=$count?>.</p>
                <a href="../admissionProcess/admitted.php" class="btn btn-primary">View</a>
            </div>
            <div class="card-footer text-muted">
                In total <?=$count?> admissions
            </div>
        </div>

    </div>
&nbsp;

<?php

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

</div>
<?php
include '../includes/footer.php';
?>