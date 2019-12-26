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
    <link rel="stylesheet" href="signin.css">


    <!-- Custom styles for this template -->
    <!--  <link href="css/blog-home.css" rel="stylesheet">
-->
</head>
<!--Navigation Bar-->
<body>
        <div class = "wrapper">
        <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container">
                    <a class="navbar-brand" href="#">CharitAble</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Home
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="About.php">About</a>
                            </li>
        
                            <li class="nav-item">
                                <a class="nav-link" href="Contact.php">Contact</a>
                            </li>
                           
                        </ul>
                    </div>
                </div>
            </nav>



            
<!--Login Form-->
<div class="login-page">
    <div class="form">
      <form class="login-form" action = 'scripts/login.php' method = 'POST'>
            <input type="text" name = 'username' placeholder="username"/>
            <input type="password" name = 'password' placeholder="password"/>
            <button type = 'submit' value = 'Log In' name = 'login'>login</button>
            <p class="message">Not registered? <a href="Signup.php">Create an account</a></p>
          </form>
    </div>
    
  </div>
</div>

  <footer class="py-5">
        <div class="container">
            <p class="m-0 text-center text-light">Copyright &copy; CharitAble 2019</p>
        </div>
        <!-- /.container -->
    </footer>

</body>


  </html>