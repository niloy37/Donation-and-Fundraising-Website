<?php

include("connect-to-database.php");
if(!isset($_POST['title'])){
    exit("<h1>Cannot Access directly! Try Through Navigation Bar</h1>");
}

session_start();
$title = $_POST['title']; //ok
$small_des = $_POST['s_desc']; //ok
$des = $_POST['desc']; //ok
$amount_p = $_POST['amount']; //ok
$username = $_SESSION['userId']; 

 $file_img = $_FILES['image']['tmp_name'];
$imgContent = addslashes(file_get_contents($file_img));
$dataTime = date("Y-m-d H:i:s"); //ok
$weight = 0; //ok
$yes = 1;

$sql_q = "INSERT INTO test.posts ( p_title,small_description, p_desc,p_img,p_weight,p_time,p_user_name,amount,yes_no)
 VALUES ('$title','$small_des','$des','$imgContent','$weight','$dataTime','$username','$amount_p','$yes');";

        $my_res = mysqli_query($link,$sql_q); //query execution
        if($my_res){
            
            header("Location: ../index.php?successfully-posted");
        }
        else echo "Query failed ";
mysqli_close($link);
  

?>