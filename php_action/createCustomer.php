<?php

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {

	$clientID 		= $_POST['clientID'];
	$clientName 		= $_POST['clientName'];
    $phoneNumber 			= $_POST['phone-number'];
    $secondaryNumber 			= $_POST['secondary-number'];
  $address 			= $_POST['address'];
  $landmark 				= $_POST['landmark'];
  $familyType 				= $_POST['family-type'];
  $familyCount 				= $_POST['family-count'];
  //$familyCount 				= $_POST['family-count'];

  $googleMap 			= "";
  //$googleMap 			= $_POST['google-map'];



	$sql = "INSERT INTO customer (client_id, client_name, phone_number, secondary_number, address, 	Landmark, family_type, family_count, google_map) 
	VALUES ('$clientID', '$clientName','$phoneNumber','$secondaryNumber', '$address', '$landmark', '$familyType', '$familyCount', '$googleMap')";

	/*$sql = "INSERT INTO product (product_name, product_image, product_cost, transport_cost, bottel_cost,margin_cost, brand_id, categories_id, quantity, rate, active, status)
	VALUES ('$productName', '$url','$productCost','$transport', '$bottel', '$margin', $brandName', '$categoryName', '$quantity', '$rate', '$productStatus', 1)";
*/
	if($connect->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Successfully Added";
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error while adding the members";
	}


	$connect->close();

	echo json_encode($valid);

} // /if $_POST
