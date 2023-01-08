<?php
session_start();
session_unset();
session_destroy();
header("location: ../guestView/home.php");
exit;
?>