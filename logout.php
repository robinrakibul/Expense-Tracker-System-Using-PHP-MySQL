<?php
session_start();
session_unset();
session_destroy();
echo "<h1>Logged out successfully, Session destroyed!<br> <h2>Redirecting to Homepage in 3 seconds</h2>";
header("refresh:3;url=index.html");
?>
<html>
    <head>
        <style>
    h1{
    color: #2487ce;
                }

    h2 {
    color: #185886;
    }
        </style>
    </head>
</html>