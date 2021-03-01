<?php
include('../../../fpdf181/fpdf.php');
//include('../../controller/orderPDF.class.php');
include('../../model/OrderPDF.php');
//$db=new PDO('mysql:host=localhost;dbname=new_reg','root','');

/////----------------this file needs customer id from the session-----------
//$customer_id=$_SESSION['customer_id'];
//echo $_SESSION['customer_id'];
$pdf=new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0);
$pdf->ViewTable($con1,$_SESSION['customer_id']);
$pdf->Output();



?>
