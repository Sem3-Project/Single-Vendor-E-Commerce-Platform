<?php

?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../../public/css/login.css" />
    <title>Product sales and product category report</title>
    <script type="text/javascript">
        <!--
        function validateDates() {
           if(dateEntry.startDate.value > dateEntry.finishDate.value){
               alert("Invalid time period selected..!!");
               return false;
           }else{
               return true;
           }
        }
        //-->
    </script>
</head>
<body>
<!-- <header>

    <div class="head_top">
        <div class="logo_name"><img class="siyanelogo" src="images/siyane_logo.jpg">

            <h1>LIBRARY</h1>
            <h3>Siyane National College of Education</br>Veyangoda</h3>

        </div>
    </div>
    <article class="backgroundimage">
        <div class="bgimage">
            <nav>
                <ul>
                    <li><a href="Administration%20Page.php">HOME</a></li>
                </ul>
            </nav>
        </div>
</header> -->

<div class="idconfigureform">
<a href="Homeadmin.php"><img class="login" src="../../../public/images/homeic.gif" style="width:6.5%; position: relative;"></a>

<a href="../../view/logout-user.php"><img class="login" src="../../../public/images/logout.gif" style="width:7%; margin-left:25px; position: absolute;"></a>

    <form class="Form" name="dateEntry" id="dateEntry" align="center" method="POST" action="../../model/mostProductReport_model.php" onsubmit="return validateDates()" autocomplete="off" style="margin-top:90px;fontSize: 25px">

        <div class="container">
            <h2 class="page-header" align="center">Product Sales and Product Category Report</h2>
            <label class="date" for="startDate"><b>From :</b></label><br />
            <input id="startDate" name="startDate" type="date"  style="width:16%; height:20px" required autofocus/><br /><br>
            <label class="date" for="finishDate"><b>To :</b></label><br />
            <input id="finishDate" name="finishDate" type="date" style="width:16%; height:20px"  required autofocus/><br /><br>
            
            <button class="Submitbtn" name="generate" id="generate" type="submit" style="height:35px; width:15%; background-color:rgb(236, 185, 17); 
            color:black;border: 1px solid black ;border-radius:5px; font-size:20px;cursor: pointer;" >Generate Report</button>
            <br><br>
            <button class="cancelbtn" onclick="window.location='mostProductRepo.php'" name="cancel" type="button" style="height:30px; width:10%; background-color:rgb(236, 185, 17); 
            color:black;border: 1px solid black ;border-radius:5px; font-size:18px;cursor: pointer;" >Cancel</button>
            
           
        </div>
    </form>
</div>


</article>

</body>
</html>



