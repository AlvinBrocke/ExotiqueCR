<?php
include "../settings/connection.php";

// Check if there is a GET request
if (isset($_GET['mid'])) {
    // Retrieve the id from the GET URL and store it in a variable
    $make_id = $_GET['mid'];

    // Delete query using the id variable
    $query = "DELETE FROM MAKE WHERE Make_id = $make_id";
    $result = mysqli_query($conn, $query);

    // Execute the query using the connection
    if ($result) {
        // If execution is successful, redirect to chore display page
        header("Location: ../admin/brands.php?msg=make_deleted_successfully");
    } else {
        // If execution fails, display an error message
        echo "Error deleting chore: " . mysqli_error($conn);
    }
} else {
    // If there is no GET request, redirect to chore display page
    header("Location: ../admin/brands.php?msg=no_make_id_provided");
    exit();
}