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
    $carMileage = $_POST['mileage'];
    $carImageSize = $_FILES['car_image']['size'];
    $carImageTemp = $_FILES['car_image']['tmp_name'];
    $carImageName = $_FILES['car_image']['name'];
    $error = $_FILES['car_image']['error'];

    if ($error === 0) {
        if ($carImageSize > 5000000) {
            header('Location: ../admin/cars.php?error=File must be less than 5MB');
        } else {
            $img_ex = pathinfo($carImageName, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png");

            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = '../images/uploads/' . $new_img_name;
                move_uploaded_file($carImageTemp, $img_upload_path);


                //Form validations
                if (empty($carRegNo) || empty($carMake) || empty($carModel) || empty($carYear) || empty($carType) || empty($carTransmission) || empty($carCapacity) || empty($carFuel) || empty($carDescription)) {
                    header('Location: ../admin/cars.php?msg=Please fill in all fields');
                    exit;
                }

                if (!is_string($carRegNo) || !is_string($carModel) || !is_string($carDescription)) {
                    header('Location: ../admin/cars.php?msg=Please enter a valid input');
                    exit;
                }

                if (!is_numeric($carCapacity)) {
                    header('Location: ../admin/cars.php?msg=Please enter a car capacity');
                    exit;
                }

                // Prepare and execute the SQL query to insert the car into the database
                $car_sql = "INSERT INTO car (make_id, Model, `Year`, Type_id, Transmission_id, Capacity, Reg_no, `Status_id`, `Image`, fuel_id, `description`, mileage) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($car_sql);
                $stmt->bind_param("isiiissssisi", $carMake, $carModel, $carYear, $carType, $carTransmission, $carCapacity, $carRegNo, $carStatus, $new_img_name, $carFuel, $carDescription, $carMileage); // Image parameter is removed as it is handled separately
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

                header("Location: ../admin/add_car.php?error='Cannot upload files of this type'");
            }
        }
    } else {

        header("Location: ../admin/add_car.php?error='unknown error occurred'");
    }
} else {
    header("Location: ../admin/cars.php?error='Image not uploaded'");
}
