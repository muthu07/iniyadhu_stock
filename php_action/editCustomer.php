<?php

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {
	$client_id = $_POST['client_id'];
	$client_name = $_POST['editClientName'];
  $phone_number = $_POST['editPhone-number'];
  $secondary_number = $_POST['editSecondary-number'];
  $address = $_POST['editAddress'];
  $Landmark = $_POST['editLandmark'];
  $family_type = $_POST['editFamily-type'];
	$family_count = $_POST['editFamily-count'];


	$sql = "UPDATE customer SET client_name = '$client_name', phone_number = '$phone_number', secondary_number = '$secondary_number', address = '$address', Landmark = '$Landmark', family_type = '$family_type', family_count = '$family_count' WHERE client_id = '$client_id'";

	if($connect->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Successfully Update";
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error while updating product info";
	}


} // /$_POST

$connect->close();

echo json_encode($valid);
