<!-- NEED TO KEEP TRACK OF STUDENT ID -->


<?php
// The session for the logged in user is relayed to this page using the session start tag. In case the session is not started it will start the session.
session_start();

// Assigning usernme of the logged in user into a variable for easy access.
$user = $_SESSION['username'];

// Including the connection file of the database.
include "../../partials/_dbconnect.php"
?>

<?php

// Navbar is required before moving forward


// Fetching the data of the logged in user.
$sql = "SELECT
*
FROM students
JOIN s_education
ON students.s_id = s_education.s_id
JOIN s_specifics
ON s_specifics.s_id = s_education.s_id WHERE students.username='$user';";
$result = mysqli_query($conn, $sql);

// Storing it into an associative array called details.
$details = mysqli_fetch_assoc($result);
// var_dump($details);

// var_dump($details);


?>


<!-- If the data of the user is present it is being fetched and dispplayed into the respected fields from where the user can update it if needed. The username cannot be updated -->
<div class="container border my-4">
<!-- <form action="updateProfile.php?name=" class="mx-2 my-2" method="post" enctype="multipart/form-data"> -->
<div class="container text-center card-header my-4">
    <h3>View Application</h3>
</div>
<div class="container text-center my-4">
    
    <?php 

echo "<img src='".$details['s_img']."' height='100px' width='100px' style='border-radius:50%;'><br>";

?>
</div>
    
    <hr>
    <div class="mb-3 mx-5">

            <label class="form-label" for="name">Application Number</label>
            <input readonly class="form-control" type="text" name="form_no" id="form_no" value="<?php if ($details['form_no'] == "") {echo "Enter Application Number";} else {echo $details['form_no'];} ?>"> <br>
        </div>
<div class="mb-3 mx-5">

    <label for="name" class="form-label">First Name</label>
    <input readonly type="text" name="f_name" id="f_name" value="<?php if ($details['f_name'] == "") {echo "Enter First name";} else {echo $details['f_name'];} ?>" class="form-control"> <br>
</div>
    
        <div class="mb-3 mx-5">

            <label class="form-label" for="name">Last Name</label>
            <input readonly class="form-control" type="text" name="l_name" id="l_name" value="<?php if ($details['l_name'] == "") {echo "Enter Last Name";} else {echo $details['l_name'];} ?>"> <br>
        </div>
            
        <div class="mb-3 mx-5">

            <label class="form-label" for="email">Email</label>
            <input readonly class="form-control" type="email" name="email" id="email" placeholder="<?php if ($details['email'] == "") {echo "Enter Email";} else {echo $details['email'];} ?>" readonly> <br>
        </div>
            
        <div class="mb-3 mx-5">
            <label class="form-label" for="name">Exam</label>
            <input readonly class="form-control" type="text" name="exam" id="exam" value="<?php if ($details['exam'] == "") {echo "Enter Exam";} else {echo $details['exam'];} ?>"> <br>
        </div>
        <div class="mb-3 mx-5">
            <label class="form-label" for="name">Father Name</label>
            <input readonly class="form-control" type="text" name="exam" id="exam" value="<?php if ($details['father_name'] == "") {echo "Enter Father Name";} else {echo $details['father_name'];} ?>"> <br>
        </div>
        <div class="mb-3 mx-5">
            <label class="form-label" for="name">Mother Name</label>
            <input readonly class="form-control" type="text" name="exam" id="exam" value="<?php if ($details['mother_name'] == "") {echo "Enter Mother Name";} else {echo $details['mother_name'];} ?>"> <br>
        </div>
        <div class="mb-3 mx-5">
            <label class="form-label" for="name">DOB</label>
            <input readonly class="form-control" type="text" name="exam" id="exam" value="<?php if ($details['dob'] == "") {echo "Enter DOB";} else {echo $details['dob'];} ?>"> <br>
        </div>
        <div class="mb-3 mx-5">
            <label class="form-label" for="name">Gender</label>
            <input readonly class="form-control" type="text" name="exam" id="exam" value="<?php if ($details['gender'] == "") {echo "Enter Gender";} else {echo $details['gender'];} ?>"> <br>
        </div>
        <div class="mb-3 mx-5">
            <label class="form-label" for="name">Disability</label>
            <input readonly class="form-control" type="text" name="exam" id="exam" value="<?php if ($details['disability'] == "") {echo "Enter Disability";} else {echo $details['gender'];} ?>"> <br>
        </div>
        <div class="mb-3 mx-5">
            <label class="form-label" for="name">Applied for</label>
            <input readonly class="form-control" type="text" name="exam" id="exam" value="<?php if ($details['level'] == "") {echo "Applied for";} else {echo $details['level'];} ?>"> <br>
        </div>
        <div class="mb-3 mx-5">
            <label class="form-label" for="name">Course</label>
            <input readonly class="form-control" type="text" name="exam" id="exam" value="<?php if ($details['course'] == "") {echo "Enter course";} else {echo $details['course'];} ?>"> <br>
        </div>
            
        <div class="mb-3 mx-5 text-center">
            <a href="dashboard.php"><button class="btn btn-primary">Back</button></a>
        </div>
        
            
            
</div>
    <!-- Bootstrap JS file CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <?php include '../../partials/_footer.php';?>
</body>

</html>