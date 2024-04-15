<?php
include('connect.php');
session_start();

if (isset($_SESSION['user_type'])) {
    $user_type = $_SESSION['user_type'];

    // Unset all session
    $_SESSION = array();

    // Destroy session
    session_destroy();

    // Redirect to the corresponding page
    if ($user_type == 'admin') {
        header("Location: index.php");

    } elseif ($user_type == 'user') {
        header("Location: index.php");
    
    }

} else {
    // If user_type is not set, redirect to the default page
    header("Location: index.php");
}

exit();
