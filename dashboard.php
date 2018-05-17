<?php
session_start();

if (!isset($_SESSION['user']) && !isset($_SESSION['pass'])){
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>


    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">


</head>
<body>

<?php
// Echo session variables that were set on previous page
echo ' You are Logged in as:'.$_SESSION['user']."<br />";
?>
<div class="container-fluid">
    <div class="row">
    <div class="col-sm-4">

    </div>
    <h2 class="col-sm-8">
       <h2>WELCOME TO THE BEST BLOG SITE EVER CREATED</h2>
    </div>
</div>
</div>


<div class="col-sm-12">
    <nav class="navbar navbar-default">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Blog Post</a>
            </div>
        <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
                    <li class="active"> <a href="#"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                    <li><a href="#">About us</a></li>
                    <li><a href="#">blog</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"> <span class="glyphicon glyphicon-user"></span> my account</a></li>
                    <li><a href="logout.php"> <span class="glyphicon glyphicon-log-out"></span>log out</a></li>
                </ul>
        </div>
        </div>
    </nav>
</div>





</body>
</html>
<?php
