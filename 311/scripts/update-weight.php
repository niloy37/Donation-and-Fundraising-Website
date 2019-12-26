<?php
if(!isset($_GET['pid'])){
    exit("<h1> ERROR 404</h1>");
}
include('connect-to-database.php');
session_start();

$p = $_GET['pid'];
$w = $_GET['weight'];
$w++;

$sql = "UPDATE test.posts SET p_weight = '$w' WHERE post_id = '$p';";
$result_of_update = mysqli_query($link, $sql);
if($result_of_update){
    header("Location: ../readmore.php?pk=".$p);

}

?>