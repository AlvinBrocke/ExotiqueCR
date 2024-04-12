<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "../settings/core.php";
include "../settings/connection.php";

if (isset($_POST['startDate']) && isset($_POST['endDate'])) {
    $user_id = $_POST['user_id'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $date_booked = date("Y-m-d H:i");
    $booking_status = 2;
    $car_id = $_POST['car_id'];

    $sql = "INSERT INTO bookings (customer_id, vehicle_id, `start_date`, return_date, booking_status_id, date_booked) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iissis", $user_id, $car_id, $startDate, $endDate, $booking_status, $date_booked);
    $result = $stmt->execute();

    if ($result) {
        header("Location: ../view/booking_details.php?booking_id=" . $conn->insert_id);
        exit();
    } else {
        echo "Error with SQL query: " . $conn->error;
        exit();
    }
} else {
    header("Location: ../view/car.php?error=Please select a date range to book a car");
    exit();
}
