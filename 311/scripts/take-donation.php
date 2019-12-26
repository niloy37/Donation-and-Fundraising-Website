<?php
if(!isset($_GET['dodo'])){
    exit("<h1> ERROR 404</h1>");
}

$donationamount = $_GET["dodo"]; //donation amount

include('connect-to-database.php');
session_start();
$username = $_SESSION['userId'];
$postid = $_SESSION['post'];

//update user balance
//get username of the guy being donated to
$get_username = "SELECT p_user_name FROM test.posts WHERE post_id = '$postid';";
$exec_get_username = mysqli_query($link,$get_username);
$res_get_username = mysqli_fetch_array($exec_get_username);
$donatedto = $res_get_username['p_user_name']; //Person donated to

//getprimarybalance
$get_balance_query = "SELECT balance FROM test.userbalance WHERE b_user_name = '$donatedto';";
$exec_get_balance_query = mysqli_query($link,$get_balance_query);
$balance_array = mysqli_fetch_array($exec_get_balance_query);

$usersbalance = $balance_array['balance'];


$total_balance_af = ($usersbalance + $donationamount);

//update users balance
$update_query = "UPDATE test.userbalance SET balance = '$total_balance_af' WHERE b_user_name = '$donatedto';";
mysqli_query($link,$update_query);


//initial things were from here

$insertsql = "INSERT INTO test.donation(d_post_id,donation_amount,donation_username) VALUES('$postid','$donationamount','$username');";
$result = mysqli_query($link,$insertsql);
if($result) echo 'successful';
//get needed amount

$ss= "SELECT SUM(donation_amount) as t FROM test.donation WHERE d_post_id ='$postid';";
$totalsum = mysqli_query($link,$ss);
$resno = mysqli_fetch_array($totalsum);
$total_don= $resno['t'];

//get donation amount
 $required_don = $_SESSION['money'];
 if($total_don >= $required_don ){
     $updt_query = "UPDATE test.posts SET yes_no = 0 WHERE post_id = '$postid';";
    mysqli_query($link,$updt_query); 
 }
mysqli_close($link);
 header("Location: ../readmore.php?pk=".$postid."&success=1");


?>