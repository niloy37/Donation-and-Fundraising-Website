<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head> <link rel ="stylesheet" type = "text/css" href= "sc_head_foot/header.css"></head>
     <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
        <a class="navbar-brand" href="index.php">
          <img src="logo.png" alt="" width = "100" height="50">
        </a>
            <a class="navbar-brand" href="index.php">CharitAble</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="Contact.php">Contact</a>
                    </li>
                    <?php
                      
                      
                    
                      

                      if(isset($_SESSION['userId'])){
                        $logged_user = $_SESSION['usertype'];

                        $redirect_profile =$_SESSION['un_id'];
                        $redirect_profile_url = "profile.php?usid=".$redirect_profile;
                        echo '<li class =  "nav-item">
                        <div class="dropdown show">
                        <a class="nav-link btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          '.$_SESSION['userId'].'
                        </a>
                       
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                          <a class="dropdown-item" href="post.php">Create a new Post</a>
                          <a class="dropdown-item" href="'.$redirect_profile_url.'">Profile</a>';
                          if($logged_user == 1){
                            echo '<a class="dropdown-item" href="admin/admin-dashboard.php">Admin Panel</a>';
                          }
                          echo '<a class="dropdown-item" href="scripts/logout.php">Logout</a>';
                          
                        echo '</div>
                       </div>
                        </li>';
                         
                      }
                      else {
                         echo '<li class="nav-item"><a class="nav-link" href="Signin.php">Sign In</a></li>';
                         echo '<li class="nav-item"><a class="nav-link" href="Signup.php">Sign Up</a></li>';
                      }
                    ?>
                   
                </ul>
            </div>
        </div>
    </nav>

