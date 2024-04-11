<?php
include "../settings/core.php";

// Include connection file
include "../settings/connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $vehicleTypeName = mysqli_real_escape_string($conn, $_POST['bodytype_name']);
    $weeklyRate = $_POST['weekly_rate'];
    $dailyRate = $_POST['daily_rate'];
    $btid = $_POST['bodytype_id'];



    // Update query
    $update = "UPDATE cartype SET Car_type = '$vehicleTypeName', Weekly_rate = $weeklyRate, Daily_rate = $dailyRate WHERE type_id = $btid";

    // Perform the update
    $result = mysqli_query($conn, $update);

    // Check if update was successful
    if ($result) {
        // Redirect to admin chore management page
        header("Location: ../admin/bodytype.php?msg=Car type updated successfully");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}