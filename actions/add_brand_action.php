<?php
include "../settings/connection.php";

global $conn;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Get the chore name from the POST data
    $makeName = $_POST['brand_name'];

    if (empty($makeName)) {
        header('Location: ../admin/brands.php?msg=Please fill in all fields');
        exit;

    } else if (!is_string($makeName)) {
        header('Location: ../admin/brands.php?msg=Please enter a valid brand name');
        exit;
    } else if (strlen($makeName) > 50) {
        header('Location: ../admin/brands.php?msg=Brand name is too long');
        exit;
    } else {

        // Prepare and execute the SQL query to insert the chore into the database
        $make_sql = "INSERT INTO MAKE (Make_name) VALUES (?)";
        $stmt = $conn->prepare($make_sql);
        $stmt->bind_param("s", $makeName);

        if ($stmt->execute()) {
            // Redirect back to the admin home page after adding the chore
            header('Location: ../admin/brands.php');
            exit;
        } else {
            echo "Error with SQL query" . mysqli_error($conn);
            exit;
        }

    }




}


