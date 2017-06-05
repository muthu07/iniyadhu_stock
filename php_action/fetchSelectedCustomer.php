<?php

require_once 'core.php';

$customerId = $_POST['customerId'];

$sql = "SELECT client_id, client_name, phone_number, secondary_number, address, Landmark, family_type, family_count, google_map FROM customer WHERE client_id = '$customerId'";
$result = $connect->query($sql);

if($result->num_rows > 0) {
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);
