<?php
include "../settings/connection.php";

// Check if there is a GET request
if (isset($_GET['uid'])) {
    // Retrieve the id from the GET URL and store it in a variable
    $user_id = $_GET['uid'];

    // Delete query using the id variable
    $query = "DELETE FROM user WHERE pid = $user_id";
    $result = mysqli_query($conn, $query);

    // Execute the query using the connection
    if ($result) {
        // If execution is successful, redirect to chore display page
        header("Location: ../admin/users.php?msg=user_deleted_successfully");
    } else {
        // If execution fails, display an error message
        echo "Error deleting chore: " . mysqli_error($conn);
    }
} else {
    // If there is no GET request, redirect to chore display page
    header("Location: ../admin/users.php?msg=no_user_id_provided");
    exit();
}