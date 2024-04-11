<?php
include "../settings/core.php";
include "../actions/get_a_statistic.php";
include "../functions/dashboard_stats.php";
checkUserRoleRedirect();

if (isset($_GET['cid'])) {
    // Get the chore ID from the URL
    $ret_var = $_GET['cid'];

    // Get the chore details from the database
    $car = getACar($ret_var);

} else {
    // If the request method is not GET, redirect to the admin home page
    header("Location: ../admin/brands.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/edit_form.css">


    <title>Cars | Exotique</title>
</head>

<body>
    <section id="sidebar">
        <a href="../view/landingpage.php" class="brand">
            <i class='bx bxs-car'></i>
            <span class="text">EXOTIQUE</span>
        </a>
        <ul class="side-menu top">
            <li>
                <a href="dashboard.php">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="bookings.php">
                    <i class='bx bxs-book'></i>
                    <span class="text">Bookings</span>
                </a>
            </li>
            <li>
                <a href="booking-history.php">
                    <i class='bx bx-history'></i>
                    <span class="text">Booking History</span>
                </a>
            </li>
            <li>
                <a href="brands.php">
                    <i class='bx bxs-tag'></i>
                    <span class="text">Brands</span>
                </a>
            </li>
            <li>
                <a href="bodytype.php">
                    <i class='bx bxs-car-mechanic'></i>
                    <span class="text">Vehicle Type</span>
                </a>
            </li>
            <li class="active">
                <a href="cars.php">
                    <i class='bx bxs-car'></i>
                    <span class="text">Cars</span>
                </a>
            </li>
            <li>
                <a href="users.php">
                    <i class='bx bx-user'></i>
                    <span class="text">Admin/Users</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="settings.php">
                    <i class='bx bxs-cog'></i>
                    <span class="text">Settings</span>
                </a>
            </li>
            <li>
                <a href="logout.php" class="logout">
                    <i class='bx bxs-log-out-circle'></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>




    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu'></i>
            <!-- <a href="#" class="nav-link">Categories</a>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <input type="checkbox" id="switch-mode" hidden>
            <a href="#" class="notification">
                <i class='bx bxs-bell'></i>
                <span class="num">8</span>
            </a>
            <a href="#" class="profile">
                <img src="../images/people.png">
            </a> -->
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Cars</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a href="cars.php">Cars</a>
                        </li>
                        <li>
                            <a class="active" href="cars.php">Edit Car</a>
                        </li>
                    </ul>
                </div>
            </div>



            <h4 style="font-weight: bold;">Edit Car</h4>
            <div class="form-container">
                <form action="../actions/edit_car_action.php" method="POST" id="editVehicleForm"
                    enctype="multipart/form-data" onsubmit="return validateCar()">

                    <div class="form-group" id="regno-group">
                        <label for="reg_no">Registration No:</label>
                        <input type="hidden" name="car_id" value="<?php echo $car['car_id']; ?>">
                        <input type="text" id="reg_no" name="reg_no" value="<?php echo $car['Reg_no']; ?>" required>
                        <p class="error-message" id="regno-error">Invalid Registration Number</p>
                    </div>

                    <div class="form-group" id="make-group">
                        <label for="make">Make:</label>
                        <select name="make" id="make" required>
                            <option value="<?php echo $car['Make_id']; ?>" selected>
                                <?php echo $car['make']; ?>
                            </option>
                            <?php selectMake(); ?>
                        </select>
                        <p class="error-message" id="make-error">Please select a make.</p>
                    </div>

                    <div class="form-group" id="model-group">
                        <label for="model">Model:</label>
                        <input type="text" id="model" name="model" value="<?php echo $car['Model']; ?>" required>
                        <p class="error-message" id="model-error">Please enter a valid model.</p>
                    </div>

                    <div class="form-group" id="year-group">
                        <label for="year">Year:</label>
                        <input type="text" id="year" name="year" value="<?php echo $car['Year']; ?>" required>
                        <p class="error-message" id="year-error">Please enter a valid year.</p>
                    </div>

                    <div class="form-group" id="type-group">
                        <label for="type">Car Type:</label>
                        <select name="car_type" id="car_type" required>
                            <option value="<?php echo $car['Type_id']; ?>" selected>
                                <?php echo $car['cartype']; ?>
                            </option>
                            <?php selectCarType(); ?>
                        </select>
                        <p class="error-message" id="type-error">Please select a car type.</p>
                    </div>

                    <div class="form-group" id="transmission-group">
                        <label for="transmission">Transmission:</label>
                        <select name="transmission" id="transmission" required>
                            <option value="<?php echo $car['Transmission_id']; ?>" selected>
                                <?php echo $car['transmission']; ?>
                            </option>
                            <?php selectTransmission(); ?>
                        </select>
                        <p class="error-message" id="transmission-error">Please select a transmission type.</p>
                    </div>

                    <div class="form-group" id="fuel-group">
                        <label for="fuel">Fuel:</label>
                        <select name="fuel_type" id="fuel_type" required>
                            <option value="<?php echo $car['Fuel_id']; ?>" selected>
                                <?php echo $car['fueltype']; ?>
                            </option>
                            <?php selectFuelType(); ?>
                        </select>
                        <p class="error-message" id="fuel-error">Please select a fuel type.</p>
                    </div>

                    <div class="form-group" id="capacity-group">
                        <label for="capacity">Capacity:</label>
                        <input type="text" id="capacity" name="capacity" value="<?php echo $car['Capacity']; ?>"
                            required>
                        <p class="error-message" id="capacity-error">Please enter a valid capacity.</p>
                    </div>

                    <div class="form-group" id="image-group">
                        <label for="image">Image:</label>
                        <input type="file" id="car_image" name="car_image" value="<?php echo $car['Image'] ?>">
                        <?php if (isset($_GET['error'])): ?>
                            <p class="error-message">
                                <?php echo $_GET['error']; ?>
                            </p>
                        <?php endif; ?>
                        <p class="error-message" id="image-error">Please select an image.</p>
                    </div>

                    <div class="form-group" id="description-group">
                        <label for="description">Description:</label>
                        <textarea name="description" id="description" cols="30" rows="10"
                            required><?php echo $car['description']; ?></textarea>
                        <p class="error-message" id="description-error">Description is required.</p>

                        <div class="form-group" id="submit-group">
                            <button type="submit" class="btn-submit" name="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>


            </div>


        </main>
    </section>



    <script src=" ../js/dashboard.js"></script>
    <script src="../js/validations/car.js"></script>
</body>

</html>