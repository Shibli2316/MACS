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
<?php include '../../partials/_nav.php';?>
<?php include '../../partials/_studNav.php';?>

<div class="container row mx-auto">
<div class="card m-auto mt-5 col-md-6" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Application for</h5>
    <h6 class="card-subtitle mb-2 text-body-secondary"><?php echo "LEVEL";?></h6>
    <p class="card-text">You have filled your form, for further actions click the links provided below.</p>
    <!-- <a href="#" class="card-link">Download</a> -->
    <a href="#" class="card-link">View</a>
  </div>
</div>

</div>
</div>
<?php include '../../partials/_footer.php';?>