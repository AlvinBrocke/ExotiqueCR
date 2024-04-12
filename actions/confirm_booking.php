<?php
include "../settings/connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $url = "https://api.paystack.co/transaction/initialize";

    $fields = [
        'email' => "customer@email.com",
        'amount' => "20000",
        'callback_url' => "https://hello.pstk.xyz/callback",
        'metadata' => ["cancel_action" => "https://your-cancel-url.com"]
    ];

    $fields_string = http_build_query($fields);

    //open connection
    $ch = curl_init();

    //set the url, number of POST vars, POST data
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Authorization: Bearer SECRET_KEY",
        "Cache-Control: no-cache",
    )
    );

    //So that curl_exec returns the contents of the cURL; rather than echoing it
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //execute post
    $result = curl_exec($ch);
    echo $result;

    $booking_id = $_POST['booking_id'];

    $sql = "UPDATE bookings SET booking_status_id = 1 WHERE booking_id = '$booking_id'";
    $result = $conn->query($sql);
    if ($result) {
        header("Location: ../view/landingpage.php?msg=booking_confirmed_successfully");
        exit();
    } else {
        echo "Error with SQL query: " . $conn->error;
        exit();
    }
} else {
    header("Location: ../view/landingpage.php?error=Please select a booking to confirm");
    exit();
}
