<?php
include 'DbConnection.class.php';

class Home_Default{  
            
    function __construct() {   
        $connector = new DbConnection();
        $conn = $connector->connect();  
    }  
    function __destruct() {  
          
    } 
    public function filter($query){
        include '../controller/DbConnection.class.php';
        $connector = new DbConnection();
        $conn = $connector->connect();
        $filter_result=mysqli_query($conn,$query);
        return $filter_result;
    
    }
    
    public function Selection($conn,$category_id,$subcat_id){  
        $query = "SELECT product_name,product_id,`image` FROM `product` inner join `varient` using(product_id) where (category_id='$category_id' and subcat_id='$subcat_id')";  
        return $query;

    }

    // public function DefaultSearch(){
    //     $query = "CALL ProductSelection()";  
    //     $funObj = new Home_Default();
    //     $sr=$funobj->filter($query);
    //     return $sr;
    // }

    // public function categorySearching($conn){
    //     $result = mysqli_query($conn,"SELECT * FROM category order by category_name");
    //     return $result;
    // }
    

}  
?>  
