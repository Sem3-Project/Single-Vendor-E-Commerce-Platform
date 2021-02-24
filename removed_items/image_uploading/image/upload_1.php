<?php 
// Include the database configuration file  
require_once 'dbConfig.php'; 
 
// If file upload form is submitted 
// $status = $statusMsg = ''; 
if(isset($_POST["submit"])){ 
    $varient_1=$_POST['varient_1'];
    $imgContent=""; 
    if(!empty($_FILES["image"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif');
        
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); }
         
            // Insert image content into database 
            $insert = $db->query("INSERT into image (image, varient_1) VALUES ('$imgContent','$varient_1' )");
        // echo "done"; 
    }}
             
            
         
 
// Display status message 
 
?>