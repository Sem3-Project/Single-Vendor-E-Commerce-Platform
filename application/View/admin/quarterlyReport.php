<?php
include '../../controller/DbConnection.class.php';
$connector = new DbConnection();
$conn = $connector->connect();
global $conn;
if (isset($_POST['submit'])){
    $getyear = $_POST['year'];

    $sql ="SELECT QUARTER(date) as Quarter,sum(total_price) as Total from quartely_sales where YEAR(date)=$getyear GROUP BY Quarter ORDER BY Quarter";
    $result = mysqli_query($conn,$sql);
    $chart_data="";
    while ($row = mysqli_fetch_array($result)) { 
        $productname[]  = $row['Quarter']  ;
        $sales[] = $row['Total'];
    }
    $query1 = "SELECT product_name,sum(total_price) as price, QUARTER(date) as quarter from quartely_sales where YEAR(date)=$getyear group by product_name,quarter";
    $res = mysqli_query($conn,$query1);
    
        
}

?>

<!DOCTYPE html>
<html lang="en"> 

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <link rel="stylesheet" href="../../../public/css/bootstrap.min.css">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../../public/css/login2.css" />
        <link rel="stylesheet" href="../../../public/css/tablenew.css" />
        <title>Graph</title> 
        
    </head>
    <body >

    <center><form method="POST" style="margin-top:80px;fontSize: 25px">
    
    <h2 class="page-header" >Quarterly sales Reports</h2>
        Year:
        <select name="year" width="200px">
            <option disabled selected >-- Select Year --</option>
            <?php
                $records = mysqli_query($conn, "SELECT DISTINCT YEAR(date) as selected_year From quartely_sales");  
                while($data = mysqli_fetch_array($records)){
                    echo "<option value='". $data['selected_year'] ."'>" .$data['selected_year'] ."</option>";  
                }
            ?>
        </select>
        <input type="submit" name="submit" value="Search"/><br><br>
    </form></center>

    </body>
   
    <script type="text/javascript" >
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart(){
            var data = google.visualization.arrayToDataTable([
                ['Quarter', 'Total'],
                <?php
                    foreach($result as $row){
                        echo "['".$row["Quarter"]."', ".$row["Total"]."],";
                    }
                ?>
            ]);
            var options = {
                title : 'Percentage of Quartely Sales',
                pieHole : 0.4,
                chartArea:{left:100,top:70,width:'100%',height:'80%'}
            };
            var chart_area = document.getElementById('piechart');
            var chart = new google.visualization.PieChart(chart_area);

            google.visualization.events.addListener(chart, 'ready', function(){
                chart_area.innerHTML = '<img src="' + chart.getImageURI() + '" class="img-responsive">';
            });
            chart.draw(data, options);
        }
   </script>  
     
    <body>  
        <br/><br/>  
        <div  id="testing">  
        <h3 align="center">Quarterly sales Report</h3>  
        <br />
        <div class="panel panel-default">
            <div class="panel-body" align="center">
                <?php 
                    if (isset($_POST['submit'])){
                        $getyear = $_POST['year'];
                        echo 'Year : '.$getyear;
                    }
                ?>
                <div id="piechart" style="width: 100%; max-width:900px; height: 500px; "></div>
                <br>
                
                <?php
                if (isset($_POST['submit'])){
                echo " <h4 align='center' style='color:black'>Sales Details</h4>";
                if(mysqli_num_rows($res) >0 ){
        echo "<table bortder='1' style='width:95%'>";
            echo "<tr  style='background-color: black; color:white'>";
                echo "<th>Product</th>";
                echo "<th >Quarter 1</th>";
                echo "<th>Quarter 2</th>";
                echo "<th>Quarter 3</th>";
                echo "<th>Quarter 4</th>";
                
            echo "</tr>";
        while($row1 = mysqli_fetch_array($res)){
            echo "<tr >";
                echo "<td>" . $row1['product_name'] . "</td>";
                if ($row1['quarter']==1){
                echo "<td>" . $row1['price'] . "</td>";
                }
                else{
                    echo "<td>-</td>";
                }
                if ($row1['quarter']==2){
                echo "<td>" . $row1['price'] . "</td>";
                }
                else{
                    echo "<td>-</td>";
                }
                if ($row1['quarter']==3){
                echo "<td>" . $row1['price'] . "</td>";
                }
                else{
                    echo "<td>-</td>";
                }
                if ($row1['quarter']==4){
                echo "<td>" . $row1['price'] . "</td>";
                }
                else{
                    echo "<td>-</td>";
                }
            echo "</tr>";
        }
        echo "</table>";
    }
    
                }

        ?>
        <br>
            </div>
        </div>
    </div>
    <br />
    <div align="center">
        <form method="post" id="make_pdf" action="create_pdf.php">
            <input type="hidden" name="hidden_html" id="hidden_html" />
            <button type="button" name="create_pdf" id="create_pdf" style="width:150px;height:35px; background-color:rgb(236, 185, 17); color:black;border:rgb(236, 185, 17)" class="btn btn-danger btn-xs"><h4>Make PDF</h4></button>
        </form>
    </div>
    <br />
    <br />
    <br />
    
    </body>  
</html>

<script>
    $(document).ready(function(){
        $('#create_pdf').click(function(){
            $('#hidden_html').val($('#testing').html());
            $('#make_pdf').submit();
        });
    });

</script>

