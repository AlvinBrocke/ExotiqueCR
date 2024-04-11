<?php
include "../settings/core.php";

// Include connection file
include "../settings/connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $role = $_POST['role'];
    $rid_sql = "SELECT rid FROM role WHERE rolename = ?";

    $rid_stmt = $conn->prepare($rid_sql);
    $rid_stmt->bind_param("s", $role);
    $rid_stmt->execute();
    $result = $rid_stmt->get_result();

    // Fetch the role id (rid) from the result
    $row = $result->fetch_assoc();
    $rid = $row['rid'];

    $firstname = mysqli_real_escape_string($conn, $_POST['first_name']);
    $lastname = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $tel = mysqli_real_escape_string($conn, $_POST['tel']);
    $uid = $_POST['user_id'];

    // Update query
    $update = "UPDATE user SET fname = '$firstname', lname = '$lastname', email = '$email', tel = '$tel', rid = '$rid' WHERE pid = $uid";

    // Perform the update
    $result = mysqli_query($conn, $update);

    if ($result) {
        // Redirect to admin chore management page
        header("Location: ../admin/users.php?msg='user_edit_successful'.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}