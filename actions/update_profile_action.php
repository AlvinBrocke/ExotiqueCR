<?php
include '../settings/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Collect data from the form
    $user_id = $_POST['user_id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['telephone'];

    echo $user_id;
    echo $firstname;
    echo $lastname;
    echo $email;
    echo $phone;

    // Prepare and execute query to update user data
    $query = "UPDATE user SET fname = '$firstname', lname = '$lastname', email = '$email', tel = '$phone' WHERE pid = '$user_id'";
    $result = mysqli_query($conn, $query);
    // Check if query execution was successful
    if (!$result) {
        header("Location: ../login/register.php?error=database_error");
        exit();
    } else {
        header("Location: ../view/profile.php?msg=profile_updated_successfully");
        exit();
    }

}