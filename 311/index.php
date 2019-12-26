<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CharitAble - Donate For Bangladesh!</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="index.css">


    <!-- Custom styles for this template -->
    <!--  <link href="css/blog-home.css" rel="stylesheet">
-->
<?php require('sc_head_foot/header.php'); ?>
</head>

<body>
<br>
<br>
<style type= "text/CSS">
.outter {
     height : 25px; 
    width : 400px;
    border: solid 1px #000;
    /* Transitions */
    padding: 4px;
    
    background: rgba(0, 0, 0, 0.25);
    border-radius: 6px;
    -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.25), 0 1px rgba(255, 255, 255, 0.08);
    box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.25), 0 1px rgba(255, 255, 255, 0.08);
}
.inner {
    height:16px;
 
     /*echo percentage here*/ 
    border-right:solid 1px #000;
    background-color: #86e01e;
    
    /* Transitions*/
    border-radius: 4px;
      background-image: -webkit-linear-gradient(top, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.05));
    background-image: -moz-linear-gradient(top, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.05));
    background-image: -o-linear-gradient(top, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.05));
    background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.05));
    -webkit-transition: 0.4s linear;
    -moz-transition: 0.4s linear;
    -o-transition: 0.4s linear;
    transition: 0.4s linear;
    -webkit-transition-property: width, background-color;
    -moz-transition-property: width, background-color;
    -o-transition-property: width, background-color;
    transition-property: width, background-color;
    -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, 0.25), inset 0 1px rgba(255, 255, 255, 0.1);
    box-shadow: 0 0 1px 1px rgba(0, 0, 0, 0.25), inset 0 1px rgba(255, 255, 255, 0.1);
}
</style>








     <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="my-4"> <b>CharitAble</b>
                    <small>Donate For Bangladesh!</small>
                </h1>

                <!-- Blog Post -->

    <!-- To iterate the posts-->
                <?php
         include('scripts/connect-to-database.php');
                if( isset($_GET['value'])){
                    $i = $_GET['value'];
                    $init = $i*5;
                    $sql = "SELECT * FROM test.posts as p WHERE p.yes_no <> 0  ORDER BY (p_weight) desc LIMIT $init,5";
                    if($_GET['value'] != 0){
                    $start = false;
                    } else $start = true;
                }
                else {
                    $i = 0;
                    $sql = "SELECT * FROM test.posts as p WHERE p.yes_no <> 0 ORDER BY (p_weight) desc LIMIT 0,5;";
                    $start = true;
                }
              
              
               
                $res1 = mysqli_query($link,$sql);
                if(mysqli_num_rows($res1) == 0){
                    $endOfPage = false; 
             }
                while($prow = mysqli_fetch_array($res1)){ //to show posts
                      
                    

                    //cookie sending to update weight.
                      



        echo        '<div class="card mb-4">';
            echo        '<img class="card-img-top" src="data:image/jpeg;base64,'.base64_encode($prow['p_img']).'" alt="Card image cap">';
               echo     '<div class="card-body">';
                   echo     '<h2 class="card-title">'.$prow['p_title'].'</h2>';
                   echo         '<p class="card-text">'.$prow['small_description'].'</p>';
                   echo '<div class ="myrow">';
                   echo   '<div class = "col-1my">';

                   //before updating weight
                   $url = "scripts/update-weight.php?pid=".$prow['post_id']."&weight=".$prow['p_weight'];
                   echo  '<a href='.$url.' class="btn btn-primary">Read More &rarr;</a>';
                   echo '</div>';
                   
                   echo'<div class = "col-2my">';
                   //insert progress bar here
?>
 <?php

$don_amount = $prow['amount'];
//to get current donation amount of post
$pkpid = $prow['post_id'];

$cquery = "SELECT SUM(donation_amount) as t FROM test.donation WHERE d_post_id ='$pkpid'";
$cqrres = mysqli_query($link,$cquery);
$cqr = mysqli_fetch_array($cqrres); 
$current = $cqr['t'];
$percentage = round(($current/$don_amount)*100,1);
?>
  <div class = "text-muted" style = "margin:0 auto;">
<?php 
if($percentage != 0)
echo $percentage."% Donated";
else echo "No Donations yet, Be the First one!";
?>
</div>
<div class = "outter">
    <div class = "inner" style = "width: <?php echo $percentage;?>%;">
</div>

</div> 
<div class = "text-muted" style = "float:right;">
<?php echo "Total: ".$prow['amount']." BDT";?>
</div>
<div class = "text-muted" style = "float:left;">
<?php 
if(isset($current))
echo "Current: ".$current." BDT";
else echo "Current: 0 BDT";
?>


</div>

<?php
     //collecting user data
    $usname = $prow['p_user_name'];
    $findq = "SELECT id FROM test.users,test.posts WHERE username ='$usname'";
    $findans = mysqli_query($link,$findq);
    $uspk = mysqli_fetch_array($findans);
                $customurl = "profile.php?usid=".$uspk['id'];

                   echo    '</div>';
                   echo  '</div>';
                   echo    '</div>';
                   echo     '<div class="card-footer text-muted">';
                 echo   'Posted on '.$prow['p_time'].' by ';
                echo      '<a href="'.$customurl.'">'.$prow['p_user_name'].'</a>';
                echo    '</div>';
                echo  '</div>';
                  

               
            }          

           
                mysqli_free_result($res1);
                
              
                ?>

                <!-- Pagination -->
                <ul class="pagination justify-content-center mb-4">
                    <?php
                    if($start == true){
                    echo '<li class="page-item disabled">
                    <a class="page-link" href="#">&larr; Older</a>
                </li>';
            
            }
                else  {
                  echo '<li class="page-item">
                        <a class="page-link" href="scripts/old-page.php?value='.$i.'">&larr; Older</a>
                    </li>';
                }
                    ?>
                    <li class="page-item">
                       <?php
                       
                       echo '<a class="page-link" href="scripts/new-page.php?value='.$i.'">Newer &rarr;</a>'; ?>
                    </li>
                </ul>

            </div>
            
            
            
            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">
                <br>
                <br>
                <br>



                <!-- Categories Widget -->
                <div class="card my-4">
                    <h5 class="card-header text-light">Latest Donations!</h5>
                    <div class="card-body">
                        <div class="row">
                           <!-- feed here -->
                           <?php
                            $fsql = "SELECT p.p_title, d.donation_username, d.donation_amount FROM test.donation as d , test.posts as p WHERE d.d_post_id = p.post_id ORDER BY (d.donation_id) desc LIMIT 0,5;";
                            $fqres = mysqli_query($link,$fsql);
                            while($frow = mysqli_fetch_array($fqres))
                            {
                                echo '<div class =  text-muted>';
                                echo "&#10003; ".$frow['donation_username']." donated ".$frow['donation_amount']." BDT on ".$frow['p_title'];
                               echo '</div>';
                            }
                            

                           
                           ?>
                           
                        </div>
                    </div>
                </div>
                <!-- latest Posts! -->
                <div class="card my-4">
                    <h5 class="card-header text-light">Latest Posts!</h5>
                    <div class="card-body">
                        <?php
                            $lqr = "SELECT post_id,p_title,p_user_name,amount,p_weight FROM test.posts ORDER BY (post_id) desc LIMIT 0,5";
                            $lexec = mysqli_query($link,$lqr);
                            while($ans = mysqli_fetch_array($lexec)){


                                $rurl = "scripts/update-weight.php?pid=".$ans['post_id']."&weight=".$ans['p_weight'];

                                echo '<div class = "recentposts" style = "color : #3b4d6b;">';
                                echo $ans['p_user_name']." requested ".$ans['amount']." BDT on "." <a href=".$rurl.">".$ans['p_title']."</a>";
                                echo '</div>';
                            }
                    mysqli_close($link);
                        ?>
                        </div>
                </div>

                <!-- Side Widget -->
                <div class="card my-4">
                    <h5 class="card-header text-light">About</h5>
                    <div class="card-body">
                        CharitAble is a website made by Three students of North South University to combine the rich and poor digitally and eradicate the poverty of Bangladesh
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="https://ichef.bbci.co.uk/news/976/cpsprodpb/0EF1/production/_98352830_boy_getty.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Donate used utilities</h5>
                        <p class="card-text">According to World Bank, Bangladesh's poverty rate is 9% in 2018,as measured by the percentage of people living below the international extreme poverty line.</p>
                        <a href="#" class="btn btn-primary">Donate &#8640;</a>
                    </div>
                </div>

            </div>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    
        
        <?php require('sc_head_foot/footer.php'); ?>
        <!-- /.container -->
    

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>