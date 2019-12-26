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

   

<?php require('../sc_head_foot/header.php');
include ('../scripts/connect-to-database.php');
?>
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
    
<h3>Remove a user! </h3> 
<p>Search a user by username [WARNING : Removing a USER will remove his/her posts as well]</p>


<form action = "?" method = "post">
<input type = "text" name = "usn" placeholder="Enter Username" required>
<input type = "submit" value ="Search">
</form>

<?php 
 
if(isset($_POST['usn'])){
    $usn = $_POST['usn'];
$sqltitle = "SELECT id, fname, lname, username,email FROM test.users WHERE username LIKE '%$usn%'";

$exec_search = mysqli_query($link,$sqltitle);
if(mysqli_num_rows($exec_search) > 0){
    ?>
    <table width ="800" height = "100">
    <tr cellspacing="100" cellpadding = "50">
        <th>User id</th>
     <th>First Name</th> 
     <th>Last Name</th>
     <th>Username</th> 
     <th>email</th>
     
    
</tr>
<?php

 while($ress = mysqli_fetch_array($exec_search)){
     echo '<tr cellspacing="100" cellpadding = "50">';
     echo '<td>'.$ress['id'].'</td>';
     echo '<td>'.$ress['fname'].'</td>';
     echo '<td>'.$ress['lname'].'</td>';
     echo '<td>'.$ress['username'].'</td>';
     echo '<td>'.$ress['email'].'</td>';
    
     
 }
 echo '</table>';


//form ?>

<form action = "?" method ="POST">
<input type = "number" name = "delete" placeholder = "Enter USER ID" required>
<input type = "submit" value = "Confirm Delete">
</form>


<?php



} else {
    
    echo 'No Result Found!';
}



} 
if(isset($_POST['delete'])){
    $deleteid = $_POST['delete'];
    $checkquery = "SELECT usertype FROM test.users WHERE id = '$deleteid';";
     $res_search = mysqli_query($link,$checkquery);
     $asn = mysqli_fetch_array($res_search);

    
    if($asn['usertype'] == 0){
    $delte_query = "DELETE FROM test.users WHERE id = '$deleteid'";
    $exec_delete = mysqli_query($link,$delte_query);
    if($exec_delete){
        echo "<strong>User '$deleteid' has been deleted successfully</strong><br>";

        $postsfindquery = "SELECT post_id FROM test.posts WHERE p_user_name NOT IN (SELECT DISTINCT username FROM test.users);";
        $exec_find_query = mysqli_query($link,$postsfindquery);
        if(mysqli_num_rows($exec_find_query)){
        while($d_p = mysqli_fetch_array($exec_find_query)){
            $deletepostid = $d_p['post_id'];
            $queries = "DELETE FROM test.posts WHERE post_id = '$deletepostid';";
            $ifnif = mysqli_query($link,$queries);

        }
        if($ifnif){
            echo '<strong>All the Users post has been deleted</strong><br>';
        }
        else {
            echo '<strong>post deletion error<strong><br>';
        }
    } else 
    echo '<strong>User had not post yet, no post was removed</strong><br>';

    }
    
}
else {
    echo "<strong>User '$deleteid' cannot be deleted(ERROR : USER is an admin)</strong><br>";
}
}
?>


</td>

</tr>

</table>






</body>



<?php require ('../sc_head_foot/footer.php'); ?>
</html>