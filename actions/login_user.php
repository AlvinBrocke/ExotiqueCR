<?php
// Include the connection file
include '../settings/connection.php';
// Start session
session_start();

// Check if login button was clicked
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect data from the form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and execute query to retrieve user data
    $query = "SELECT * FROM User WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    // Check if query execution was successful
    if (!$result) {
        header("Location: ../login/login.php?error=database_error");
        exit();
    }

    // Check if user exists
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Verify password
        if (!password_verify($password, $row['passwd'])) {
            header("Location: ../login/login.php?error=incorrect_password");
            exit();
        } else {
            // Create session variables
            $_SESSION['user_id'] = $row['pid'];
            $_SESSION['role_id'] = $row['rid'];
            header("Location: ../view/landingpage.php");
            exit();
        }
    } else {
        header("Location: ../login/login.php?error=user_not_registered");
        exit();
    }
}
