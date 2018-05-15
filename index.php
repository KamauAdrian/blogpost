<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>index</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="">
<div class="container-fluid one">
    <div class="row">
        <div class="col-sm-4">
<img src="images/star.png" class="img-responsive" style="max-width: 25%; max-height: 25%; position: center;">
        </div>
        <h2 class="col-sm-8">
            <h2>WELCOME TO THE BEST BLOG SITE EVER CREATED</h2>
    </div>
</div>
</div>
<div class="container-fluid one">
    <nav class="nav navbar-inverse">
        <div class="container-fluid">

            <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                <a class="navbar-brand" href="#">Blog Post</a>
            </div>

            <div class="collapse navbar-collapse" id="myNavbar">
                <div class="nav navbar-nav">
                     <li class="active"><a href="#home"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                     <li><a href="#">About</a></li>
                     <li><a href="#">Blog</a></li>
                </div>

                <div class="nav navbar-nav navbar-right">
                    <li>
                        <form method="post">
                            <input type="text" name="user" placeholder="User name or Phone">
                            <input type="password" name="password" placeholder="Password">
                            <button type="submit" class="btn btn-success" name="log" value="Log in"><span class="glyphicon glyphicon-log-in" ></span> Sign In</button>
                        </form>
                    </li><br />
                    <li><a href="forgot.php">forgot password</a></li>


                </div>
            </div>
        </div>
    </nav>
</div>

<div id="home" class="container-fluid one">
    <div class="row">
        <div class="col-sm-6 col-xm-12">

        </div>
        <div class="col-sm-6 col-xm-12">
                <form method="post">
                    <input type="text" name="sirn" class="form-control" placeholder="User Name"><br />
                    <input type="numbers" name="phone" class="form-control" placeholder="Phone Number"><br />
                    <input type="password" name="ps1" class="form-control" placeholder="Create Password"><br />
                    <input type="password" name="ps2" class="form-control" placeholder="Confirm Password"><br />
                    <input type="reset" class="btn btn-info form-control" name="res" value="RESET"><br /><br />
                    <input type="submit" class="btn btn-success form-control" name="register"  value="SIGN UP"><br />
                </form>
        </div>
    </div>




</div>



<!--<div id="#" class="container-fluid">-->

<!--</div>-->

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>

</html>

<?php

if (isset($_POST['log'])){
    //connection to the db
    include 'connection.php';
    //getting values from user
    $usern=$_POST['user'];
    $uspass=$_POST['password'];
    //query
    $sql="SELECT * FROM members WHERE username='$usern' OR phone='$usern' AND password='$uspass'";
//Executing the query
    $result=mysqli_query($conn,$sql);
    if (mysqli_num_rows($result)>0){
//        // Set session variables
//        $_SESSION["user"] = "$usern";
//        $_SESSION["password"] = "$uspass";

        header('location:dashboard.php');

    }else{
        echo " Please register first to enjoy our service";
    }
}else{
    header('location:index.php');
}

if (isset($_POST['fogot'])){
    // connection fogot.php
    include 'connection.php';
    header('location:forgot.php');

}


if (isset($_POST['register'])) {
    //connecting to the  database
    include 'connection.php';

//getting values from the user
    $username = $_POST['sirn'];
    $phonenumber = $_POST['phone'];
    $pass1 = $_POST['ps1'];
    $pass2 = $_POST['ps2'];
    if (!$username) {
        echo "Please Provide a user name";
    } elseif (!$phonenumber) {
        echo "Enter Your phone number to continue";
    } elseif ($pass1 == $pass2) {
        //converting the password
        $fpass = md5($pass2);
        //adding values from user to the database
        $sql = "INSERT INTO members VALUES('','$username','$phonenumber', '$fpass)";

        //executing the query
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "Thank You $username for Registering with us.";
            header('location:login.php');
        } else {
            echo "An Error occurred during registration please try again later";
        }

    } else {
        echo "Password mismatch detected";
    }
}

 ?>