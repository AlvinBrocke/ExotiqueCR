// Regex
const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/;
const nameRegex = /^[a-zA-Z]+$/;
const telRegex = /^[+]{1}(?:[0-9\-\(\)\/\.]\s?){6,15}[0-9]{1}$/;

function validateRegister() {
    var firstname = document.getElementById('firstname').value;
    var lastname = document.getElementById('lastname').value;
    var tel = document.getElementById('tel').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var confirm_password = document.getElementById('confirm_password').value;

    var firstname_error = document.getElementById('firstname_error');
    var lastname_error = document.getElementById('lastname_error');
    var tel_error = document.getElementById('tel_error');
    var email_error = document.getElementById('email_error');
    var password_error = document.getElementById('password_error');
    var confirm_password_error = document.getElementById('confirm_password_error');
    var valid = true;

    // Validate firstname
    if (!nameRegex.test(firstname)) {
        firstname_error.style.display = 'block';
        valid = false;
    } else {
        firstname_error.style.display = 'none';
    }

    // Validate lastname
    if (!nameRegex.test(lastname)) {
        lastname_error.style.display = 'block';
        valid = false;
    } else {
        lastname_error.style.display = 'none';
    }

    // Validate tel
    if (!telRegex.test(tel)) {
        tel_error.style.display = 'block';
        valid = false;
    } else {
        tel_error.style.display = 'none';
    }

    // Validate email
    if (!emailRegex.test(email)) {
        email_error.style.display = 'block';
        valid = false;
    } else {
        email_error.style.display = 'none';
    }

    // Validate password
    if (!passwordRegex.test(password)) {
        password_error.style.display = 'block';
        valid = false;
    } else {
        password_error.style.display = 'none';
    }

    // Validate confirm_password
    if (confirm_password !== password) {
        confirm_password_error.style.display = 'block';
        valid = false;
    } else {
        confirm_password_error.style.display = 'none';
    }

    return valid;
}

function validateLogin() {
    // Retrieve form inputs
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;

    // Retrieve error elements
    var emailError = document.getElementById('email-error');
    var passwordError = document.getElementById('password-error');

    // Validate email and password
    var emailValid = emailRegex.test(email);
    var passwordValid = passwordRegex.test(password);

    if (emailValid && passwordValid) {
        console.log("Login Successful");
        return true;
    } else {
        if (!emailValid) {
            emailError.style.display = 'block';
        } else {
            emailError.style.display = 'none';
        }
        if (!passwordValid) {
            passwordError.style.display = 'block';
        } else {
            passwordError.style.display = 'none';
        }
        return false;
    }
}
