<?php 
if(!isset($_POST['username'])){
    exit("<h1>Cannot Access directly! Try Through Signin Page</h1>");
}


include('functions.php');
$username = $_POST['username'];
$password = $_POST['password'];
  
if($username == "" || $password ==""){
    echo "Username or Password Cannot be NULL!";
}
else if(hasInvalidCharacters($username)) {
echo "Username has invalid characters!";
}
else {
if(verifyPassword($username, $password , $link)){
    
    session_start();
    $_SESSION['is_open'] = true;
    $_SESSION['userId'] = $username;
    //retrive user account information
    $myq = "SELECT * FROM test.users WHERE username='$username'";
    $userq = mysqli_query($link,$myq);
   
    $userdata = mysqli_fetch_array($userq);
    $_SESSION['email'] = $userdata['email'];
    $_SESSION['fname'] = $userdata['fname'];
    $_SESSION['lname'] = $userdata['lname'];
    $_SESSION['un_id'] = $userdata['id'];
    $_SESSION['usertype'] = $userdata['usertype'];
     mysqli_free_result($userq);
     closeConn($linkhome);
    header("Location: ../index.php?login=success");
    exit();
}
else {
    echo "Password Dont match! ";
}

}

closeConn($link);
?>