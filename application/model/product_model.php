
<script type="text/javascript" src="../../public/js/sweetalert.min.js"></script>
<?php

require '../controller/DbConnection.class.php';
//require '../controllers/logout.php';

$connector = new DbConnection();
$conn = $connector->connect();

session_start();

$product_name="";
$description="";
$weight="";
$dimension="";

//get data from the form
function getData(){
    $data=array();
    $data[0]=$_POST['product_name'];
    $data[1]=$_POST['description'];
    $data[2]=$_POST['weight'];
    $data[3]=$_POST['dimension'];
    // $data[4]=$_POST['dimension'];

    
    return $data;
}

$bDetails = new table();

//search

if(isset($_POST['Search'])){

    $info=getData();
    $search_query="SELECT * FROM `product` WHERE product_name='$info[0]'";
    $search_result=mysqli_query($conn,$search_query);
        if($search_result){
            if($search_result){
                if(mysqli_num_rows($search_result)){
                    while($row = mysqli_fetch_array($search_result)){
        
                        $product_name=$row['product_name'];
                        $description=$row['description'];
                        $weight=$row['weight'];
                        $dimension=$row['dimension'];
                        
                    }
                }else{
                    echo '<script type="text/javascript">';
                    echo 'setTimeout(function () { swal("Error!","Please enter valid patient id","error");';
                    echo '}, 200);</script>';
                }
        }else{
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Error!","Result error!","error");';
            echo '}, 200);</script>';
        }
    }
}


//update
// if(isset($_POST['Update'])){
//     $info=getData();
//     $update_query="UPDATE `data` SET `id`='$info[0]',`BloodGroup`='$info[1]',`BMI`='$info[2]',`height`='$info[3]',`allergies`='$info[4]',
//     `Name_of_the_mother`='$info[5]',`Name_of_the_Hospital_Clinic`='$info[6]',`age`='$info[7]',`Name_of_the_Consultant_Obstetrician`='$info[8]',
//     `Name_of_the_field_Clinic`='$info[9]',`GramaNiladariDivision`='$info[10]',`RegistrationNoEligibleFamilyRegister`='$info[11]',
//     `RegistrationDateEligibleFamilyRegister`='$info[12]',`RegistrationNoPregnantmothersRegister`='$info[13]',
//     `RegistrationDatePregnantmothersRegister`='$info[14]',`IdentifiedAntenatalRiskConditionsModifiers`='$info[15]',`consanguinity`='$info[16]',
//     `RubellaImmunization`='$info[17]',`PrePregnancyScreeningDone`='$info[18]',`PreconceptionalFolicAcid`='$info[19]',
//     `Planed_pregnancy_or_not`='$info[20]',`Historyofsubfertility`='$info[21]',`Family_planing_method_last_used`='$info[22]',
//     `G`='$info[23]',`P`='$info[24]',`C`='$info[25]',`AgeOfYoungestChild`='$info[26]',`LRMP`='$info[27]',`EDD`='$info[28]',
//     `US_corrected_EDD`='$info[29]',`POA_at_dating_Scan`='$info[30]',`Date_of_Quickening`='$info[31]',`POA_at_Registration`='$info[32]', `tele`='$info[33]'  
//     WHERE id='$info[0]'";

//     try{
//         $pdate_result=$bDetails->featuredLoad($dbObj,$update_query);
//         if($pdate_result){
//             echo '<script type="text/javascript">';
//             echo 'setTimeout(function () { swal("Success!","Data updated successfully!","success");';
//             echo '}, 200);</script>';
           
//         }
//     }catch(Exception $ex){
//         echo '<script type="text/javascript">';
//         echo 'setTimeout(function () { swal("Error!","Result error!","error");';
//         echo '}, 200);</script>';
//     }
// }

?>