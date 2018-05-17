<?php
// Start the session
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Log in</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script type="text/javascript" src="js/jquery.js"></script>
</head>
<body>
<div  id="objc" class="container-fluid">
<form method="post">
    <input type="text" name="usern" class="form-control" placeholder="User name or Phone"> <br />
    <input type="password" name="userp" class="form-control" placeholder="Password"> <br />
    <input type="reset" name="res" class="form-control btn btn-info" value="Reset"> <br /><br />
    <input type="submit" name="log" class="form-control btn btn-primary" value="Log-in"> <br /><br />
    <input type="submit" name="fogot" class="form-control btn bg-info" value="Forgot Password"> <br />
</form>
</div>

<?php
//$_SESSION['user']=$_POST['username'];
//$_SESSION['password']=$_POST['pass'];
//?>
</body>
</html>
<?php
if (isset($_POST['log'])){
    //connection to the db
    include 'connection.php';
    //getting values from user
    $usern=$_POST['usern'];
    $uspass=$_POST['userp'];
    //query
    $sql="SELECT * FROM members WHERE username='$usern' OR phone='$usern' AND password='$uspass'";
//Executing the query
    $result=mysqli_query($conn,$sql);
    if (mysqli_num_rows($result)>0){
      // Set session variables
       $_SESSION["user"] = "$usern";
      $_SESSION["password"] = "$uspass";

        header('location:dashboard.php');

    }else{
        echo " Please register first to enjoy our service";
    }
}

if (isset($_POST['fogot'])){
    // connection fogot.php
    include 'connection.php';
header('location:forgot.php');

}