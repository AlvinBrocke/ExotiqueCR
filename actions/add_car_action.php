<?php
include "../settings/connection.php";

global $conn;

if (isset($_POST['submit']) && isset($_FILES['car_image'])) {
    $carRegNo = $_POST['reg_no'];
    $carMake = $_POST['make']; // Assuming make is an ID referencing the make table
    $carModel = $_POST['model'];
    $carYear = $_POST['year'];
    $carType = $_POST['car_type'];
    $carTransmission = $_POST['transmission'];
    $carCapacity = $_POST['capacity'];
    $carStatus = 0;
    $carDescription = $_POST['description'];
    $carFuel = $_POST['fuel_type'];
    $carImageSize = $_FILES['car_image']['size'];
    $carImageTemp = $_FILES['car_image']['tmp_name'];
    $carImageName = $_FILES['car_image']['name'];
    $error = $_FILES['car_image']['error'];

    if ($error === 0) {
        if ($carImageSize > 1000000) {
            $em = "Your file size is too large";
            header('Location: ../admin/cars.php?error=$em');
        } else {
            $img_ex = pathinfo($carImageName, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png");

            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = '../images/uploads/' . $new_img_name;
                move_uploaded_file($carImageTemp, $img_upload_path);

                // Prepare and execute the SQL query to insert the car into the database
                $car_sql = "INSERT INTO car (make_id, Model, `Year`, Type_id, Transmission_id, Capacity, Reg_no, `Status_id`, `Image`, fuel_id, `description`) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($car_sql);
                $stmt->bind_param("isiiissssis", $carMake, $carModel, $carYear, $carType, $carTransmission, $carCapacity, $carRegNo, $carStatus, $new_img_name, $carFuel, $carDescription); // Image parameter is removed as it is handled separately
                $result = $stmt->execute();

                if ($result) {
                    // Redirect back to the admin home page after adding the car
                    header('Location: ../admin/cars.php?msg=Car added successfully');
                    exit;
                } else {
                    echo "Error with SQL query: " . $conn->error; // corrected error handling
                    exit;
                }
            } else {
                $em = "You can't upload files of this type";
                header("Location: ../admin/cars.php?error='$em'");
            }
        }
    } else {
        $em = "unknown error occurred";
        header("Location: ../admin/cars.php?error='$em'");
    }
} else {
    $em = "Image not uploaded";
    header("Location: ../admin/cars.php?error='$em'");
}
