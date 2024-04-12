<?php
include "../actions/get_a_statistic.php";
include "../settings/core.php";

$booking = getABooking($_GET['booking_id']);
$car = getACar($booking['vehicle_id']);
$user = getAUser($booking['customer_id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Booking Details | ExotiqueCR </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="../css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="../css/animate.css">

    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">

    <link rel="stylesheet" href="../css/aos.css">

    <link rel="stylesheet" href="../css/ionicons.min.css">

    <link rel="stylesheet" href="../css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../css/jquery.timepicker.css">


    <link rel="stylesheet" href="../css/flaticon.css">
    <link rel="stylesheet" href="../css/icomoon.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/dropdown.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="index.php">EXO<span>TIQUE</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="car.php" class="nav-link">Cars</a></li>
                    <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
                    <?php navBarElements(); ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->

    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('../images/bg_3.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
                <div class="col-md-9 ftco-animate pb-5">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>Car <i
                                class="ion-ios-arrow-forward"></i></span></p>
                    <h1 class="mb-3 bread">Booking Details</h1>
                </div>
            </div>
        </div>
    </section>


    <section class="ftco-section ftco-car-details">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-md-12">

                    <div class="car-details">
                        <?php echo "<div class='img rounded' style='background-image: url(../images/uploads/" . $car["Image"] . ");'></div>"; ?>

                        <div class="text text-center">
                            <span class="subheading">
                                <?php echo $car["make"] ?>
                            </span>
                            <h2>
                                <?php echo $car["Model"] ?>
                            </h2>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h2 class="text-center mb-4">Car Details</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped custom-table">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="text-center">Attribute</th>
                                    <th class="text-center">Value</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>Make</strong></td>
                                    <td><?php echo $car["make"]; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Model</strong></td>
                                    <td><?php echo $car["Model"]; ?></td>
                                </tr>
                                <!-- Add more rows for other car attributes -->
                                <tr>
                                    <td><strong>Transmission</strong></td>
                                    <td><?php echo $car["transmission"]; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Capacity</strong></td>
                                    <td><?php echo $car["Capacity"]; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Fuel Type</strong></td>
                                    <td><?php echo $car["fueltype"]; ?></td>
                                </tr>
                                <!-- Add more rows as needed -->
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-primary">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Payment Details</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Start Date: <?php echo $booking['start_date']; ?></li>
                                <li class="list-group-item">Return Date: <?php echo $booking['return_date']; ?></li>
                                <li class="list-group-item">Daily Rate: $<?php echo $car['daily_rate']; ?></li>
                                <?php
                                $startDate = strtotime($booking['start_date']);
                                $endDate = strtotime($booking['return_date']);
                                $days = ceil(abs($endDate - $startDate) / 86400); // Calculate the number of days
                                $total = $car['daily_rate'] * $days;
                                ?>
                                <li class="list-group-item">Total Amount: $<?php echo number_format($total, 2); ?></li>
                            </ul>
                            <form action="../actions/confirm_booking.php" method="post" id="paymentForm">
                                <!-- Hidden fields -->
                                <input type="hidden" id="email-address" name="email-address"
                                    value="<?php echo $user['email'] ?>">
                                <input type="hidden" id="" name="booking_id" value="<?php echo $_GET['booking_id'] ?>">
                                <input type="hidden" id="amount" name="amount" value="<?php echo $total ?>">
                                <!-- End of hidden fields -->
                                <button type="submit" onclick="payWithPaystack()"
                                    class="btn btn-primary btn-block mt-3">Pay Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    </section>
    <section class="ftco-section ftco-car-details">

    </section>

    <footer class="ftco-footer ftco-bg-dark ftco-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2"><a href="landingpage.php" class="logo">Exo<span>tique</span></a></h2>
                        <p>Experience the
                            epitome of automotive excellence with us, and let us turn your ordinary moments into
                            extraordinary
                            memories.</p>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4 ml-md-5">
                        <h2 class="ftco-heading-2">Information</h2>
                        <ul class="list-unstyled">
                            <li><a href="about.php" class="py-2 d-block">About</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Customer Support</h2>
                        <ul class="list-unstyled">
                            <li><a href="contact.php" class="py-2 d-block">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Have a Questions?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain
                                        View, San
                                        Francisco, California, USA</span></li>
                                <li><a href="contact.php"><span class="icon icon-phone"></span><span class="text">+2 392
                                            3929
                                            210</span></a></li>
                                <li><a href="contact.php"><span class="icon icon-envelope"></span><span
                                            class="text">info@yourdomain.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">

                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>document.write(new Date().getFullYear());</script> All rights reserved | This template
                        is made with
                        <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com"
                            target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00" />
        </svg></div>


    <script src="../js/jquery.min.js"></script>
    <script src="../js/jquery-migrate-3.0.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.easing.1.3.js"></script>
    <script src="../js/jquery.waypoints.min.js"></script>
    <script src="../js/jquery.stellar.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/jquery.magnific-popup.min.js"></script>
    <script src="../js/aos.js"></script>
    <script src="../js/jquery.animateNumber.min.js"></script>
    <script src="../js/bootstrap-datepicker.js"></script>
    <script src="../js/jquery.timepicker.min.js"></script>
    <script src="../js/scrollax.min.js"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="../js/google-map.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/payment.js"></script>
    <script src="https://js.paystack.co/v1/inline.js"></script>


</body>

</html>