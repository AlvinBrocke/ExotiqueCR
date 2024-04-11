<?php
include "../settings/connection.php";

function getABrand($id)
{
    global $conn;

    // query to select one chore based on id
    $query = "SELECT * FROM Make WHERE Make_id = '$id'";
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

function getACarType($id)
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

function getAUser($id)
{
    global $conn;

    // query to select one chore based on id
    $query = "SELECT User.*, Role.rolename AS role
    FROM User
    INNER JOIN Role ON User.rid = Role.rid WHERE User.pid = '$id'";
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

function getACar($id)
{
    global $conn;

    // query to select one car based on id
    $query = "SELECT Car.*, Make.Make_name as make, cartype.Car_type as cartype, cartype.Weekly_rate as weekly_rate, cartype.Daily_rate as daily_rate, transmission.tname as transmission, fuel.fuel_name as fueltype, Status.sname as sname  
    FROM Car
    INNER JOIN Make ON Car.Make_id = Make.Make_id
    INNER JOIN CarType ON Car.Type_id = CarType.Type_id
    INNER JOIN Transmission ON Car.Transmission_id = Transmission.tid
    INNER JOIN Fuel ON Car.Fuel_id = Fuel.Fuel_id
    INNER JOIN Status ON Car.Status_id = Status.sid
    WHERE Car_id = '$id'";

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
    $query = "SELECT * FROM Bookings WHERE Booking_id = '$id'";
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
