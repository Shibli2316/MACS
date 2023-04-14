<?php
// The session for the logged in user is relayed to this page using the session start tag. In case the session is not started it will start the session.
session_start();

// Assigning usernme of the logged in user into a variable for easy access.
$user = $_SESSION['username'];

// Including the connection file of the database.
include "../../partials/_dbconnect.php";

// Getting the id from the URL
$id=$_GET['id'];
// echo $id;

$query = "SELECT * FROM students WHERE s_id=$id;";
$result = mysqli_query($conn, $query);

if($result && (mysqli_num_rows($result)==1)){
  $res = mysqli_fetch_assoc($result);
}else{
  echo "Failed";
}
?>

<?php
include '../includes/header.php';
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Father</th>
      <th scope="col">Mother</th>
      <th scope="col">Aadhar</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      
    </tr>
  </thead>
  <tbody>
    <?php
    echo "
    <tr>
      <th scope='row'>".$res['s_id']."</th>
      <td>".$res['f_name']."</td>
      <td>".$res['father_name']."</td>
      <td>".$res['mother_name']."</td>
      <td>".$res['aadhar']."</td>
      <td>".$res['username']."</td>
      <td>".$res['email']."</td>
    </tr>
";
    ?>
  </tbody>
</table>
<hr><hr><hr><hr>
<table class="table">
  <thead>
    <tr>
      <th scope="col">DOB</th>
      <th scope="col">Gender</th>
      <th scope="col">Mobile</th>
      <th scope="col">Guardian</th>
      <th scope="col">Guardian Number</th>
      <th scope="col">Disability</th>
      <th scope="col">Nationality</th>
      <th scope="col">Domicile</th>
      <th scope="col">Identity Mark</th>
      <th scope="col">Exam</th>
      <th scope="col">Rank</th>
    </tr>
  </thead>
  <tbody>
  <?php
    echo "
    <tr>
      <th scope='row'>".$res['dob']."</th>
      <td>".$res['gender']."</td>
      <td>".$res['mobile']."</td>
      <td>".$res['guardian_name']."</td>
      <td>".$res['guardian_number']."</td>
      <td>".$res['disability']."</td>
      <td>".$res['nationality']."</td>
      <td>".$res['domicile']."</td>
      <td>".$res['identity_mark']."</td>
      <td>".$res['exam']."</td>
      <td>".$res['rank']."</td>
    </tr>
";
    ?>
  </tbody>
</table>

<div class="container border mx-auto my-4">
  <form action="verify.php?id=<?=$id?>" method="post">
    <label for="remark">Make Remark</label>
    <input type="text" name="remark" placeholder="Enter Remark">
    <br>
    <hr>
    <label for="admit">Admit Student</label>
    <select name="verified" id="">
      <option value="NULL">--SELECT--</option>
      <option value="1">Yes</option>
      <option value="0">No</option>
    </select>
    <br><hr>
    <button>SAVE</button>
  </form>
</div>

</main>
<?php
include '../includes/footer.php';
?>