<?php
include '_dbconnect.php';
$sql = "SELECT * FROM verify where username='shibli'";
$run = mysqli_query($conn, $sql);
$fetch = mysqli_fetch_assoc($run);
$check = $fetch['verified'];
echo "
    <nav class='navbar navbar-expand-lg bg-dark navbar-dark'>
        <div class='container-fluid'>
            <a class='navbar-brand' href='#'>MACS</a>
            <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNav'
                aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
            </button>
            <div class='collapse navbar-collapse' id='navbarNav'>
                <ul class='navbar-nav ms-auto'>
                    
                    <li class='nav-item'>
                        <a class='nav-link' href='../../partials/noticegenral.php'>Notice</a>
                    </li>";

                    if($check==1){
                        echo "
                    <li class='nav-item'>
                        <a class='nav-link' href='../afterAdmission/accept.php'>Admission</a>
                    </li>";
                    }
                    else{
                        echo"<li class='nav-item'>
                        <a class='nav-link' href='#'>Verification pending</a>
                    </li>";
                    }
                    echo "
                    <li class='nav-item'>
                        <a class='nav-link' href='../../partials/logout.php'>logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
";
?>