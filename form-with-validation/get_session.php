<?php
    session_start();
    if (isset($_SESSION['username'])) {
        echo "Hello, " . $_SESSION['username']; . "! Your role is " . $_SESSION['role'] . "<br>";
        echo "<a href='destroy_session.php'>Log out</a>";
    } else{
        echo "No session found. <a href='set_session.php'>Set session</a>";
    }
?>
