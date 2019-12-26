<?php 
if(!isset($_GET['usid']))
{
    exit("Error, Incomplete URL Cannot Direct Access profile!");
}
?>
<DOCTYPE html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CharitAble - Donate For Bangladesh!</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
    
    <?php require('sc_head_foot/header.php'); ?>
    

    <!-- Custom styles for this template -->
    <!--  <link href="css/blog-home.css" rel="stylesheet">
-->
<link rel="stylesheet" href="profile.css">

</head>


<?php

 

include('scripts/connect-to-database.php');
$pkuser =$_GET['usid'];
$user_info_query = "SELECT id,fname,lname,username,email FROM test.users WHERE id = '$pkuser'";
$user_info_query_execution = mysqli_query($link,$user_info_query);
$userinfo = mysqli_fetch_array($user_info_query_execution);
$userinfo_username = $userinfo['username'];
$mysqlquery = "SELECT p.post_id , p.p_title , p.amount, p.p_time FROM test.posts as p , test.users as u WHERE  u.id = '$pkuser' AND p.p_user_name = u.username ORDER BY(p.p_time) LIMIT 0,5;";
$mysqlresult = mysqli_query($link,$mysqlquery);
$user_name_profile = $userinfo['username'];
$don_query = "SELECT d.donation_amount,p.p_title FROM test.donation as d , test.posts as p WHERE p.post_id = d.d_post_id AND d.donation_username ='$user_name_profile' ORDER BY(donation_id) desc LIMIT 0,5 ";
$donationresult = mysqli_query($link,$don_query);


?>






<body>
<br>
<br>
<br>
<br>
<!--start-->


<br>
<br>
<br>
<br>
<br> <br>
            <br>
            <br>
            <br>
            <div class = "mainrow">
<div class="row2">
<div class = "col-6">
        <div class="pic_base">
           
            <img src="profile.jpg" width=200 id="profile_pic" alt="">
        </div>
        <div class="content_base">
            <br>
            <br>
            <br>
            <br>
            <br>

            <h1 id="title"><?php echo $userinfo['fname']." ".$userinfo['lname']?></h1>
            <br>
            <br>
            <h2 id="profession">Bio</h2>
            <br>
            <br>
            <br>
            <br>
            <br>
            
            <p id="content">
    
            
                ----------------------------------------------------------
                <br> 
            <p><strong>Account info:</strong> <br> </p>
            <p>Username: <?php echo $userinfo['username'] ?> <br> </p>
            </p> Email: <?php echo $userinfo['email'] ?> <br> </p>
             
             <p>User ID: <?php echo $userinfo['id'] ?> </p>
             <?php 
             if(isset($_SESSION['userId'])){
                 if($_SESSION['userId'] == $userinfo_username){
                     //get userbalance query
                     $sql_get_balance = "SELECT balance FROM test.userbalance WHERE b_user_name = '$userinfo_username';";
                    $balance_result= mysqli_query($link,$sql_get_balance);
                    $final = mysqli_fetch_array($balance_result);
                    if(isset($final['balance']))
                     echo'<p>Total Donations Recieved: '.$final['balance'].' BDT</p>';
                     else echo'<p>Total Donations Recieved: 0 BDT </p>';
                 }
             }
           
           
           mysqli_close($link);
             ?>              
            <br><br>
            
        </p>
        <br>
        <br>
        <br>
        
        </div>

    </div>

</div>
    <div class = "col-4" >
   <p> <strong>Donation history:</strong></p> 
   <?php
   if(mysqli_num_rows($donationresult) > 0){
    while($d = mysqli_fetch_array($donationresult)){   
    echo $userinfo_username." donated ".$d['donation_amount'].' BDT on '.$d['p_title'].'<br>'; 
    }
   }
   ?>
   <br>
    <p> <strong>Post History </strong> </p>
   <?php 
    if(mysqli_num_rows($mysqlresult)> 0){
        while($p = mysqli_fetch_array($mysqlresult)){   
        echo $userinfo_username." requested ".$p['amount'].' BDT on topic '.$p['p_title'].'<br>'; 
        }
       }
   
   ?>

</div> 
     
</div>





<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


<!--footer -->
 <?php
    require('sc_head_foot/footer.php');
   ?> 
</body>

</html>
