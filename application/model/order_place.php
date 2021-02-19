<?php

include '../controller/place_order.class.php';

$connector = new DbConnection();
$conn = $connector->connect();
$funObj = new Order();

echo $funObj->getAddress($conn,14);
?>
