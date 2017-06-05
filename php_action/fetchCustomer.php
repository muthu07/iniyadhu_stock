<?php



require_once 'core.php';

$sql = "SELECT customer.client_id, customer.client_name, customer.phone_number, customer.secondary_number, customer.address, customer.landmark, customer.family_type, customer.family_count, customer.google_map FROM customer";



$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) {

 // $row = $result->fetch_array();
 $active = "";

 while($row = $result->fetch_array()) {
 	$customerId = $row[0];
 	// active

 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a type="button" data-toggle="modal" id="editCustomerModalBtn" data-target="#editCustomerModal" onclick="editCustomer(`'.$customerId.'`)"> <i class="glyphicon glyphicon-edit"></i> Edit</a></li>
	    <li><a type="button" data-toggle="modal" data-target="#removeCustomerModal" id="removeCustomerBtn" onclick="removeCustomer(`'.$customerId.'`)"> <i class="glyphicon glyphicon-trash"></i> Remove</a></li>
	  </ul>
	</div>';

	// $brandId = $row[3];
	// $brandSql = "SELECT * FROM brands WHERE brand_id = $brandId";
	// $brandData = $connect->query($sql);
	// $brand = "";
	// while($row = $brandData->fetch_assoc()) {
	// 	$brand = $row['brand_name'];
	// }

 	$output['data'][] = array(
 		// image
 		$row[0],
 		// product name
 		$row[1],
 		// rate
 		$row[2],

 		$row[4],
 		// quantity
 		$row[5],
 		// brand
 		$row[6],
 		// category
 		$row[7],
 		// active
 		//$row[8],
 		// button
 		$button
 		);
 } // /while

}// if num_rows

$connect->close();

echo json_encode($output);
