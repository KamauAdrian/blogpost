<?php
session_start();
?>
<html>
<head>
    <title>log out</title>
</head>
<body>
<?php
//remove all session variables
session_unset();
//destroy the session
session_destroy();
header('location:index.php');
?>
</body>
</html>

