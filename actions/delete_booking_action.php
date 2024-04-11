<?php
include "../settings/connection.php";

if (isset($_GET['bid'])) {
    $booking_id = $_GET['bid'];

    $query = "DELETE FROM bookings WHERE booking_id = $booking_id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: ../admin/bookings.php?msg=booking_deleted_successfully");
    } else {
        echo "Error deleting booking: " . mysqli_error($conn);
    }
} else {
    header("Location: ../admin/bookings.php?msg=no_booking_id_provided");
    exit();
}