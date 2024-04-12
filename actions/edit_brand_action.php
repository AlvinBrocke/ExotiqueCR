<?php
include "../settings/core.php";

// Include connection file
include "../settings/connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $make_name = mysqli_real_escape_string($conn, $_POST['edit_brand_name']);
    $mid = $_POST['edit_brand_id'];

    // Update query
    $update = "UPDATE make SET Make_name = '$make_name' WHERE make_id = $mid";

    // Perform the update
    $result = mysqli_query($conn, $update);

    // Check if update was successful
    if ($result) {
        // Redirect to admin chore management page
        header("Location: ../admin/brands.php?msg='edit_successful'");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
