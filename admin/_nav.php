

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <!-- CSS only -->
<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65' crossorigin='anonymous'>
    <!-- JavaScript Bundle with Popper -->
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4' crossorigin='anonymous'></script>
    <title>Document</title>
</head>
<body>
<nav class='navbar navbar-expand-lg bg-dark navbar-dark'>
  <div class='container-fluid'>
    <a class='navbar-brand' href='dashboard.php'>SMART</a>
    <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
      <span class='navbar-toggler-icon'></span>
    </button>
    <div class='collapse navbar-collapse' id='navbarSupportedContent'>
      <ul class='navbar-nav mb-2 mb-lg-0 ms-auto mx-5'>
        <li class='nav-item'>
          <a class='nav-link active' aria-current='page' href='/Project-Smart/admin/dashboard.php'>Dashboard</a>
        </li>
        <li class='nav-item dropdown'>
          <a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
            Time Table
          </a>
          <ul class='dropdown-menu'>
            <li><a class='dropdown-item' href='/Project-Smart/admin/content/timetable/bsc/bsc1.php'>B.Sc Sem1</a></li>
            <li><a class='dropdown-item' href='/Project-Smart/admin/content/timetable/bsc/bsc2.php'>B.Sc Sem2</a></li>
            <li><a class='dropdown-item' href='/Project-Smart/admin/content/timetable/bsc/bsc3.php'>B.Sc Sem3</a></li>
            <li><a class='dropdown-item' href='/Project-Smart/admin/content/timetable/bsc/bsc4.php'>B.Sc Sem4</a></li>
            <li><a class='dropdown-item' href='/Project-Smart/admin/content/timetable/bsc/bsc5.php'>B.Sc Sem5</a></li>
            <li><a class='dropdown-item' href='/Project-Smart/admin/content/timetable/bsc/bsc6.php'>B.Sc Sem6</a></li>
            <li><hr class='dropdown-divider'></li>
            <li><a class='dropdown-item' href='/Project-Smart/admin/content/timetable/msc/msc1.php'>M.Sc Sem1</a></li>
            <li><a class='dropdown-item' href='/Project-Smart/admin/content/timetable/msc/msc2.php'>M.Sc Sem2</a></li>
            <li><a class='dropdown-item' href='/Project-Smart/admin/content/timetable/msc/msc3.php'>M.Sc Sem3</a></li>
            <li><a class='dropdown-item' href='/Project-Smart/admin/content/timetable/msc/msc4.php'>M.Sc Sem4</a></li>
          </ul>
        </li>
        <li class='nav-item dropdown'>
          <a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
            Manage
          </a>
          <ul class='dropdown-menu'>
            <li><a class='dropdown-item' href='/Project-Smart/admin/manage/managestudent.php'>Student</a></li>
            <li><a class='dropdown-item' href='/Project-Smart/admin/manage/manageteacher.php'>Teacher</a></li>
            <li><hr class='dropdown-divider'></li>
            <li><a class='dropdown-item' href='/Project-Smart/admin/manage/managealumni.php'>Alumni</a></li>
          </ul>
        </li>
        <li class='nav-item dropdown'>
          <a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
            Notice
          </a>
          <ul class='dropdown-menu'>
            <li><a class='dropdown-item' href='/Project-Smart/admin/content/notice/noticegenral.php'>View</a></li>
            <li><hr class='dropdown-divider'></li>
            <li><a class='dropdown-item' href='/Project-Smart/admin/content/notice/notice.php'>Manage</a></li>
          </ul>
        </li>
        <li class='nav-item'>
          <a class='nav-link' href='/Project-SMART/genral/logout.php'>Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</body>
</html>