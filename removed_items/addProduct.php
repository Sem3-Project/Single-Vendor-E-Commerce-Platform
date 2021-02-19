<?php
extract($_POST); //Creates names as variable with value of submission

$fileType = $_FILES["profile_image"]["type"];
$fileSize = $_FILES["profile_image"]["size"];

if($fileSize/1024 > "2048") {
    //Its good idea to restrict large files to be uploaded.
    echo "Filesize is not correct it should equal to 2 MB or less than 2 MB.";
    exit();
} //FileSize Checking

if(
    $fileType != "image/png" &&
    $fileType != "image/gif" &&
    $fileType != "image/jpg" &&
    $fileType != "image/jpeg" &&
    $fileType != "application/vnd.openxmlformats-officedocument.wordprocessingml.document" &&
    $fileType != "application/zip" &&
    $fileType != "application/pdf"
) {
    echo "Sorry this file type is not supported we accept only. Jpeg, Gif, PNG, or ";
    exit();
} //file type checking ends here.

$upFile = "uploads/".date("Y_m_d_H_i_s").$_FILES["profile_image"]["name"];

if(is_uploaded_file($_FILES["profile_image"]["tmp_name"])) {
if(!move_uploaded_file($_FILES["profile_image"]["tmp_name"], $upFile)) {
    echo "Problem could not move file to destination. Please check again later. <a href="index.php">Please go back.</a>";
    exit;
}
} else {
echo "Problem: Possible file upload attack. Filename: ";
echo $_FILES["profile_image"]["name"];
exit;
}

$profile_image = $upFile;

echo $profile_image;
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form enctype="multipart/form-data" action="#" method="post">
	<input type="text" name="name" placeholder="Please enter your name…" /><br></br>

	<input type="email" name="email" required required placeholder="enter your email here.." /><br></br>

	<label>Upload Your Image:</label><br></br>
		<input type="file" name="profile_image" /><br></br>
	
	
	<input type="submit" value="Submit Page" />
</form> 
</body>
</html>