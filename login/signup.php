<?php include "../settings/core.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register Page | Exotique</title>
    <link rel="stylesheet" href="../css/login_register.css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
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
</head>

<body>



    <div class="home">
        <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
            <div class="container">
                <a class="navbar-brand" href="index.php">EXO<span>TIQUE</span></a>
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
        <div class="form_container">
            <div class="form signup_form">
                <form action="../actions/register_user.php" method="post" name="register-form"
                    onsubmit="return validateRegister()">
                    <h2><strong>Register</strong></h2>

                    <div class="input_box">
                        <i class="uil uil-user"></i>
                        <input type="text" id="firstname" name="firstname" placeholder="First name" required=""
                            maxlength="50">
                        <p id="firstname_error" class="error-message">Invalid First Name</p>
                    </div>
                    <div class="input_box">
                        <i class="uil uil-user"></i>
                        <input type="text" id="lastname" name="lastname" placeholder="Last name" required=""
                            maxlength="50">
                        <p id="lastname_error" class="error-message">Invalid Last Name</p>
                    </div>

                    <div class="input_box">
                        <i class="uil uil-phone"></i>
                        <input id="tel" type="tel" name="tel" placeholder="Telephone">
                        <p id="tel_error" class="error-message">Invalid Phone Number</p>
                    </div>
                    <div class="input_box">
                        <i class="uil uil-envelope"></i>
                        <input id="email" type="email" name="email" placeholder="Email address" required=""
                            maxlength="255">
                        <p id="email_error" class="error-message">Invalid Email Address</p>
                    </div>
                    <div class="input_box">
                        <i class="uil uil-lock-alt"></i>
                        <input id="password" type="password" name="password" placeholder="Create password" required=""
                            minlength="8" maxlength="255">
                        <p id="password_error" class="error-message">Invalid Password</p>
                    </div>
                    <div class="input_box">
                        <i class="uil uil-lock-alt"></i>
                        <input id="confirm_password" type="password" name="confirm_password"
                            placeholder="Confirm password" required="" minlength="8" maxlength="255">
                        <p id="confirm_password_error" class="error-message">Passwords do not match</p>
                    </div>

                    <button name="registerBtn" type="submit" class="button">Register</button>
                    <div class="login_signup">Already have an account? <a href="login.php" id="login">Login</a>
                    </div>
                </form>


            </div>
        </div>


    </div>


    <footer class="ftco-footer ftco-bg-dark ftco-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2"><a href="../view/landingpage.php"
                                class="logo">Exo<span>tique</span></a>
                        </h2>
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
                                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St.
                                        Mountain View, San
                                        Francisco, California, USA</span></li>
                                <li><a href="contact.php"><span class="icon icon-phone"></span><span class="text">+2
                                            392 3929
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
                        <script>document.write(new Date().getFullYear());</script> All rights reserved | This
                        template is made with
                        <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com"
                            target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <script src="../js/login_signup.js"></script>
</body>

</html>