<?php 


session_start();
session_unset();
session_destroy();
$_SESSION['is_open'] = false;

header("Location: ../index.php");


?>