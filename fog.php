<!DOCTYPE html>
<html lang="en">
<head>
    <title>forgot password</title>
</head>
<body>
<form>
    <input type="text" name="phone" placeholder="Enter your phone number">
    <input type="submit" name="fog" value="Send">
</form>
</body>
</html>

<?php
if (isset($_POST['fog'])){
    $uphone=$_POST['phone'];
    include 'connection.php';
    $sql="SELECT * FROM members WHERE phone='$uphone'";
    $result=mysqli_query($conn,$sql);
    if (mysqli_num_rows($result)>0){
        echo "We have sent a link to $uphone via sms use the link to reset your password";
       sendSms($phone,"<a href=\"forgot.php\">click here</a> to reset your password");


    }else{
echo "The given phone is not registered";
    }
}







function sendSms($phone, $message){
    require_once('AfricasTalkingGateway.php');
    $username   = "Adrian6202";
    $apikey     = "3721132f020da7e3f9011d8a5dc40a78bce59e1db770c9f18f0f2a358c1eac39";
    $recipients = "$phone";
    $message    = "$message";
    $gateway    = new AfricasTalkingGateway($username, $apikey);
    try
    {
        // Thats it, hit send and we'll take care of the rest.
        $results = $gateway->sendMessage($recipients, $message);
    }
    catch ( AfricasTalkingGatewayException $e )
    {
    }
}
?>