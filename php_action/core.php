<?php

session_start();
error_reporting(E_ERROR | E_PARSE);

require_once 'db_connect.php';


if(!$_SESSION['userId']) {
	header('location: index.php');	
}



?>
