<!DOCTYPE html>
<html lang = "en">

<head>
<title>Create a new Post!</title>

<!--Metas-->
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


     <!-- Bootstrap core CSS -->
     <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="post.css">


     <?php require("sc_head_foot/header.php"); ?>
 

</head>

<body>

<?php 

if( !isset($_SESSION['userId'])){
  header("Location: signin.php?sign-in-first");
}

?>      
         <!-- Navigation -->
         
        <br> <br>
        <!-- content -->
 
       <div class = "wrap">
           <h2> Create a new Donation Post!</h2>
            <form action = "scripts/create_post.php" method = "POST" enctype = "multipart/form-data" class = "myform">
            <label for= "title"><strong>Title</strong></label>
            
            
            <input type = "text" name = "title" placeholder = "Enter Title"> <br>
            
            <label for= "s_desc"><strong>Small Description</strong></label>
            <input type = "text" name = "s_desc" placeholder = "Enter Small Description"> <br>
            
            <label for= "desc"><strong>Description</strong></label>
            <textarea id = "des-id" cols = "30" rows ="10" name = "desc" placeholder = "Describe.."> </textarea><br>
            
            <label for= "amount"><strong>Required Donation</strong></label>
            <input type = "number" name = "amount" placeholder = "Amount (BDT)"> <br>
            
            
            <input type = "file" name = "image"> <br>
            <input type = "submit" name = "submit" value ="Upload"> <br>

        </form>
    </div>


  





    <!-- footer -->

<footer class="py-5">
    <div class="container">
        <p class="m-0 text-center text-light">Copyright &copy; CharitAble 2019</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


</body>


</body>
</html>



