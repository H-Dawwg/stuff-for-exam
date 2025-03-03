<?php
    session_start();
    $_SESSION['username'] = 'JaneDoe';
    $_SESSION['role'] = 'Editor';
    echo "Session variables are set. <a href='get_session.php'>Go to get_session.php</a>";
?>