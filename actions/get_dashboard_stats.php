<?php
include "../settings/connection.php";

// GET ALL DATA
function getAllBookings()
{
    global $conn;
    $sql = "SELECT bookings.*, car.image as img, user.fname as firstname, user.lname as lastname, status.sname as booking_status from bookings inner join user on bookings.customer_id = user.pid inner join status on bookings.booking_status_id = status.sid inner join car on bookings.vehicle_id = car.car_id where bookings.customer_id = user.pid and bookings.vehicle_id = car.car_id;";
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
    $sql = "SELECT bookings.*, user.fname as firstname, user.lname as lastname, status.sname as booking_status from bookings inner join user on bookings.customer_id = user.pid inner join status on bookings.booking_status_id = status.sid inner join car on bookings.vehicle_id = car.car_id where bookings.customer_id = user.pid and bookings.vehicle_id = car.car_id and bookings.booking_status_id = 2;";

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
    $sql = "SELECT * FROM make";
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
    $sql = "SELECT * FROM carType";
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
    $sql = "SELECT car.*, make.make_name as make, cartype.car_type as cartype, cartype.weekly_rate as weekly_rate, cartype.daily_rate as daily_rate, transmission.tname as transmission, fuel.fuel_name as fueltype, status.sname as sname  
    from car
    inner join make on car.make_id = make.make_id
    inner join cartype on car.type_id = cartype.type_id
    inner join transmission on car.transmission_id = transmission.tid
    inner join fuel on car.fuel_id = fuel.fuel_id
    inner join status on car.status_id = status.sid order by car.car_id ASC; 
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
    $sql = "SELECT user.*, role.rolename AS role
        FROM user
        INNER JOIN Role ON user.rid = role.rid";

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
    $sql = "SELECT user.*, role.rolename AS role
        FROM User
        INNER JOIN Role ON user.rid = role.rid WHERE user.rid = 3";

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
    $sql = "SELECT bookings.*, user.fname as firstname, user.lname as lastname, status.sname as booking_status from bookings inner join user on bookings.customer_id = user.pid inner join status on bookings.booking_status_id = status.sid inner join car on bookings.vehicle_id = car.car_id where bookings.customer_id = user.pid and bookings.vehicle_id = car.car_id and bookings.customer_id = '$id';";
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

function getBookingHistory()
{
    global $conn;
    $sql = "SELECT bookings.*, user.fname as firstname, user.lname as lastname, status.sname as booking_status from bookings inner join user on bookings.customer_id = user.pid inner join status on bookings.booking_status_id = status.sid inner join car on bookings.vehicle_id = car.car_id where bookings.customer_id = user.pid and bookings.vehicle_id = car.car_id and bookings.booking_status_id = 1;";
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



