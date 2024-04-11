<?php
include "../settings/core.php";
include "../settings/connection.php";

if (isset($_POST['submit']) && isset($_FILES['image'])) {

    $car_id = $_POST['car_id'];
    $car_model = mysqli_real_escape_string($conn, $_POST['model']);
    $car_make = $_POST['make'];
    $car_body_type = $_POST['car_type'];
    $car_transmission = $_POST['transmission'];
    $car_fuel = $_POST['fuel_type'];
    $car_capacity = $_POST['capacity'];
    $car_description = mysqli_real_escape_string($conn, $_POST['description']);
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

                $update = "UPDATE car 
                SET Model = '$car_model',  
                    make_id = $car_make, 
                    Type_id = $car_body_type, 
                    Transmission_id = $car_transmission, 
                    fuel_id = $car_fuel, 
                    Capacity = $car_capacity, 
                    `description` = '$car_description', 
                    `Image` = '$car_image' 
                WHERE car_id = $car_id";
                // Perform the update
                $result = mysqli_query($conn, $update);

                // Check if update was successful
                if ($result) {
                    // Redirect to admin chore management page
                    header("Location: ../admin/cars.php?msg='update_successful'");
                    exit();
                } else {
                    echo "Error updating record: " . mysqli_error($conn);
                }
            } else {
                $em = "You can't upload files of this type";
                header('Location: ../admin/cars.php?error=$em');
            }
        }
    } else {
        $em = "unknown error occurred";
        header('Location: ../admin/cars.php?error=$em');
    }
} else {
    $em = "Image not uploaded";
    header("Location: ../admin/cars.php?error='$em'");
}