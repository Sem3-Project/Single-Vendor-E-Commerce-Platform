<?php
include('../../fpdf181/fpdf.php');
//include('../../controller/DbConnection.class.php');
include('../../controller/controllerUserData.php');
//$db=new PDO('mysql:host=localhost;dbname=new_reg','root','');


class myPDF extends FPDF{
    function header(){
        $this->SetFont('Arial','B',20);
        $this->Cell(0,10,'Order',0,0,'C');
        $this->Ln();
        $this->SetFont('Times','',12);
        $this->Cell(0,10,'Details',0,0,'C');
        $this->Ln(20);
    }

    // function footer(){
    //     $this->SetY(-15);
    //     $this->SetFont('Arial','',8);
    //     $this->Cell(0,10,'page'.$this->PageNo(),0,0,'C');
    // }

    // function headerTable(){
    //     $this->SetFont('Times','B',12);
    //     $this->Cell(40,10,'Name',1,0,'C');
    //     $this->Cell(20,10,'Age',1,0,'C');
    //     $this->Ln();
    // }

    function ViewTable($con1,$customer_id){//------------------------------this part should be change according to the form--------------------------------
        // $connector = new DbConnection();
        // $con1 = $connector->connect1();
        //$funObj = new orderPDF();
        //$customer_id=$_SESSION['customer_id'];
        // function ViewTable(){//------------------------------this part should be change according to the form--------------------------------

        // $db=new PDO('mysql:host=localhost;dbname=singlevendor','root','');


    // include("../controller/mostProductReport.class.php");

    // include("../table.php");
    // include("../book_session.php");
    // require('../../../fpdf181/fpdf.php');
    // $dbObj=database::getInstance();
    // $dbObj->connect('localhost','root','','lms_db');

    

    // $startDate = new DateTime($_POST["startDate"]);
    // $finishDate = new DateTime($_POST["finishDate"]);
    // $sd=date_format($startDate,'Y-m-d');
    //     $fd=date_format($finishDate,'Y-m-d');
   

    $pdf = new FPDF();

    $pdf->AddPage();

   

    $topic = "Order Details";

    $pdf->SetFont("Arial","B",16);
    $pdf->Cell(190,20,$topic,1,1,"C",0,0);
    $pdf->Ln();

    // $pdf->SetFont("Arial","B",12);
    // $pdf->Cell(190,20,"Products with most number of sales",0,0,"C",0,0);
    // $pdf->Ln();


    $pdf->SetFont("Arial","B",10);
    $pdf->Cell(125,15,"product name",1,0,"C");
    $pdf->Cell(17,15,"order id",1,0,"C");
    $pdf->Cell(35,15,"date",1,0,"C");
    $pdf->Cell(17,15,"quantity",1,0,"C");
    $pdf->Ln();
    

    $pdf->SetFont("Arial","",10);
    $stmt=mysqli_query($con1,"SELECT * from order_order_product where customer_id='$customer_id'");
    // $stmt=$db->query("SELECT * from order_order_product where customer_id='$customer_id'");
    // $stmt=$db->query("SELECT * from `product_sales_report` where (date>'$sd' and date<'$fd' and summ=(select max(summ) from `product_sales_report`))");
    // $stmt=$db->query("SELECT * from `product_sales_report` where (summ=(select max(summ) from `product_sales_report`))");
    // while($data=$stmt->fetch(PDO::FETCH_OBJ)){
    while($data=mysqli_fetch_object($stmt)){
        $pdf->Cell(125,8,$data->product_name,1,0,"C");
        $pdf->Cell(17,8,$data->order_id,1,0,"L");
        $pdf->Cell(35,8,$data->date,1,0,"L");
        $pdf->Cell(17,8,$data->quantity,1,0,"L");
        $pdf->Ln();
    }
    $pdf->Ln(10);

    // $pdf->SetFont("Arial","B",12);
    // $pdf->Cell(190,20,"Categories with most number of sales",0,0,"C",0,0);
    // $pdf->Ln();


    // $pdf->SetFont("Arial","B",10);
    // $pdf->Cell(55,15,"Category name",1,0,"C");
    // $pdf->Cell(25,15,"category id",1,0,"C");
    // $pdf->Cell(25,15,"Date",1,0,"C");
    // $pdf->Cell(20,15,"Total",1,0,"C");
    // $pdf->Ln();
    

    // $pdf->SetFont("Arial","",10);
    // // $stmt2=$db->query("SELECT * from `category_sales_report` where (date>'$sd' and date<'$fd' and total=(select max(total) from `category_sales_report`))");
    // $stmt2=$db->query("SELECT * from `category_sales_report` where (total=(select max(total) from `category_sales_report` where date>'$sd' and date<'$fd') and date>'$sd' and date<'$fd')");
    // // $stmt=$db->query("SELECT * from `product_sales_report` where (summ=(select max(summ) from `product_sales_report`))");
    // while($data2=$stmt2->fetch(PDO::FETCH_OBJ)){
    //     $pdf->Cell(55,8,$data2->category_name,1,0,"C");
    //     $pdf->Cell(25,8,$data2->category_id,1,0,"L");
    //     $pdf->Cell(25,8,$data2->date,1,0,"L");
    //     $pdf->Cell(20,8,$data2->total,1,0,"L");
    //     $pdf->Ln();
    // }
    // $pdf->Ln(10);

    
    $pdf->Output();
    $dbObj->closeConnection();
}
}

// $pdf=new myPDF();
//  $pdf->AliasNbPages();
// $pdf->AddPage('P','A4',0);
// // $pdf->headerTable();
// $pdf->ViewTable(15);
// $pdf->Output();




?>
