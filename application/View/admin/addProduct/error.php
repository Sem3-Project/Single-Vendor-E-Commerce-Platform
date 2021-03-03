<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Error</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="../../../../public/css/login.css" />
    <style type="text/css">
        .wrapper{
            width: 750px;
            margin: 0 auto;
            background-color: white;
            margin-top: 50px;
            margin-bottom: 20px;
            border-left: 1px solid rgb(236, 185, 17);
            border-right: 1px solid rgb(236, 185, 17);
        }
    </style>
</head>
<body>
    <a href="../Homeadmin.php"><img class="login" src="../../../../public/images/homeic.gif" style="width:6.5%; margin-top:13px;  position: relative;"></a>

    <a href="../../../view/signin/logout-user.php"><img class="login" src="../../../../public/images/logout.gif" style="width:7%; margin-top:13px;margin-left:25px; position: absolute;"></a>

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Invalid Request</h2>
                    </div>
                    <div class="alert alert-danger fade in" style="background-color:#e8ebeb; color:black; border:1px solid #e8ebeb">
                        <p>Sorry, you've made an invalid request. Please <a href="index.php" class="alert-link" style="color:black">go back</a> and try again.</p>
                    </div>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>