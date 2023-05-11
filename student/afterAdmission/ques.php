<!-- INSERT INTO `s_education` (`s_id`, `level`, `year_passing`, `roll_no`, `board`, `result`, `grade_type`, `grade`, `certificate`) VALUES ('1', 'ssc', '2020', '123', 'cbse', 'passed', 'a', '23', 'ew'); -->


<?php
session_start();

// Assigning usernme of the logged in user into a variable for easy access.
$user = $_SESSION['username'];

include '../../partials/_dbconnect.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $q1 = $_POST['q1'];
    $q2 = $_POST['q2'];
    $q3 = $_POST['q3'];
    $q4 = $_POST['q4'];
    
    $sum = $q1+$q2+$q3+$q4;
    if(($q1>2||$q2>2)&&$sum>7){
        $res = "You are good with logics and can understand things better you may take subjects like Physics, Computer Application or Maths";
        $random = rand(70,90);
        $prob = "Your probability of success is ". $random;
    } elseif($q3>2&&$sum>5){
        $res = "You are not very good with logics but appriciate art and literature you may opt for English or Fine arts";
        $random = rand(70,90);
        $prob = "Your probability of success is ". $random;
    }elseif(($q1>2||$q2<3)&&$sum>7){
        $res = "You are good with logics but not arithmatics with a little practice you can do good in subjects like Computer Application or Stats or Chem";
        $random1 = rand(50,70);
        $prob = "Your probability of success is ". $random1;
    }else{
            $res = "You should go with the booming sector of IT and Computer Science";
            $random = rand(50,80);
            $prob = "Your probability of success is ". $random;
    }

}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS file CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- The title will display the username making the first char uppercase -->
    <title>Profile <?php echo ucfirst($user); ?></title>
</head>

<body>
    <?php include '../../partials/_nav.php'; ?>

    <div class="container">
        <form action="ques.php" method="post">

            <div class="card my-4 text-center">
                <div class="card-header text-center">
                    Know the subject that might best suit you
                </div>
                <div class="card-body text-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label" for="sub">How good are you with logics</label>
                            </div>
                            <div class="col-md-6">
                                <select class="form-control" name="q1" id="">
                                    <option value="0">--SELECT--</option>
                                    <option value="1">Bad</option>
                                    <option value="2">Okay</option>
                                    <option value="3">Very good</option>
                                    <option value="4">Excellent</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="container my-2">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label" for="sub">How good are you with arithmetics</label>
                            </div>
                            <div class="col-md-6">
                                <select class="form-control" name="q2" id="">
                                    <option value="0">--SELECT--</option>
                                    <option value="1">Bad</option>
                                    <option value="2">Okay</option>
                                    <option value="3">Very good</option>
                                    <option value="4">Excellent</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="container my-2">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label" for="sub">What do you think about literature</label>
                            </div>
                            <div class="col-md-6">
                                <select class="form-control" name="q3" id="">
                                    <option value="0">--SELECT--</option>
                                    <option value="1">It is bad</option>
                                    <option value="2">It is okay</option>
                                    <option value="3">It is very good</option>
                                    <option value="4">It is excellent</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="container my-2">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label" for="sub">Do you like to understand your subject or gobble up the material</label>
                            </div>
                            <div class="col-md-6">
                                <select class="form-control" name="q4" id="">
                                    <option value="0">--SELECT--</option>
                                    <option value="1">Understand</option>
                                    <option value="2">Gobble</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary mx-auto" value="Check">
                </div>
            </div>

        </form>
    </div>

    &nbsp;

    <div class="container">

            <div class="card my-4 text-center">
                <div class="card-header text-center">
                    Your Result - PREDICTION
                </div>
                <div class="card-body text-center">
                    <div class="container text-center">
                        
                            <div class="">
                                <label class="form-label" for="sub"><?php echo $res;?></label>
                                <label class="form-label" for="sub"><?php echo $prob?></label>
                            </div>
                            <br>
                            <p>Know that this is just a prediction and may lead to unclear or WRONG results. Take your descisions wisely.</p>
                        
                    </div>
                    
                  
                   
                    
                </div>
            </div>

        </form>
    </div>
    <?php include '../../partials/_footer.php'; ?>