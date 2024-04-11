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

    <title>Body Type | Exotique</title>
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
            <li class="active">
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
                    <h1>Vehicle Type</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="bodytype.php">Vehicle Type</a>
                        </li>
                    </ul>
                </div>
                <a href="#" class="btn-download" onclick="toggleaddBodyTypeForm()">
                    <i class='bx bx-plus'></i>
                    <span class="text">Add Vehicle Type</span>
                </a>
            </div>
            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Body Type</h3>
                        <i class='bx bx-search'></i>
                        <i class='bx bx-filter'></i>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Vehicle Type</th>
                                <th>Daily Rate</th>
                                <th>Weekly Rate</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php displayAllBodyTypes(); ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="popup-form-container" id="addBodyTypeForm">
                <div class="popup-form">
                    <h4 style="font-weight: bold;">Add Vehicle Type</h4>
                    <button class="close-btn" onclick="closeaddBodyTypeForm()">x</button>
                    <form action="../actions/add_bodytype_action.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="bodytype_name">Vehicle Type:</label>
                            <input type="text" id="bodytype_name" name="bodytype_name" required>
                        </div>
                        <div class="form-group">
                            <label for="daily_rate">Daily Rate:</label>
                            <input type="text" id="daily_rate" name="daily_rate">
                        </div>
                        <div class="form-group">
                            <label for="weekly_rate">Weekly Rate:</label>
                            <input type="text" id="weekly_rate" name="weekly_rate">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn-submit">Add Car Type</button>
                        </div>
                    </form>
                </div>
            </div>

        </main>
    </section>



    <script src=" ../js/dashboard.js"></script>
</body>

</html>