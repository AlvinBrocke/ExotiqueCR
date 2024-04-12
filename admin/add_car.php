<?php
include "../settings/core.php";
include "../functions/dashboard_stats.php";
checkUserRoleRedirect();
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
                            <a class="active" href="cars.php">Add Car</a>
                        </li>
                    </ul>
                </div>
            </div>



            <h4 style="font-weight: bold;">Add Car</h4>
            <div class="form-container">
                <form action="../actions/add_car_action.php" method="POST" id="addVehicleForm"
                    enctype="multipart/form-data" onsubmit="return validateCar()">
                    <div class="form-group" id="image-group">
                        <label for="image">Image:</label>
                        <input type="file" id="car_image" name="car_image" required>
                        <?php if (isset($_GET['error'])): ?>
                            <p class="error-message">
                                <?php echo $_SESSION['error']; ?>
                            </p>
                        <?php endif; ?>
                    </div>
                    <div class="form-group" id="regno-group">
                        <label for="reg_no">Registration No:</label>
                        <input type="text" id="reg_no" name="reg_no" required>
                        <p class="error-message" id="regno-error">Invalid Registration Number</p>
                    </div>

                    <div class="form-group" id="make-group">
                        <label for="make">Make:</label>
                        <select name='make' id='make'>;
                            <?php selectMake() ?>
                        </select>
                    </div>

                    <div class="form-group" id="model-group">
                        <label for="model">Model:</label>
                        <input type="text" id="model" name="model" required>
                        <p class="error-message" id="model-error">Please enter a valid model.</p>
                    </div>

                    <div class="form-group" id="year-group">
                        <label for="year">Year:</label>
                        <input type="text" id="year" name="year" required>
                        <p class="error-message" id="year-error">Please enter a valid year.</p>
                    </div>

                    <div class="form-group" id="type-group">
                        <label for="type">Car Type:</label>
                        <select name='car_type' id='car_type'>;
                            <?php selectCarType() ?>
                        </select>
                    </div>

                    <div class="form-group" id="transmission-group">
                        <label for="transmission">Transmission:</label>
                        <select name="transmission" id="transmission">;
                            <?php selectTransmission() ?>
                        </select>
                    </div>

                    <div class="form-group" id="fuel-group">
                        <label for="fuel">Fuel:</label>
                        <select name="fuel_type" id="fuel_type">;
                            <?php selectFuelType() ?>
                        </select>
                    </div>

                    <div class="form-group" id="capacity-group">
                        <label for="capacity">Capacity:</label>
                        <input type="number" id="capacity" name="capacity" required min="0" max="16">
                        <p class="error-message" id="capacity-error">Please enter a valid capacity.</p>
                    </div>

                    <div class="form-group" id="mileage-group">
                        <label for="mileage">Mileage:</label>
                        <input type="number" id="mileage" name="mileage" required min="0" max="50000">
                        <p class="error-message" id="mileage-error">Please enter a valid mileage.</p>
                    </div>
                    <div class="form-group" id="description-group">
                        <label for="description">Description:</label>
                        <textarea name="description" id="description" cols="30" rows="10" required></textarea>
                        <p class="error-message" id="description-error">Description is required.</p>
                    </div>
                    <div class="form-group" id="submit-group">
                        <button type="submit" class="btn-submit" name="submit">Submit</button>
                    </div>
            </div>

            </form>
            </div>



        </main>
    </section>



    <script src=" ../js/dashboard.js"></script>
    <script src="../js/validations/car.js"></script>
</body>

</html>