<?php
 
// set sessions
session_start();
$_SESSION ['username'] = "John Doe";
$_SESSION ['role'] = "Editor";
echo "Session variables are set. <a href='get_session.php</a>";
?>