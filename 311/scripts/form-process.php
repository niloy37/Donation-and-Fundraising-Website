<?php 
if(!isset($_POST['message'])){
    exit("<h1>Cannot Access directly! Try Through Contact Page</h1>");
}
session_start();

include("functions.php");
//if session user active
if(!isset($_SESSION['userId'])){
$name = $_POST['name'];
$email = $_POST['email'];
$phn = $_POST['phone'];
$msg = $_POST['message'];

if($name != "" && $email != "" && $msg != "" ){

$sql = "INSERT INTO test.messages(mname,memail,mphone,mmsg)  
        VALUES ('$name','$email','$phn','$msg');";

        $result = mysqli_query($link,$sql);
if($result) {
    header("Location: ../Contact.php?message-sent-success");
}
else {
    header("Location: ../Contact.php?failedtosendmessage");
}

}
else {
    header("Location: ../Contact.php?error=incomplete");
}
}

else {
    
    $message = $_POST['message'];
    if($message == ""){
        header("Location: ../Contact.php?message-cannot-be-empty");
    } else {
       
        $userid_c = $_SESSION['userId']; 
        $fetch_sql = "SELECT fname,lname,email FROM test.users WHERE username ='$userid_c'";
      if(  $res = mysqli_query($link,$fetch_sql)){

        
        // mysqli_free_result($res);
        if(mysqli_num_rows($res) > 0){
            $row = mysqli_fetch_array($res);
            $nuser = $row['fname']." ".$row['lname'];
        $nemail = $row['email'];

    
        $sql = "INSERT INTO test.messages(mname,memail,mmsg)
                    VALUES ('$nuser','$nemail','$message')";
                    $insertion = mysqli_query($link,$sql);
                    if($insertion){
                        
                        header("Location: ../Contact.php?success =".$userid_c );
                    }
                    else  {
                        header("Location: ../Contact.php?failed");
                    }
    } 
    
}
else echo "Failed";
}
} 

    


closeConn($link);
?>
