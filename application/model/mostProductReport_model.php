<?php

$startDate="";
$finishDate="";


if(isset($_POST["generate"])){
    $db=new PDO('mysql:host=localhost;dbname=singlevendor','admin','1234');


    // include("../controller/mostProductReport.class.php");

    // include("../table.php");
    // include("../book_session.php");
    require('../../fpdf181/fpdf.php');
    // $dbObj=database::getInstance();
    // $dbObj->connect('localhost','root','','lms_db');

    // $connector = new DbConnection();
    // $conn = $connector->connect();
    // $funObj = new salesProduct();

    $startDate = new DateTime($_POST["startDate"]);
    $finishDate = new DateTime($_POST["finishDate"]);
    $sd=date_format($startDate,'Y-m-d');
        $fd=date_format($finishDate,'Y-m-d');
   

    $pdf = new FPDF();

    $pdf->AddPage();

   

    $topic = "Product Sales Report ( ".date_format($startDate,'Y-m-d')." - ".($_POST["finishDate"])." ) ";

    $pdf->SetFont("Arial","B",16);
    $pdf->Cell(190,20,$topic,1,1,"C",0,0);


    $pdf->SetFont("Arial","B",12);
    $pdf->Cell(190,20,"Products with most number of sales",0,0,"C",0,0);
    $pdf->Ln();


    $pdf->SetFont("Arial","B",10);
    $pdf->Cell(125,15,"product name",1,0,"C");
    $pdf->Cell(25,15,"product id",1,0,"C");
    //$pdf->Cell(50,15,"Date",1,0,"C");
    $pdf->Cell(20,15,"quantity",1,0,"C");
    $pdf->Ln();
    

    $pdf->SetFont("Arial","",10);
    $stmt=$db->query("SELECT * from `product_sales_report` where (summ=(getSumProduct('$sd','$fd')) and date>'$sd' and date<'$fd')");
    //$stmt=$db->query("SELECT * from `product_sales_report` where (summ=(select max(summ) from `product_sales_report` where date>'$sd' and date<'$fd') and date>'$sd' and date<'$fd')");
    // $stmt=$db->query("SELECT * from `product_sales_report` where (date>'$sd' and date<'$fd' and summ=(select max(summ) from `product_sales_report`))");
    // $stmt=$db->query("SELECT * from `product_sales_report` where (summ=(select max(summ) from `product_sales_report`))");
    while($data=$stmt->fetch(PDO::FETCH_OBJ)){
        $pdf->Cell(125,8,$data->product_name,1,0,"C");
        $pdf->Cell(25,8,$data->product_id,1,0,"L");
        //$pdf->Cell(50,8,$data->date,1,0,"L");
        $pdf->Cell(20,8,$data->summ,1,0,"L");
        $pdf->Ln();
    }
    $pdf->Ln(10);

    $pdf->SetFont("Arial","B",12);
    $pdf->Cell(190,20,"Categories with most number of sales",0,0,"C",0,0);
    $pdf->Ln();


    $pdf->SetFont("Arial","B",10);
    $pdf->Cell(55,15,"Category name",1,0,"C");
    $pdf->Cell(25,15,"category id",1,0,"C");
    //$pdf->Cell(50,15,"Date",1,0,"C");
    $pdf->Cell(20,15,"Total",1,0,"C");
    $pdf->Ln();
    

    $pdf->SetFont("Arial","",10);
    // $stmt2=$db->query("SELECT * from `category_sales_report` where (date>'$sd' and date<'$fd' and total=(select max(total) from `category_sales_report`))");
    $stmt2=$db->query("SELECT * from `category_sales_report` where (total=(getSumCategory('$sd','$fd')) and date>'$sd' and date<'$fd')");
    //$stmt2=$db->query("SELECT * from `category_sales_report` where (total=(select max(total) from `category_sales_report` where date>'$sd' and date<'$fd') and date>'$sd' and date<'$fd')");
    // $stmt=$db->query("SELECT * from `product_sales_report` where (summ=(select max(summ) from `product_sales_report`))");
    while($data2=$stmt2->fetch(PDO::FETCH_OBJ)){
        $pdf->Cell(55,8,$data2->category_name,1,0,"C");
        $pdf->Cell(25,8,$data2->category_id,1,0,"L");
        //$pdf->Cell(50,8,$data2->date,1,0,"L");
        $pdf->Cell(20,8,$data2->total,1,0,"L");
        $pdf->Ln();
    }
    $pdf->Ln(10);

    
    $pdf->Output();
    $dbObj->closeConnection();
}


?>
