<?php
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
                        <a class='nav-link' href='../admin/login.php'>About</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='../teacher/login.php'>Departments</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='../student/login.php'>Admission Details</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='../student/login.php'>Notices</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='../profile/login.php'>Login</a>
                    </li>


                    
                    <li class='nav-item'>
                        <a class='nav-link' href='../guestView/login.php'>Progress</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='../../partials/logout.php'>logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
";
?>