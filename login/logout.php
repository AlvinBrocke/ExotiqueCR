<?php
//Start session
session_start();

// Include the connection file
include '../settings/connection.php';

// Unset the session variables
unset($_SESSION['user_id']);
unset($_SESSION['role_id']);

// Redirect to login_view page
header("Location: ../view/landingpage.php");

// Close the connection
exit();