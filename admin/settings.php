<?php
include "../settings/core.php";
include "../actions/get_a_statistic.php";
checkUserRoleRedirect();
$ret_user = getAUser($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/settings.css">
    <link rel="stylesheet" href="../css/edit_form.css">

    <title>Settings | Exotique</title>
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
            <li class="active">
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

    <section id="content">
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
                    <h1>Profile Settings</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="settings.php">Settings</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Profile settings content -->
            <div class="profile-settings">
                <div class="section">
                    <h2>Account Information</h2>
                    <form action="../actions/edit_user_action.php" method="post" class="form">
                        <input type="hidden" name="role" value="<?php echo $ret_user['role']; ?>">
                        <div class="form-group">
                            <label for="first_name">First Name:</label>
                            <input type="hidden" id="user_id" name="user_id" value="<?php echo $ret_user['pid']; ?>">
                            <input type="text" id="first_name" name="first_name" required
                                value="<?php echo $ret_user['fname']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name:</label>
                            <input type="text" id="last_name" name="last_name" required
                                value="<?php echo $ret_user['lname']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" required
                                value="<?php echo $ret_user['email']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="tel">Tel:</label>
                            <input type="text" id="tel" name="tel" required value="<?php echo $ret_user['tel']; ?>">
                        </div>
                        <div class="form-group">
                            <!-- Add more fields as needed -->
                            <button type="submit" class="btn">Update Profile</button>
                        </div>
                    </form>
                </div>
                <!-- <div class="section">
                    <h2>Change Password</h2>
                    <form action="change_password.php" method="post" class="form">
                        <div class="form-group">
                            <label for="current-password">Current Password:</label>
                            <input type="password" id="current-password" name="current-password" class="input-field"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="new-password">New Password:</label>
                            <input type="password" id="new-password" name="new-password" class="input-field" required>
                        </div>
                        <div class="form-group">
                            <label for="confirm-password">Confirm New Password:</label>
                            <input type="password" id="confirm-password" name="confirm-password" class="input-field"
                                required>
                        </div>
                        <button type="submit" class="btn">Change Password</button>
                    </form>
                </div> -->
            </div>

            <!-- End of Profile settings content -->
        </main>
        <!-- MAIN -->
    </section>

    </main>
    </section>



    <script src=" ../js/dashboard.js"></script>
</body>

</html>