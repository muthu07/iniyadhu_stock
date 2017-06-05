<?php

require_once 'core.php';

if (isset($_REQUEST['query'])) {
    $query = '%'.$_REQUEST['query'].'%';

  //  $sql = mysql_query ("SELECT zip, city FROM zips WHERE city LIKE '%{$query}%' OR zip LIKE '%{$query}%'");
  $sql = "SELECT client_id, client_name, phone_number FROM customer WHERE client_id LIKE '$query' OR client_name LIKE '$query'";
  $result = $connect->query($sql);
  $array = array();
   while($row = $result->fetch_array()) {

        $array[] = array (
            'label' => $row['client_id'],
            'value' => $row['client_id'].', '.$row['client_name'],
            'phone' => $row['phone_number'],
            'name' => $row['client_name'],
        );
    }
    //RETURN JSON ARRAY
    echo json_encode ($array);
}

?>
