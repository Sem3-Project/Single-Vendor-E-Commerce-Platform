<?php
include 'application/controller/DbConnection.class.php';
$connector = new DbConnection();
$conn = $connector->connect();

?>