<!DOCTYPE html>
<html>
<body>

<?php
session_start();

// connect to database
// Database connection settings
$host = "82.165.6.246";
$dbname = "pg_lilianrundu24";
$user = "lilianrundupg";
$password = "pgSt52GbPostGres24";

// Establish a connection to PostgreSQL
$conn = pg_connect("host=$host dbname=$dbname user=$user password=$password");

// Check if the connection is successful
if (!$conn) {
    die("Connection failed: " . pg_last_error());
    echo 'Connection attempt failed.';

}
else
{
    echo 'Connection attempt succeeded.';

} 



$sql = "SELECT id, username, email, img FROM users";
$result = pg_query($conn, $sql);


if (pg_num_rows($results) > 0) {
    // output data of each row
    while($row = pg_fetch_assoc($results)) {
        print "<br> id: ". $row["id"]. "<br> - Name: ". $row["username"]. "<br> - Email: " . $row["email"] . "<br>";
      print "<img src=\"".$row["img"]."\">";
     
    }
} else {
    print "0 results";
}



$db->close();   
        ?> 



</body>
</html>