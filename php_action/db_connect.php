<?php
$localhost = "localhost";
$username = "u901027382_stock";
$password = "pass@123";
$dbname = "u901027382_stock";
$siteurl = "http://www.iniyadhu.com/stock";
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
