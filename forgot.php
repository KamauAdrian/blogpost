<html>
<head>
    <title>Forgot</title>
</head>
<body>
<form method="post">
    <input type="text" name="phone" class="form-control" placeholder="Enter your phone number">
    <input type="password" name="ps1" class="form-control" placeholder="Create new Password">
    <input type="password" name="ps2" class="form-control" placeholder="Confirm new Password">
    <input type="submit" name="fog" width="49%" value="Reset Password">
    <input type="reset" name="res" width="49%" value="Reset">
</form>
</body>
</html>
<?php
if (isset($_POST['fog'])){
    //getting values
    $userphone=$_POST['phone'];
    $userpass1=$_POST['ps1'];
    $userpass2=$_POST['ps2'];
    if ($userpass1==$userpass2){
        $fpass=md5($userpass1);
        //connect to the database
        include 'connection.php';
        //adding values from the uder into the db
        $sql=" UPDATE members SET password='$fpass' WHERE phone='$userphone'";
        //EXECUTING QUERY
        $result=mysqli_query($conn,$sql);
        if ($result){
            echo 'Password was reset successfully';
            header('location:login.php');
        }else{
            echo 'Password not set';
        }
    }
}