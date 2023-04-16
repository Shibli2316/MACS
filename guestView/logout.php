<?php
session_start();
session_unset();
session_destroy();
header("location: \Project-SMART\genral\join.php");
exit;
?>