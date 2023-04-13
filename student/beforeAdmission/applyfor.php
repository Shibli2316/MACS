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
    <?php include '../../partials/_studNav.php'; ?>
    <div class="container">

        <div class="card my-4 text-center">
            <div class="card-header text-center">
                Apply for
            </div>
            <div class="card-body text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="sub">Choose Level</label>
                        </div>
                        <div class="col-md-6">
                            <select name="" id="">
                                <option value="0">--SELECT--</option>
                                <option value="1">UG</option>
                                <option value="2">PG</option>
                                <option value="3">School</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="container my-2">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="sub">Choose Course</label>
                        </div>
                        <div class="col-md-6">
                            <select name="" id="">
                                <option value="0">--SELECT--</option>
                                <option value="1">UG</option>
                                <option value="2">PG</option>
                                <option value="3">School</option>
                            </select>
                        </div>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary mx-auto" value="SAVE">
            </div>
        </div>
        
    </div>
    <?php include '../../partials/_footer.php'; ?>