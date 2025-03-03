<?php

//set a cookie named "user" with value "John Doe" that expires in 1 day
setcookie("user", "John Doe", time() + 86400, "/"); //86400 = 1 day 
?>

<?php
setcookie("user", "", time() - 3600, "/"); //Expries 1 hour ago 
?>

<?php
session_start(); //Start the session

//Set session variables 
$_SESSION["username"] = "JohnDoe";
$_SESSION["email"] = "john@example.com";
echo "Session variables are set.";
echo $_SESSION["username"]
//echo "session variables are set.";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if (isset($_COOKIE["user"])) {
    echo "welcome back, " . $_COOKIE["user"] . "!";
} else{
    echo "Hello, new visitor!";
}
?>
</body>
</html>