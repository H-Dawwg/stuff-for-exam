<?php
session_start();
$_SESSION['username'] = "JaneDoe";
$_SESSION['role'] = "Editor";
echo "Session variables are set. <a href='get_session.php>Go to get_session.php</a>";
?>

<?php
//get the session
session_start();
if (isest($_SESSION['username'])) {
    echo "Hello, " $_SESSION['username'] . "! your role is " . $_SESSION['role'] . ".<br>";
    echo "<a href='destroy_session.php>Log out</a>";
} else{
    echo "No session found. <a href='set_session.php</a>';
}
?>