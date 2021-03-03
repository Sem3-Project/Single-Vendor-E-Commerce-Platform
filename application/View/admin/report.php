<!DOCTYPE html>
<html lang="en"> 

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Sales Reports</title> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
        <link rel="stylesheet" href="../../../public/css/login.css" />
        <style type="text/css">
        .wrapper{
            width: 50%;
            margin: 0 auto;
            background-color: #f2f2f2;
            margin-top: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
        
        
        </style>
     
    </head>
    <body >
    <a href="Homeadmin.php"><img class="login" src="../../../public/images/homeic.gif" style="width:6.5%; margin-top:13px; position: relative;"></a>

    <a href="../../view/signin/logout-user.php"><img class="login" src="../../../public/images/logout.gif" style="width:7%; margin-top:13px; margin-left:25px; position: absolute;"></a>
    <br><br><br>
    
    <center>
    <div class="wrapper" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                
    
    <h2 class="page-header" >Sales Reports</h2>
    <br>
    <a href="quarterlyReport.php">
        <button type="button"  name="quarter" id="quarter" style="background-color:rgb(236, 185, 17); 
            color:black;border: 1px solid black ;border-radius:5px; cursor: pointer;" ><h5>Quartely sales report</h5></button>
        </a><br><br>
    <a href="mostProductRepo.php">
    <button type="button" name="products" id="products" style="background-color:rgb(236, 185, 17); 
            color:black;border: 1px solid black ;border-radius:5px; cursor: pointer;"><h5>Product Sales and Product Category Report</h5></button>
     </a>       <br><br>
    <a href="interestTime.php">
    <button type="button" name="interest" id="interset" style="background-color:rgb(236, 185, 17); 
            color:black;border: 1px solid black ;border-radius:5px; cursor: pointer;"><h5>Most interested time period for a product</h5></button>
    </a><br><br> <br><br>     <br><br> 
</div>
</div>
            </div>        
        </div><br>
</center>
      
    </body>
   


</html>