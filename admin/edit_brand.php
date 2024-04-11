<?php
include "../settings/core.php";
include "../actions/get_a_statistic.php";
checkUserRoleRedirect();

if (isset($_GET['mid'])) {
    // Get the chore ID from the URL
    $ret_var = $_GET['mid'];

    // Get the chore details from the database
    $ret_brand = getABrand($ret_var);

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
    <link rel="stylesheet" href="../css/popupforms.css">
    <link rel="stylesheet" href="../css/edit_form.css">


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
                <img src="img/people.png">
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
                            <a href="brands.php">Brands</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="brands.php">Edit Brand</a>
                        </li>
                    </ul>
                </div>
            </div>

            <form action="../actions/edit_brand_action.php" method="POST">
                <div class="form-group">
                    <label for="edit_brand_name">Brand Name:</label>
                    <input type="hidden" id="edit_brand_id" name="edit_brand_id"
                        value="<?php echo $ret_brand['Make_id']; ?>">
                    <input type="text" id="edit_brand_name" name="edit_brand_name" required
                        value="<?php echo $ret_brand['Make_name']; ?>">
                </div>
                <div class="form-group">
                    <button name="editBtn" type="submit" class="btn-submit">Edit Brand</button>
                </div>
            </form>



        </main>
    </section>



    <script src=" ../js/dashboard.js"></script>
</body>

</html>