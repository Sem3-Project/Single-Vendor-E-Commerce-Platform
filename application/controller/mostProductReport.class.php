<?php

include 'DbConnection.class.php';
session_start();

class salesProduct{
    function __construct() {  
          
        // make the connection with database  
        $connector = new DbConnection();
        $conn = $connector->connect();  
    }  
    function __destruct() {  
          
    } //$search_query="SELECT * FROM `product` NATURAL INNER JOIN `category` WHERE product_name='$info[0]'";

    public function mostSalesProduct($conn,$startDate,$finishDate){ 
        $sd=date("Y-m-d",strtotime($startDate));
        $fd=date("Y-m-d",strtotime($finishDate)); 

        $sales= mysqli_query($conn,"SELECT * from `product_sales_report` where (date>'$sd' and date<'$fd' and summ=(select max(summ) from `product_sales_report`))") or die(mysqli_error($conn));  
        return $sales;      
    } 

}

?>