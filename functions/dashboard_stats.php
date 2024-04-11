<?php
// Include the connection file
include "../actions/get_dashboard_stats.php";

$bookings = getAllBookings(); // Get all bookings
$brands = getAllBrands(); // Get all brands
$bodyTypes = getAllBodyTypes(); // Get all body types
$cars = getAllCars();   // Get all cars
$users = getAllUsers(); // Get all users
$customers = getAllCustomers(); // Get all users

// Count the number of bookings, brands, body types, cars, and users
$bookingsCount = count($bookings);
$brandsCount = count($brands);
$bodyTypesCount = count($bodyTypes);
$carsCount = count($cars);
$usersCount = count($users);

// Display Functions (Tables)
function displayAllBrands()
{
    global $brands;
    if ($brands) {
        foreach ($brands as $brand) {
            echo "<tr>";
            echo "<td>" . $brand['Make_name'] . "</td>";
            echo "<td>";
            echo "<a href='../admin/edit_brand.php?mid=" . $brand['Make_id'] . "' class='btn-edit'><i class='bx bx-pencil'></i></a>";
            echo "<a href='../actions/delete_brand_action.php?mid=" . $brand['Make_id'] . "' class='btn-delete'><i class='bx bx-trash'></i></a>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td>No brands found</td></tr>";
    }
}

function displayAllBodyTypes()
{
    global $bodyTypes;
    if ($bodyTypes) {
        foreach ($bodyTypes as $bodyType) {
            echo "<tr>";
            echo "<td>" . $bodyType['Car_type'] . "</td>";
            echo "<td>" . $bodyType['Daily_rate'] . "</td>";
            echo "<td>" . $bodyType['Weekly_rate'] . "</td>";
            echo "<td>";
            echo "<a href='../admin/edit_body_type.php?btid=" . $bodyType['type_id'] . "' class='btn-edit'><i class='bx bx-pencil'></i></a>";
            echo "<a href='../actions/delete_body_type_action.php?btid=" . $bodyType['type_id'] . "' class='btn-delete'><i class='bx bx-trash'></i></a>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td>No body types found</td></tr>";
    }
}

function displayAllUsers()
{
    global $users;
    if ($users) {
        foreach ($users as $user) {
            echo "<tr>";
            echo "<td>" . $user['fname'] . "</td>";
            echo "<td>" . $user['lname'] . "</td>";
            echo "<td>" . $user['email'] . "</td>";
            echo "<td>" . $user['tel'] . "</td>";
            echo "<td>" . $user['role'] . "</td>";
            echo "<td>";
            echo "<a href='../admin/edit_user.php?uid=" . $user['pid'] . "' class='btn-edit'><i class='bx bx-pencil'></i></a>";
            echo "<a href='../actions/delete_user_action.php?uid=" . $user['pid'] . "' class='btn-delete'><i class='bx bx-trash'></i></a>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td>No users found</td></tr>";
    }
}

function displayAllCustomers()
{
    global $customers;
    if ($customers) {
        foreach ($customers as $user) {
            echo "<tr>";
            echo "<td>" . $user['fname'] . "</td>";
            echo "<td>" . $user['lname'] . "</td>";
            echo "<td>" . $user['email'] . "</td>";
            echo "<td>" . $user['tel'] . "</td>";
            echo "<td>" . $user['role'] . "</td>";
            echo "<td>";
            echo "<a href='../admin/edit_user.php?uid=" . $user['pid'] . "' class='btn-edit'><i class='bx bx-pencil'></i></a>";
            echo "<a href='../actions/delete_user_action.php?uid=" . $user['pid'] . "' class='btn-delete'><i class='bx bx-trash'></i></a>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td>No users found</td></tr>";
    }
}

function displayAllCarsTable()
{
    global $cars;
    if ($cars) {
        foreach ($cars as $car) {
            echo "<tr>";
            echo "<td>" . $car['car_id'] . "</td>";
            echo "<td>" . $car['Reg_no'] . "</td>";
            echo "<td>" . $car['make'] . "</td>";
            echo "<td>" . $car['Model'] . "</td>";
            echo "<td>" . $car['Year'] . "</td>";
            echo "<td>" . $car['cartype'] . "</td>";
            echo "<td>" . $car['transmission'] . "</td>";
            echo "<td>" . $car['Capacity'] . "</td>";
            echo "<td>" . $car['fueltype'] . "</td>";
            echo "<td>";
            echo "<a href='../admin/edit_car.php?cid=" . $car['car_id'] . "' class='btn-edit'><i class='bx bx-pencil'></i></a>";
            echo "<a href='../actions/delete_car_action.php?cid=" . $car['car_id'] . "' class='btn-delete'><i class='bx bx-trash'></i></a>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td>No cars found</td></tr>";
    }

}

function displayAllCars()
{
    global $cars;
    if ($cars) {
        foreach ($cars as $car) {
            echo "<div class='col-md-4'>";
            echo "<div class='car-wrap rounded ftco-animate'>";
            echo "<div class='img rounded d-flex align-items-end' style='background-image: url(../images/uploads/" . $car["Image"] . ");'></div>"; // Fixed image URL concatenation
            echo "<div class='text'>";
            echo "<h2 class='mb-0'><a href='car-single.php?car_id=" . $car["car_id"] . "'>" . $car["make"] . " " . $car["Model"] . "</a></h2>";
            echo "<div class='d-flex mb-3'>";
            echo "<span class='cat'>" . $car["make"] . "</span>";
            echo "<p class='price ml-auto'>" . $car["daily_rate"] . "<span>/day</span></p>";
            echo "</div>";
            echo "<p class='d-flex mb-0 d-block'><a href='car-single.php?car_id=" . $car["car_id"] . "' class='btn btn-primary py-2 mr-1'>Book now</a> <a href='car-single.php?car_id=" . $car["car_id"] . "' class='btn btn-secondary py-2 ml-1'>Details</a></p>"; // Fixed link href attribute
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<div class='col-lg-12'><h3>No cars found</h3></div>";
    }
}


function displayAllBookings()
{
    global $bookings;
    if ($bookings) {
        foreach ($bookings as $booking) {
            echo "<tr>";
            echo "<td>" . $booking['Booking_id'] . "</td>";
            echo "<td>" . $booking['firstname'] . " " . $booking['lastname'] . "</td>";
            echo "<td>" . $booking['vehicle_id'] . "</td>";
            echo "<td>" . $booking['start_date'] . "</td>";
            echo "<td>" . $booking['return_date'] . "</td>";
            echo "<td><span class='status pending'>" . $booking['booking_status'] . "</span></td>";
            echo "<td>";
            echo "<a href='../admin/edit_booking.php?bid=" . $booking['Booking_id'] . "' class='btn-edit'><i class='bx bx-pencil'></i></a>";
            echo "<a href='../actions/delete_booking_action.php?bid=" . $booking['Booking_id'] . "' class='btn-delete'><i class='bx bx-trash'></i></a>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td>No bookings found</td></tr>";
    }
}

function displayAllBookingHistory()
{
    global $bookings;
    if ($bookings) {
        foreach ($bookings as $booking) {
            echo "<tr>";
            echo "<td>" . $booking['Booking_id'] . "</td>";
            echo "<td>" . $booking['firstname'] . " " . $booking['name'] . "</td>";
            echo "<td>" . $booking['vehicle_id'] . "</td>";
            echo "<td>" . $booking['start_date'] . "</td>";
            echo "<td>" . $booking['return_date'] . "</td>";
            echo "<td><span class='status pending'>" . $booking['booking_status'] . "</span></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td>No booking history found</td></tr>";
    }

}

function getUserBookings($uid)
{
    global $bookings;
    if ($bookings) {
        foreach ($bookings as $booking) {
            ?>
            <div class="card shadow mb-4">
                <div class=" card-header bg-primary text-white">
                    Booking ID: <?php echo $booking['Booking_id']; ?>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="../images/uploads/<?php echo $booking['img']; ?>" alt="Car Image" class="img-fluid rounded">
                        </div>
                        <div class="col-md-8">
                            <p class="mb-1"><strong>Start Date:</strong> <?php echo $booking['start_date']; ?></p>
                            <p class="mb-1"><strong>End Date:</strong> <?php echo $booking['return_date']; ?></p>
                            <p class="mb-1"><strong>Status:</strong> <?php echo $booking['booking_status']; ?></p>
                            <!-- Add more booking details as needed -->
                        </div>
                    </div>
                </div>
            </div>


            <?php
        }
    } else {
        // No bookings found
        echo "No bookings found.";
    }

}

// Select Functions (Dropdowns)
function selectMake()
{
    global $brands;
    if ($brands) {
        foreach ($brands as $brand) {
            echo "<option value='" . $brand['Make_id'] . "'>" . $brand['Make_name'] . "</option>";
        }
    } else {
        echo "<option value=''>No brands found</option>";
    }

}

function selectCarType()
{
    global $bodyTypes;

    if ($bodyTypes) {
        foreach ($bodyTypes as $bodyType) {
            echo "<option value='" . $bodyType['type_id'] . "'>" . $bodyType['Car_type'] . "</option>";
        }
    } else {
        echo "<option value=''>No body types found</option>";
    }

}

function selectTransmission()
{
    global $conn;
    $query = "SELECT * FROM transmission";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $transmissions = mysqli_fetch_all($result, MYSQLI_ASSOC);


        foreach ($transmissions as $transmission) {
            echo "<option value='" . $transmission['tid'] . "'>" . $transmission['tname'] . "</option>";
        }

    } else {
        echo "<option value=''>No transmissions found</option>";
    }

}

function selectFuelType()
{
    global $conn;
    $query = "SELECT * FROM fuel";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $fuels = mysqli_fetch_all($result, MYSQLI_ASSOC);


        foreach ($fuels as $fuel) {
            echo "<option value='" . $fuel['Fuel_id'] . "'>" . $fuel['fuel_name'] . "</option>";
        }

    } else {
        echo "<option value=''>No fuel types found</option>";
    }

}

function selectStatus()
{
    global $conn;
    $query = "SELECT * FROM Status";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $statuses = mysqli_fetch_all($result, MYSQLI_ASSOC);


        foreach ($statuses as $status) {
            echo "<option value='" . $status['sid'] . "'>" . $status['sname'] . "</option>";
        }

    } else {
        echo "<option value=''>No statuses found</option>";
    }

}

