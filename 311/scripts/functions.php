<?php

include("connect-to-database.php");


//FUNCTION TO check a USERNAME
function hasInvalidCharacters ($text){
    return (bool) preg_match('/[^a-z_\-0-9]/i' , $text);
}

//FUNCTION TO CHECK IF A USERNAME OR EMAIL ALREADY EXISTS
function userNew($user , $e , $link) {
 
  $sql = mysqli_query($link ,"SELECT * FROM test.users WHERE username = '$user' OR email = '$e'");

  if((mysqli_num_rows($sql)) >=1){
      return (bool) false;
  }
  else return (bool) true;
}

//VERIFY PASSOWRD FROM USER LOG IN
function verifyPassword ($login_username,$login_password , $link){
$sql = "SELECT password FROM test.users WHERE username = '$login_username';";
$res = mysqli_query($link , $sql);
if(mysqli_num_rows($res) != 1){
  echo "<br>
  <h1>FATAL DATABASE ERROR<h1>";
  return (bool) false;
}
else {
  $row = mysqli_fetch_array($res);

  mysqli_free_result($res); //freeing result set
}
return (bool) password_verify($login_password , $row['password'] );
}

function closeConn($link){
mysqli_close($link);
}

?>