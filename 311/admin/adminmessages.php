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

</tr> <?php
include('../scripts/connect-to-database.php');
if( isset($_GET['value'])){
                    $i = $_GET['value'];
                    $init = $i*5;
                    $sql = "SELECT * FROM test.messages ORDER BY (m_id) desc LIMIT $init,10";
                    if($_GET['value'] != 0){
                    $start = false;
                    } else $start = true;
                }
                else {
                    $i = 0;
                    $sql = "SELECT * FROM test.messages ORDER BY (m_id) desc LIMIT 0,10;";
                    $start = true;
                }
              
              
               
                $res1 = mysqli_query($link,$sql);
                if(mysqli_num_rows($res1) == 0){
                    $endOfPage = false; 

                    
             }
             ?>

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
if(mysqli_num_rows($res1) > 0){
    ?>
            <table width = "100%" height = "100">
            <tr>
                <?php
            echo "<th>Name</th>";
            echo "<th>Email</th>";
            echo "<th>Phone</th>";
            echo "<th>Message</th>";
            echo "</tr>";
            while($row = mysqli_fetch_array($res1)){
                echo "<tr>";
                echo "<td>" . $row['mname'] . "</td>";
                echo "<td>" . $row['memail'] . "</td>";
                echo "<td>" . $row['mphone'] . "</td>";
                echo "<td>" . $row['mmsg'] . "</td>";
                echo "</tr>";
                }
                echo "</table>";
                // Free result set
                mysqli_free_result($res1);
                }       
            
?>
<br>
<br>
<br>
<ul class="pagination justify-content-center mb-4">
                    <?php
                    if($start == true){
                    echo '<li class="page-item disabled">
                    <a class="page-link" href="#">&larr; Older</a>
                </li>';
            
            }
                else  {
                  echo '<li class="page-item">
                        <a class="page-link" href="../scripts/old-page-admin.php?value='.$i.'">&larr; Older</a>
                    </li>';
                }
                    ?>
                    <li class="page-item">
                       <?php
                       
                       echo '<a class="page-link" href="../scripts/new-page-admin.php?value='.$i.'">Newer &rarr;</a>'; ?>
                    </li>
                </ul>
</td>

</tr>

</table>






</body>



<?php require ('../sc_head_foot/footer.php'); ?>
</html>