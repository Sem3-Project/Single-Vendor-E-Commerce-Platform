<?php
$db = mysqli_connect("localhost","root","","singlevendor"); //keep your db name
$sql = "SELECT `image` FROM product inner join varient using(product_id) WHERE product_id=8";
$sth = $db->query($sql);
$result=mysqli_fetch_array($sth);
echo '<img src="data:image/jpeg;base64,'.base64_encode( $result['image'] ).'"  width="150" height="150" />';




?>