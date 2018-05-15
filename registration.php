<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registration</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script type="text/javascript" src="js/jquery.js"></script>
</head>
<body>
<div  id="objc" class="container-fluid">
<form method="post">
    <input type="text" name="sirn" class="form-control" placeholder="User Name"><br />
    <input type="numbers" name="phone" class="form-control" placeholder="Phone Number"><br />
    <input type="password" name="ps1" class="form-control" placeholder="Create Password"><br />
    <input type="password" name="ps2" class="form-control" placeholder="Confirm Password"><br />
    <select name="sel"  class="form-control">
        Gender
        <option name="rad">Male</option>
        <option name="rad">Female</option>
    </select><br />
    <input type="checkbox" name="tandc">By clicking Sign up you are agreeing to the terms of use and privacy policy<br />
    <input type="reset" class="btn btn-info" name="res" width="49%" value="RESET">
    <input type="submit" class="btn btn-info" name="register" width="49%" value="REGISTER"><br />
</form>
</div>
</body>
</html>
<?php
if (isset($_POST['register'])){
    //connecting to the  database
include 'connection.php';

//getting values from the user
    $username=$_POST['sirn'];
    $phonenumber=$_POST['phone'];
    $pass1=$_POST['ps1'];
    $pass2=$_POST['ps2'];
        if (!$username){
            echo "Please Provide a user name";
        }elseif (!$phonenumber){
            echo "Enter Your phone number to continue";
        }elseif($pass1==$pass2){
        //converting the password
        $fpass=md5($pass2);
            //adding values from user to the database
            $sql="INSERT INTO members VALUES('','$username','$phonenumber', '$fpass)";

            //executing the query
            $result=mysqli_query($conn,$sql);
            if ($result){
                echo "Thank You $username for Registering with us.";
                header('location:login.php');
            }else{
                echo "An Error occurred during registration please try again later";
            }

    }else{
        echo "Password mismatch detected";
    }



}