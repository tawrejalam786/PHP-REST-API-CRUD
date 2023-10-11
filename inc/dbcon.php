<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "php_api";

$conn = new mysqli($host, $username, $password, $dbname);

if(!$conn){
    die("Connection Failed:" . mysqli_connect_error());
}
?>