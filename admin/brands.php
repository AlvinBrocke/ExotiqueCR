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
    <link rel="stylesheet" href="../css/popupforms.css">
    <link rel="stylesheet" href="../css/dashboard.css">


    <title>Brands | Exotique</title>
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
            <li class="active">
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
            <li>
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
                <a href="../login/logout.php" class="logout">
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
                    <h1>Brands</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="brands.php">Brands</a>
                        </li>
                    </ul>
                </div>
                <a href="#" class="btn-download" onclick="toggleaddBrandForm()">
                    <i class='bx bx-plus'></i>
                    <span class="text">Add Brand</span>
                </a>
            </div>

            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Brands</h3>
                        <div class="icons">
                            <!-- <i class='bx bx-search'></i>
                            <i class='bx bx-filter'></i> -->
                        </div>
                    </div>
                    <table class="brand-table">
                        <thead>
                            <tr>
                                <th>Brand Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php displayAllBrands(); ?>
                        </tbody>
                    </table>
                </div>
            </div>


            <div class="popup-form-container" id="addBrandForm">
                <div class="popup-form">
                    <h4 style="font-weight: bold;">Add Brand</h4>
                    <button class="close-btn" onclick="closeaddBrandForm()">x</button> <!-- Closing button -->
                    <form action="../actions/add_brand_action.php" method="POST" enctype="multipart/form-data"
                        onsubmit="return validateBrand()">
                        <div class="form-group">
                            <label for="brand_name">Brand Name:</label>
                            <input type="text" id="brand_name" name="brand_name" required>
                            <p id="brand_name_error" class="error-message"></p>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn-submit">Add Brand</button>
                        </div>
                    </form>
                </div>
            </div>




        </main>
    </section>
    <script src=" ../js/dashboard.js"></script>
    <script src="../js/validations.js"></script>
</body>

</html>