<?php
    //set a cookie named "user" with the value "jon doe" that  expires in 1 day
    setcookie("user", "Jon Doe", time() + 86400 , "/"); // 86400 = 1 day
?>

<?php
    //set cookie("user", "", time() - 3600, "/"); //expires 1 hour ago
?>

<?php
    //set session variables

    $_SESSION["username"] = "John Doe";
    $_SESSION["email"] = "Jon@example.com";
    echo "Session variables are set.";
    echo $_SESSION["username"];
    //echo "Session variables are set.";
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
#echo "Session variables are set.";

?>

<?php
if (isset($_COOKIE["user"])) {
    echo "Welcome back, " . $_COOKIE["user"] . "!";
} else {
    echo "Hello, new visitor!";
}

#echo $_SESSION["username"]
?>  

</body>
</html>
