<?php
session_start();
include "connection.php";

// Function to check if the user is logged in
function isUserLoggedIn()
{
    return isset($_SESSION['user_id']);
}

// Function to check user role and redirect accordingly
function checkUserRoleRedirect()
{
    // Check if the 'user_id' and 'role' session variables are set
    if (isset($_SESSION['user_id']) && isset($_SESSION['role_id'])) {
        $userRole = $_SESSION['role_id'];

        // If user role matches expected role, redirect to the specified page
        if ($userRole === 3) {
            header("Location: ../view/landingpage.php");
            exit;
        }
    } else {
        // If user is not logged in, redirect to login page
        header("Location: ../login/login.php");
        exit;
    }
}

function navBarElements()
{
    if (isUserLoggedIn()) {
        global $conn;
        $sql = "SELECT User.fname FROM User WHERE pid = " . $_SESSION['user_id'];
        $result = $conn->query($sql);
        $user_name = $result->fetch_assoc()['fname'];
        echo '<li class="nav-item dropdown">';
        echo '<a href="#" class="nav-link profile">';
        echo '<p>Hi ' . $user_name . '</p>';
        echo '</a>';
        echo '<ul class="dropdown-menu">';
        if ($_SESSION['role_id'] == 1 || $_SESSION['role_id'] == 2) {
            echo '<li><a href="../admin/dashboard.php">Dashboard</a></li>';
            echo '<li><a href="../admin/profile.php">Profile</a></li>';
            echo '<li><a href="../admin/settings.php">Settings</a></li>';
        } else {
            echo '<li><a href="my-bookings.php">My Bookings</a></li>';
            echo '<li><a href="profile.php">Profile</a></li>';
        }
        echo '<li><a href="../login/logout.php">Logout</a></li>';
        echo '</ul>';
        echo '</li>';
    } else {
        echo "<li class='nav-item'><a href='../login/login.php' class='nav-link'>Login</a></li>";
        echo "<li class='nav-item'><a href='../login/signup.php' class='nav-link'>Register</a></li>";
    }
}

