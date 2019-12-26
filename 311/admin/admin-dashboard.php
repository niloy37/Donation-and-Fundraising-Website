<?php 
session_start();
if(!isset($_SESSION['userId'])){
    exit("<h1> You must be logged in as admin</h1>");

}
if($_SESSION['usertype'] != 1){
    exit("<h1>You are not an Admin of CharitAble<h1>");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CharitAble - Donate For Bangladesh!</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
    <link rel = "stylesheet" href = "../sc_head_foot/header.css">
    <link rel = "stylesheet" href = "../sc_head_foot/footer.css">

   

<?php require('../sc_head_foot/header.php'); ?>
</head>
<body>
    <br>
    
    <!-- content here -->	<table width="100%" cellpadding="5">

		<tr bgcolor="#eee" style="border-bottom: 2px solid #D82012;">

<td>
    <a href="./"><img src="../logo.png" alt="Logo" width="100" height="50" align="left" title="logo"></a><br>
</td>

<td colspan="" align="right">

    Welcome <strong><?= $_SESSION['fname'] ?>!</strong> | 

    Logged as: <strong><?= $_SESSION['userId'] ?></strong> | Email: <strong><?= $_SESSION['email'] ?></strong>  

    

</td>

</tr>

<tr>

<td width="14%" height="" bgcolor="#eee" valign="top">

    <nav>

        <ul>
            <li><a href="../index.php" style="margin-top:15px;display: block;" target="_blank"><span class="red">&#9784</span> Donation Feed</a></li>
            <li><a href="admin-dashboard.php"><span class="red">&#9784</span> Dashboard Home</a></li>
            <li><a href="adminposts.php"><span class="red">&#9784</span> Manage Posts</a></li>
            <li><a href="adminremove.php"><span class="red">&#9784</span> Remove Users</a></li>
            <li><a href="adminmessages.php"><span class="red">&#9784</span> Messages</a></li>
          
        </ul>

    </nav>

</td>

<td width="80%" height="520" valign="top" bgcolor="#fff" >
    <?php 
    include('../scripts/connect-to-database.php');
    $query  = "SELECT COUNT(DISTINCT id) as t FROM test.users";
    $r = mysqli_query($link, $query);
    $total_users = mysqli_fetch_array($r);
    
    $query2 = "SELECT COUNT(DISTINCT post_id) as po FROM test.posts";
    $p = mysqli_query ($link,$query2);
    $total_posts = mysqli_fetch_array($p);

    $query3 = "SELECT COUNT(DISTINCT m_id) as msgs FROM test.messages ";
    $m = mysqli_query($link,$query3);
    $total_msg = mysqli_fetch_array($m);
    
    
    $query4 = "SELECT COUNT(yes_no) as yn FROM test.posts WHERE yes_no <> 0";
    $qqq = mysqli_query($link,$query4);
    $result=mysqli_fetch_array($qqq);
    $closed = $total_posts['po'] - $result['yn'];    
    
    ?>

    <table width = "600" height = "50">
        <tr cellspacing = "100" cellpadding = "50">
  <h4>Total Users : <?php echo $total_users['t']; ?></h4> </tr>

  <tr><h4>Total Messages : <?php echo $total_msg['msgs']; ?> <h4></tr>

  <tr cellspacing = "100" cellpadding = "50"><td> Total Posts : <?php echo $total_posts['po']."</td>      <td>Posts Fullfilled: ".$closed." </td>     <td>  Posts Active: ".$result['yn']; ?> <td>             
</tr>

</table>             
                
               



</td>

</tr>

</table>






</body>



<?php require ('../sc_head_foot/footer.php'); ?>
</html>