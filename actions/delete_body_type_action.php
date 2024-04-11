<?php
include "../settings/connection.php";

// Check if there is a GET request
if (isset($_GET['btid'])) {
    // Retrieve the id from the GET URL and store it in a variable
    $btid = $_GET['btid'];

    // Delete query using the id variable
    $query = "DELETE FROM CarType WHERE Type_id = $btid";
    $result = mysqli_query($conn, $query);

    // Execute the query using the connection
    if ($result) {
        // If execution is successful, redirect to chore display page
        header("Location: ../admin/bodytype.php?msg=vehicle_type_deleted_successfully");
    } else {
        // If execution fails, display an error message
        echo "Error deleting chore: " . mysqli_error($conn);
    }
} else {
    // If there is no GET request, redirect to chore display page
    header("Location: ../admin/bodytype.php?msg=no_vehicle_id_provided");
    exit();
}