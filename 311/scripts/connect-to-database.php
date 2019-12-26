<?php

$database = array();
$database['host'] = "localhost";
$database['port'] = "3306";
$database['name'] = "test";
$database['user'] = "root";
$database['password'] = "";

$link = mysqli_connect($database['host'], $database['user'], $database['password']);


if(!$link) {
    echo "Database not Found";
}


?>
