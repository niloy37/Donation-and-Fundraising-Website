<html>

<head>
    <title>Post</title>
    <link rel="stylesheet" href="readmore.css">
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CharitAble - Donate For Bangladesh!</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
    <?php 
    require('sc_head_foot/header.php');
    ?>
</head>

<body>
<?php
//getting information of posts all the things required
//fetch primary key from url 
include("scripts/connect-to-database.php");
$primarykey = $_GET['pk'];

$sqlquery1 = "SELECT * FROM test.posts WHERE post_id = $primarykey;";

$exec = mysqli_query($link, $sqlquery1);
$res = mysqli_fetch_array($exec);
?>


    <div class="mycontainer12">
        <div class="myrow12">
            <div class="col-7">
                <header>
                    <h1 class="section2header"> <?php echo $res['p_title']; ?>  </h1>
                </header>

                <article>
                    <p> <?php echo $res['small_description']; ?>
</p>
                </article>


            </div>
            <div class="col-5">
                <div class="slopeIcon">
                  
                    <?php    echo' <img src="data:image/jpeg;base64,'.base64_encode($res['p_img']).'"" width="550" height="350">';  ?>  
                </div>
            </div>
        </div>
    </div>
    <hr>



    <div class="con">
        <article>
            <p><?php echo $res['p_desc']; ?>
            </p>
            <p><strong>Total Amount Required : <?php echo $res['amount'] ?> by <?php echo $res['p_user_name']?></strong></p>
        </article>

    </div>

    <?php if(isset($_SESSION['userId'])){
        $_SESSION['post'] =  $res['post_id']; 
        $_SESSION['money'] = $res['amount'];        
  echo '  <div class="wrap133">';
  if(isset($_GET['success'])){
      echo '<strong>Thank you for your donation!</strong>';
  }      //required amount has to be set
  echo '
        <h2>Donate Here</h2>
        <form class = "donation-form" action = "scripts/take-donation.php" action = "POST">
            <input type="number" name="dodo" placeholder="Amount" required>
            <input type="submit" value="Donate">
        </form>
    </div>';
    } else  {
        echo '<div class=  "wrap133">';
        echo '<a href ="Signin.php">Sign in</a> <strong>to Donate</strong>';
        echo '</div>';
    }
?>

<br>
<br>




<?php require('sc_head_foot/footer.php')?>


</body>



</html>
