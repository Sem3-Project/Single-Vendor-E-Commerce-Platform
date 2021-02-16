<?php
include('../../../fpdf181/fpdf.php');
include('../../controller/orderPDF.class.php');
include('../../model/OrderPDF.php');
//$db=new PDO('mysql:host=localhost;dbname=new_reg','root','');

/////----------------this file needs customer id from the session-----------
$customer_id=14;
$pdf=new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0);
$pdf->ViewTable($customer_id);
$pdf->Output();



?>
