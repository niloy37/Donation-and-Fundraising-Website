<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-------Linked----->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
    <link href="Contact.css" type="text/CSS" rel="stylesheet">
    <link href = "sc_head_foot/header.css" type = "text/css" rel = "stylesheet">
    <link href = "sc_head_foot/footer.css" type = "text/css" rel = "stylesheet">
    <!------updt ends----->
    <title>CharitAble - Donate For Bangladesh!</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/blog-home.css" rel="stylesheet">

   
   <?php include('sc_head_foot/header.php');?>
</head>

<body>
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">CharitAble Contact</h1>
            <p class="lead text-muted mb-0">Donate for Bangladesh!

            </p>

        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-secondary text-white"><i class="fa fa-envelope"></i> Contact us.
                    </div>
                    <div class="card-body" >

                        <!--form-->
                        <div class="container">
                            
                            <form id="contact" action="scripts/form-process.php" method="POST">
                   
                  
                   
                  <?php     
                  
                            if(!isset($_SESSION['userId'])){
                        echo '<input type = "text" placeholder=" Enter Name*" name = "name">';
                        echo '<input type = "email" placeholder=" Enter Email Address*" name = "email">';
                        echo '<input type = "text" placeholder=" Enter Phone Number (Optional)" name = "phone">';
                            

                    
                    }
                        //end
                        ?>
                        <textarea id = "des-id" type = "text" cols = "30" rows = "7" placeholder=" Type Message you want to send" name = "message"> </textarea>
                        <button type = "submit" >Submit</button>
                            </form>



                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="card bg-light mb-3">
                    <div class="card-header text-white text-uppercase"><i class="fa fa-home"></i> Address</div>
                    <div class="card-body">
                        <p>North South University</p>
                        <p>Basundhara R/A Dhaka</p>
                        <p>Bangladesh</p>
                        <p>Email : info@charitable.com</p>
                        <p>Tel. +88 017 922 22 222</p>

                    </div>

                </div>
            </div>
        </div>
    </div>
<br>

    <!-- Footer -->
    <footer class="text-light">
        <?php require('sc_head_foot/footer.php'); ?>
    </footer>

</body>

</html>
