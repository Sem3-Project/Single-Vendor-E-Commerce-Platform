<?php

include('addProduct.class.php');

if(isset($_POST['create'])){
   
      $msg=insert_data($connection);
      
}else{
    echo'some error';
}

// insert query
function insert_data($connection){
   
      $procuct_name= legal_input($_POST['procuct_name']);
      $description= legal_input($_POST['description']);
      $weight = legal_input($_POST['weight']);
      $dimension = legal_input($_POST['dimension']);
    //   $sku = legal_input($_POST['sku']);
    //   $price = legal_input($_POST['price']);

    $query="INSERT INTO product(`procuct_name`,`description`,`weight`,`dimension`) VALUES ('$procuct_name','$description','$weight','$dimension')";

    //   $query="INSERT INTO (product inner join varient using (product_id))(procuct_name,'description','weight',dimension,sku,price) VALUES ('$procuct_name','$description','$weight','$dimension','$sku','$price')";
      $exec= mysqli_query($connection,$query);
      if($exec){

        $msg="Data was created sucessfully";
        return $msg;
      
      }else{
        $msg= "Error: " . $query . "<br>" . mysqli_error($connection);
      }
}

// convert illegal input to legal input
function legal_input($value) {
  $value = trim($value);
  $value = stripslashes($value);
  $value = htmlspecialchars($value);
  return $value;
}
?>
<!-- // <xmp>
// ?&gt;
// </body>
//     </html> -->