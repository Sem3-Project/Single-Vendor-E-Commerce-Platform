<?php 
$conn=mysqli_connect("localhost","root","","db");

// $query = mysqli_query($conn, "SELECT * FROM test");
// $i=-1;
// $idarr = array();
// // $namearr = array();
// while ($row = mysqli_fetch_assoc($query)) {
//     $i++;
//     $temp = array();
//     $output[$i]['id'] = $row['id'];
//     $output[$i]['name'] = $row['name'];
//     array_push($idarr, array_push($temp,$output[$i]['id'],$output[$i]['name']));
//     // array_push($namearr,$output[$i]['name']);
//    // echo $output[$i]['name']; 
// }

$query = mysqli_query($conn,"INSERT INTO `insertdb` (`idcopy`,`namecopy`) SELECT (`id`,`name`) FROM `test`");

// foreach($idarr as $key=>$value){
//     print " $value\n";
//     $queryInsert = mysqli_query($conn, "INSERT INTO insertdb(idcopy) VALUES ($value)");
// }
// foreach($idarr as $key=>$value){
//    echo $value;
// }

?>