<?php
include "../settings/connection.php";

// Check if there is a GET request
if (isset($_GET['cid'])) {
    // Retrieve the id from the GET URL and store it in a variable
    $cid = $_GET['cid'];

    // Delete query using the id variable
    $query = "DELETE FROM Car WHERE car_id = $cid";
    $result = mysqli_query($conn, $query);

    // Execute the query using the connection
    if ($result) {
        // If execution is successful, redirect to chore display page
        header("Location: ../admin/cars.php?msg=car_deleted_successfully");
    } else {
        // If execution fails, display an error message
        echo "Error deleting chore: " . mysqli_error($conn);
    }
} else {
    // If there is no GET request, redirect to chore display page
    header("Location: ../admin/cars.php?msg=no_car_id_provided");
    exit();
}