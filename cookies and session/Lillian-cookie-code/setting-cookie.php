<?php
 
// select a cookie named "user" with value "John Doe" that expires in 1 day
setcookie("user", "John Doe", time() + 86400, "/"); // 86400 - 1 day
 
 
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
    if(isset($_COOKIE["user"])) {
        echo "Welcome back, " . $_COOKIE["user"] . "!";
    } else {
        echo "Hello, new visitor!";
    }
    ?>
</body>
</html>