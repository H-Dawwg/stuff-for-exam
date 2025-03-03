<?php
    //set sessions variables 
    $_SESSION['username'] = 'JonDoe';
    $_SESSION['email'] = 'jon@example.com'

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
echo "Session variables are set.";
echo $_SESSION["username"]
?>
    
</body>
</html>