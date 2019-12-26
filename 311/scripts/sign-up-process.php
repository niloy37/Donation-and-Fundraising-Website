<?php
if(!isset($_POST['fname'])){
    exit("<h1> ERROR 404</h1>");
}
/* use of isset method  ( isset($_POST("signup"))); */
include("functions.php");

$fname = $_POST ['fname'];
$lname = $_POST ['lname'];
$email = $_POST ['email'];
$username = $_POST ['username'];
$pass1 = $_POST ['pass1'];
$pass2 = $_POST ['pass2'];


if($username == "" || $pass1 == "" || $lname == "" || $fname == "" || $email == "" || $pass2 == "") {
    echo "Incomplete Form, please fill";
}

else {
    
    if(hasInvalidCharacters($username)){
        echo "Inavalid Characters! in username";
    }
    else {
    
    if($pass1 == $pass2 && userNew($username , $email , $link)){

        $hashed_password = password_hash($pass1 , PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO test.users( username , password , email, fname , lname, usertype)
            VALUES('$username', '$hashed_password' , '$email' , '$fname', '$lname' , 0);";

            $res = mysqli_query($link,$sql);

        if($res) {
            $getid = "SELECT id FROM test.users WHERE username = '$username';";
            $exec_getid = mysqli_query($link, $getid);
            $get = mysqli_fetch_array($exec_getid);

            //userbalance trial
            $balance_insert_query = "INSERT INTO test.userbalance(b_user_name,balance) VALUES('$username',0);";
            $balance_exec = mysqli_query($link,$balance_insert_query);

            session_start();
            $_SESSION['usertype'] = 0;
            $_SESSION['userId'] = $username;
            $_SESSION ['un_id'] = $get['id'];
            header("Location: ../index.php?signup=successful");
        }

        else {
            echo " Failed to register ".mysqli_error();
        }


}
    
else {
    
    echo " <br> Password Don't Match! or Name or Email already exists";
}
    }

}
closeConn($link);
?>
