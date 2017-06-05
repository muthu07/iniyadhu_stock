<?php

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {

	$productName 		= $_POST['productName'];
  // $productImage 	= $_POST['productImage'];
  $quantity 			= $_POST['quantity'];
  $productCost 			= $_POST['product-cost'];
  $transport 			= $_POST['transport'];
  $bottel 				= $_POST['bottel'];
  $margin 				= $_POST['margin'];
  $rate 				= $_POST['rate'];
  $brandName 			= $_POST['brandName'];
  $categoryName 	= $_POST['categoryName'];
  $productStatus 	= $_POST['productStatus'];
	$productDesc =" ";

	$type = explode('.', $_FILES['productImage']['name']);
	$type = $type[count($type)-1];
	$url = '../assests/images/stock/'.uniqid(rand()).'.'.$type;
	if(in_array($type, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {

		if(is_uploaded_file($_FILES['productImage']['tmp_name'])) {
			if(move_uploaded_file($_FILES['productImage']['tmp_name'], $url)) {

				$sql = "INSERT INTO product (product_name, product_image, product_cost, transport_cost, bottel_cost,margin_cost, brand_id, categories_id, quantity, rate, active, status,product_desc)
				VALUES ('$productName', '$url',$productCost,$transport, $bottel , $margin, $brandName, $categoryName, '$quantity', '$rate', $productStatus, 1,'$productDesc')";
				if($connect->query($sql) === TRUE) {
					$valid['success'] = true;
					$valid['messages'] = "Successfully Added";
				} else {

					$valid['success'] = false;
					$valid['messages'] = "Error while adding the members";
				}

			}	else {

				return false;
			}	// /else
		} // if
	} // if in_array

	$connect->close();

	echo json_encode($valid);

} // /if $_POST
