<?php
include '../settings/connection.php';

session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $rid = 3;

    //Check if user already exists
    $sql = "SELECT * FROM User WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // User already exists, redirect with error
        header("Location: ../login/login.php?error=user_already_exists");
        exit();
    } else {
        // SQL to insert data into the database
        $sql = "INSERT INTO user (rid, fname, lname, tel, email, passwd)
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        // Check if the statement was prepared properly
        if ($stmt) {
            // Bind parameters
            $stmt->bind_param("isssss", $rid, $firstname, $lastname, $tel, $email, $hashed_password);

            if ($stmt->execute()) {
                // Close statement
                $stmt->close();
                // Redirect to login after successful registration
                header("Location: ../login/login.php");
                exit();
            } else {
                // Display error message if execution fails
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            // Display error message if statement preparation fails
            echo "Statement preparation failed.";
        }
    }
} else {
    // Redirect if form is not submitted via POST method
    header("Location: ../register/register.php?error=login_button_not_clicked");
    exit();
}

// Close connection
$conn->close();
