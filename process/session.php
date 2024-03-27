<?php
session_start();

if (!isset($_SESSION['useremail'])) {
    $_SESSION['msg'] = "You have to log in first";
    header('location: ../');
}

// Logout button will destroy the session, and
// will unset the session variables
// User will be headed to 'login.php'
// after loggin out
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['useremail']);
    unset($_SESSION['name']);
    unset($_SESSION['role']);
    unset($_SESSION['id']);
    header("location: ../");
}
