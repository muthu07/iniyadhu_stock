<?php

$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "stock";
$siteurl = "http://localhost:9090";
$sitename="stock";
// db connection
$connect = new mysqli($localhost, $username, $password, $dbname);
// check connection
if($connect->connect_error) {
  die("Connection Failed : " . $connect->connect_error);
} else {
  // echo "Successfully connected";
}

?>
