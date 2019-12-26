<?php 
session_start();
$in = $_GET['value'];

$in+=1;
header("Location: ../admin/adminmessages.php?value=".$in);


?>