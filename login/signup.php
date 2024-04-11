<!DOCname html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Register Page | Exotique</title>
        <link rel="stylesheet" href="../css/login_register.css" />
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    </head>

    <body>
        <section class="home">
            <div class="form_container">
                <div class="form signup_form">
                    <form action="../actions/register_user.php" method="post" name="register-form"
                        onsubmit="return validateRegister()">
                        <h2>Register</h2>

                        <div class="input_box">
                            <i class="uil uil-user"></i>
                            <input type="text" id="firstname" name="firstname" placeholder="First name" required
                                maxlength="50" />
                            <p id="firstname_error" class="error-message">Invalid First Name</p>
                        </div>
                        <div class="input_box">
                            <i class="uil uil-user"></i>
                            <input type="text" id="lastname" name="lastname" placeholder="Last name" required
                                maxlength="50" />
                            <p id="lastname_error" class="error-message">Invalid Last Name</p>
                        </div>

                        <div class="input_box">
                            <i class="uil uil-phone"></i>
                            <input id="tel" type="tel" name="tel" placeholder="Telephone" />
                            <p id="tel_error" class="error-message">Invalid Phone Number</p>
                        </div>
                        <div class="input_box">
                            <i class="uil uil-envelope"></i>
                            <input id="email" type="email" name="email" placeholder="Email address" required
                                maxlength="255" />
                            <p id="email_error" class="error-message">Invalid Email Address</p>
                        </div>
                        <div class="input_box">
                            <i class="uil uil-lock-alt"></i>
                            <input id="password" type="password" name="password" placeholder="Create password" required
                                minlength="8" maxlength="255" />
                            <p id="password_error" class="error-message">Invalid Password</p>
                        </div>
                        <div class="input_box">
                            <i class="uil uil-lock-alt"></i>
                            <input id="confirm_password" type="password" name="confirm_password"
                                placeholder="Confirm password" required minlength="8" maxlength="255" />
                            <p id="confirm_password_error" class="error-message">Passwords do not match</p>
                        </div>

                        <button name="registerBtn" type="submit" class="button">Register</button>
                        <div class="login_signup">Already have an account? <a href="login.php" id="login">Login</a>
                        </div>
                    </form>


                </div>
            </div>
        </section>

        <script src="../js/login_signup.js"></script>
    </body>

    </html>