<?php
// Include your database connection file here if not already included
include "../settings/connection.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Retrieve form data
    $sort = isset($_GET['sort']) ? $_GET['sort'] : '';
    $make = isset($_GET['make']) ? $_GET['make'] : '';
    $year = isset($_GET['year']) ? $_GET['year'] : '';
    $cartype = isset($_GET['cartype']) ? $_GET['cartype'] : '';
    $transmission = isset($_GET['transmission']) ? $_GET['transmission'] : '';
    $fueltype = isset($_GET['fueltype']) ? $_GET['fueltype'] : '';
    $capacity = isset($_GET['capacity']) ? $_GET['capacity'] : '';

    // Build your SQL query based on the form data
    $sql = "SELECT car.*, make.make_name as make, cartype.car_type as cartype, cartype.Weekly_rate as weekly_rate, cartype.Daily_rate as daily_rate, transmission.tname as transmission, fuel.fuel_name as fueltype, status.sname as sname  
    FROM car
    INNER JOIN make ON car.make_id = make.make_id
    INNER JOIN cartype ON car.Type_id = cartype.Type_id
    INNER JOIN transmission ON car.transmission_id = transmission.tid
    INNER JOIN fuel ON car.fuel_id = fuel.fuel_id
    INNER JOIN status ON car.status_id = status.sid WHERE 1=1";

    // Apply filters
    if (!empty($make)) {
        $sql .= " AND car.make_id = '$make'"; // Adjust column name as per your database
    }
    if (!empty($year)) {
        $sql .= " AND `Year` = '$year'"; // Adjust column name as per your database
    }
    if (!empty($cartype)) {
        $sql .= " AND car.Type_id = '$cartype'"; // Adjust column name as per your database
    }
    if (!empty($transmission)) {
        $sql .= " AND car.transmission_id = '$transmission'"; // Adjust column name as per your database
    }
    if (!empty($fueltype)) {
        $sql .= " AND car.fuel_id = '$fueltype'"; // Adjust column name as per your database
    }
    if (!empty($capacity)) {
        $sql .= " AND Capacity = '$capacity'"; // Adjust column name as per your database
    }

    if (!empty($sort)) {
        // Apply sorting
        $sql .= " ORDER BY daily_rate"; // Adjust the column name based on your database structure
        if ($sort == 'price_low') {
            $sql .= " ASC";
        } elseif ($sort == 'price_high') {
            $sql .= " DESC";
        }
    }

    $sql .= ";";

    // Execute the query
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $searchResults = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        $searchResults = [];
    }

} else {
    // Redirect to the search page
    header("Location: ../view/car.php?search=error");
    exit();
}

// Use the $searchResults array to display the search results in your HTML
function displaySearchResults($searchResults)
{
    if (!empty($searchResults)) {
        foreach ($searchResults as $car) {
            echo "<div class='col-md-4'>";
            echo "<div class='car-wrap rounded ftco-animate'>";
            echo "<div class='img rounded d-flex align-items-end' style='background-image: url(../images/uploads/" . $car["Image"] . ");'></div>"; // Fixed image URL concatenation
            echo "<div class='text'>";
            echo "<h2 class='mb-0'><a href='car-single.php?car_id=" . $car["car_id"] . "'>" . $car["make"] . " </a></h2>";
            echo "<h5 class='cat'>" . $car["Model"] . "</h5>";
            echo "<div class='d-flex mb-3'>";
            echo "<p class='price ml-auto'>" . $car["daily_rate"] . "<span>/day</span></p>";
            echo "</div>";
            if ($car["sname"] == "Available") {
                echo "<p class='d-flex mb-0 d-block'><a href='car-single.php?car_id=" . $car["car_id"] . "' class='btn btn-primary py-2 mr-1'>Book now</a> <a href='car-single.php?car_id=" . $car["car_id"] . "' class='btn btn-secondary py-2 ml-1'>Details</a></p>"; // Fixed link href attribute
            } else {
                echo "<p class='d-flex mb-0 d-block'><a href='#' class='btn btn-danger py-2 mr-1'>Not Available</a> <a href='car-single.php?car_id=" . $car["car_id"] . "' class='btn btn-secondary py-2 ml-1'>Details</a></p>"; // Fixed link href attribute
            }
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "No cars found matching the search criteria.";
    }
}

// Call the function with the $searchResults array
displaySearchResults($searchResults);
