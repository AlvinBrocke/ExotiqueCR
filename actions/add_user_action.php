<?php
include "../settings/connection.php";

global $conn;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Prepare SQL query to get the role id (rid) based on the selected role name
    $role = $_POST['role'];
    $rid_sql = "SELECT rid FROM role WHERE rolename = ?";

    $rid_stmt = $conn->prepare($rid_sql);
    $rid_stmt->bind_param("s", $role);
    $rid_stmt->execute();
    $result = $rid_stmt->get_result();

    // Fetch the role id (rid) from the result
    $row = $result->fetch_assoc();
    $rid = $row['rid'];

    // Prepare and execute the SQL query to insert the user into the database
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $email = $_POST['email'];
    $telephone = $_POST['tel'];

    $user_sql = "INSERT INTO user (rid, fname, lname, tel, email) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($user_sql);
    $stmt->bind_param("issss", $rid, $firstname, $lastname, $telephone, $email);

    if ($stmt->execute()) {
        // Redirect back to the admin home page after adding the user
        header('Location: ../admin/users.php?msg=User added successfully');
        exit;
    } else {
        echo "Error with SQL query" . $conn->error;
        exit;
    }
}
