<?php
include "../settings/connection.php";

function getABrand($id)
{
    global $conn;

    // query to select one chore based on id
    $query = "SELECT * FROM make WHERE make_id = '$id'";
    $result = mysqli_query($conn, $query);
    $resultCheck = mysqli_num_rows($result);

    // Checking if execution worked
    if ($resultCheck > 0) {
        // Fetch a row from the result set
        $row = mysqli_fetch_assoc($result);

        // Return the row
        return $row;
    }
}

function getAcarType($id)
{
    global $conn;

    // query to select one chore based on id
    $query = "SELECT * FROM cartype WHERE Type_id = '$id'";
    $result = mysqli_query($conn, $query);
    $resultCheck = mysqli_num_rows($result);

    // Checking if execution worked
    if ($resultCheck > 0) {
        // Fetch a row from the result set
        $row = mysqli_fetch_assoc($result);

        // Return the row
        return $row;
    }
}

function getAuser($id)
{
    global $conn;

    // query to select one chore based on id
    $query = "SELECT user.*, role.rolename AS role
    FROM user
    INNER JOIN role ON user.rid = role.rid WHERE user.pid = '$id'";
    $result = mysqli_query($conn, $query);
    $resultCheck = mysqli_num_rows($result);

    // Checking if execution worked
    if ($resultCheck > 0) {
        // Fetch a row from the result set
        $row = mysqli_fetch_assoc($result);

        // Return the row
        return $row;
    }
}

function getAcar($id)
{
    global $conn;

    // query to select one car based on id
    $query = "SELECT car.*, make.make_name as make, cartype.car_type as cartype, cartype.Weekly_rate as weekly_rate, cartype.Daily_rate as daily_rate, transmission.tname as transmission, fuel.fuel_name as fueltype, status.sname as sname  
    FROM car
    INNER JOIN make ON car.make_id = make.make_id
    INNER JOIN carType ON car.Type_id = carType.Type_id
    INNER JOIN transmission ON car.transmission_id = transmission.tid
    INNER JOIN Fuel ON car.Fuel_id = Fuel.Fuel_id
    INNER JOIN status ON car.status_id = status.sid
    WHERE car_id = '$id'";

    $result = mysqli_query($conn, $query);
    $resultCheck = mysqli_num_rows($result);

    // Checking if execution worked
    if ($resultCheck > 0) {
        // Fetch a row from the result set
        $row = mysqli_fetch_assoc($result);

        // Return the row
        return $row;
    } else {
        // Return null if no car found
        return null;
    }
}

function getABooking($id)
{
    global $conn;

    // query to select one booking based on id
    $query = "SELECT * FROM bookings WHERE Booking_id = '$id'";
    $result = mysqli_query($conn, $query);
    $resultCheck = mysqli_num_rows($result);

    // Checking if execution worked
    if ($resultCheck > 0) {
        // Fetch a row from the result set
        $row = mysqli_fetch_assoc($result);

        // Return the row
        return $row;
    }
}
