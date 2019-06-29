<?php
    session_start();
    session_destroy();
    if (isset($_COOKIE["user"]) == true || isset($_COOKIE["type"]) == true)
    {
        setcookie("user", $_COOKIE["user"], time() -3600, "/");
        setcookie("type", $_COOKIE["type"], time() -3600, "/");
    }
    echo "<script> window.location.href = 'login.php'; </script>";

?>


