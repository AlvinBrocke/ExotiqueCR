<?php
include "../settings/connection.php";

global $conn;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Get the chore name from the POST data
    $vehicleType = $_POST['bodytype_name'];
    $weeklyRate = $_POST['weekly_rate'];
    $dailyRate = $_POST['daily_rate'];

    if (empty($vehicleType) || empty($weeklyRate) || empty($dailyRate)) {
        header('Location: ../admin/bodytype.php?msg=Please fill in all fields');
        exit;
    }

    if (!is_numeric($weeklyRate) || !is_numeric($dailyRate)) {
        header('Location: ../admin/bodytype.php?msg=Please enter a valid rate');
        exit;
    }

    if ($weeklyRate < 0 || $dailyRate < 0) {
        header('Location: ../admin/bodytype.php?msg=Please enter a valid rate');
        exit;
    }

    if (!is_string($vehicleType)) {
        header('Location: ../admin/bodytype.php?msg=Please enter a valid vehicle type');
        exit;
    }

    // Prepare and execute the SQL query to insert the chore into the database
    $bodytype_sql = "INSERT INTO cartype (Weekly_rate, Daily_rate, Car_type) 
        VALUES (?, ?, ?)";
    $stmt = $conn->prepare($bodytype_sql);
    $stmt->bind_param("iis", $weeklyRate, $dailyRate, $vehicleType);

    if ($stmt->execute()) {
        // Redirect back to the admin home page after adding the chore
        header('Location: ../admin/bodytype.php?msg=Car type added successfully');
        exit;
    } else {
        echo "Error with SQL query" . mysqli_error($conn);
        exit;
    }
}


