<?php
include "../settings/connection.php";

// GET ALL DATA
function getAllBookings()
{
    global $conn;
    $sql = "SELECT bookings.*, Car.Image as img, User.fname AS firstname, User.lname AS lastname, Status.sname as booking_status FROM bookings INNER JOIN User ON Bookings.customer_id = User.pid INNER JOIN Status ON Bookings.Booking_status_id = Status.sid INNER JOIN Car ON Bookings.vehicle_id = Car.Car_id WHERE Bookings.customer_id = User.pid AND Bookings.vehicle_id = Car.car_id;";
    $result = $conn->query($sql);
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) > 0) {
        $AllBookings = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $AllBookings;
    } else {
        return [];
    }
}

function getAllBookingHistory()
{
    global $conn;
    $sql = "SELECT Bookings.*, User.fname AS firstname, User.lname AS lastname, Status.sname as booking_status FROM bookings INNER JOIN User ON Bookings.customer_id = User.pid INNER JOIN Status ON Bookings.Booking_status_id = Status.sid INNER JOIN Car ON Bookings.vehicle_id = Car.Car_id WHERE Bookings.customer_id = User.pid AND Bookings.vehicle_id = Car.car_id AND Bookings.booking_status_id = 2;";

    $result = $conn->query($sql);
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) > 0) {
        $BookingHistory = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $BookingHistory;
    } else {
        return [];
    }
}

function getAllBrands()
{
    global $conn;
    $sql = "SELECT * FROM Make";
    $result = $conn->query($sql);
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) > 0) {
        $AllBrands = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $AllBrands;
    } else {
        return [];
    }
}

function getAllBodyTypes()
{
    global $conn;
    $sql = "SELECT * FROM CarType";
    $result = $conn->query($sql);
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) > 0) {
        $AllBodyTypes = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $AllBodyTypes;
    } else {
        return [];
    }
}

function getAllCars()
{
    global $conn;
    $sql = "SELECT Car.*, Make.Make_name as make, cartype.Car_type as cartype, cartype.Weekly_rate as weekly_rate, cartype.Daily_rate as daily_rate, transmission.tname as transmission, fuel.fuel_name as fueltype, Status.sname as sname  
    FROM Car
    INNER JOIN Make ON Car.Make_id = Make.Make_id
    INNER JOIN CarType ON Car.Type_id = CarType.Type_id
    INNER JOIN Transmission ON Car.Transmission_id = Transmission.tid
    INNER JOIN Fuel ON Car.Fuel_id = Fuel.Fuel_id
    INNER JOIN Status ON Car.Status_id = Status.sid ORDER BY Car.Car_id asc; 
    ";
    $result = $conn->query($sql);
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) > 0) {
        $AllCars = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $AllCars;
    } else {
        return [];
    }
}

function getAllUsers()
{
    global $conn;
    $sql = "SELECT User.*, Role.rolename AS role
        FROM User
        INNER JOIN Role ON User.rid = Role.rid";

    $result = $conn->query($sql);
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) > 0) {
        $AllUsers = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $AllUsers;
    } else {
        return [];
    }
}

function getAllCustomers()
{
    global $conn;
    $sql = "SELECT User.*, Role.rolename AS role
        FROM User
        INNER JOIN Role ON User.rid = Role.rid WHERE User.rid = 3";

    $result = $conn->query($sql);
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) > 0) {
        $AllUsers = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $AllUsers;
    } else {
        return [];
    }
}

function getAllTransmissions()
{
    global $conn;
    $sql = "SELECT * FROM transmission";
    $result = $conn->query($sql);
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) > 0) {
        $AllTransmissions = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $AllTransmissions;
    } else {
        return [];
    }
}

function getMyBookings($id)
{
    global $conn;
    $sql = "SELECT bookings.*, User.fname AS firstname, User.lname AS lastname, Status.sname as booking_status FROM bookings INNER JOIN User ON Bookings.customer_id = User.pid INNER JOIN Status ON Bookings.Booking_status_id = Status.sid INNER JOIN Car ON Bookings.vehicle_id = Car.Car_id WHERE Bookings.customer_id = User.pid AND Bookings.vehicle_id = Car.car_id AND Bookings.customer_id = '$id';";
    $result = $conn->query($sql);
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) > 0) {
        $MyBookings = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $MyBookings;
    } else {
        return [];
    }
}



