<!DOCTYPE html>

<html>
    <head>
        <title>Sign UP</title>
      
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sign Up!</title>
   
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
   
    <link rel="stylesheet" type = "text/css" href="signup.css">

    <?php require("sc_head_foot/header.php") ?>
    </head>
    
    
    <body>
     
       

        <!-- Content-->       
        <div class="wrap">
        <h2>Sign up for CharitAble</h2>
        <form action = 'scripts/sign-up-process.php' method = 'POST'>
            <input type="text"   name = 'fname'    placeholder="First Name" required>
            <input type="text"   name = 'lname'    placeholder="Last Name" required>
            <input type="email"   name = 'email'    placeholder="Email" required>
            <input type="text"     name = 'username'  placeholder="Username" required>
            <input type="password"  name = 'pass1' placeholder="Password" required>
            <input type="password"  name = 'pass2' placeholder="Repeat Password" required>
            <input type="submit" value="Sign up">
            
        
        
        
        </form>
        </div>
    <br>
    <br>
       
                <!--footer-->
           
        


            
       
   
    </body>

    <?php require("sc_head_foot/footer.php") ?>


</html>