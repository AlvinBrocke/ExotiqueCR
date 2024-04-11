<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Page | Exotique</title>
    <link rel="stylesheet" href="../css/login_register.css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
</head>

<body>
    <section class="home">
        <div class="form_container">
            <div class="form login_form">
                <form action="../actions/login_user.php" method="POST" id="login-form"
                    onsubmit="return validateLogin()">
                    <h2>Login</h2>

                    <div class=" input_box">
                        <input id="email" name="email" type="email" placeholder="Enter your email" required
                            aria-label="Email" aria-describedby="email-error" aria-invalid="false" />
                        <i class="uil uil-envelope-alt email"></i>
                        <span id="email-error" class="error-message" aria-live="polite">Invalid email address</span>
                    </div>

                    <div class="input_box">
                        <input id="password" name="password" type="password" placeholder="Enter your password" required
                            aria-label="Password" aria-describedby="password-error" aria-invalid="false" />
                        <i class="uil uil-lock password"></i>
                        <i class="uil uil-eye-slash pw_hide"></i>
                        <span id="password-error" class="error-message" aria-live="polite">Invalid password</span>
                    </div>

                    <button class="button" type="submit" name="loginBtn">Login</button>

                    <div class="login_signup">Don't have an account? <a href="signup.php" id="signup">Register</a>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script src="../js/login_signup.js"></script>

</body>

</html>