<?php
if(!isset($_GET['value'])){
    exit('<h1>ERROR</h1>');
}
session_start();
$in = $_GET['value'];

$in--;
header("Location: ../admin/adminmessages.php?value=".$in);


?>