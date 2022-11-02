<?php
    session_start(); // to check if there is a session
    session_destroy(); // destroy session to commit logout
    unset($_SESSION['id']); // remove id from session
    unset($_SESSION['uname']);
    header('location:login.php');
    exit();
?>