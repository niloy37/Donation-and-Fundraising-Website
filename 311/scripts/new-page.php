<?php 
if(!isset($_GET['value'])){
    exit("<h1> ERROR 404</h1>");
}
session_start();
$in = $_GET['value'];
// $myp = $_GET['sqlresult'];
$in+=1;
header("Location: ../index.php?value=".$in);


?>