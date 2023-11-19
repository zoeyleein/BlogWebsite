/*
    Student: JingYi Li, Wei Deng
    File Name: bloggingscript.js
    Date of creating: Nov 17 2023
    Description: This is for from validation
*/

function signUpValidate() {
    clearErrors();

    let username = document.getElementById('username').value;
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;

    let valid = true;

    if (username.trim() === '' || username.length > 20) {
        displayError('usernameError', 'User name should be non-empty and within 20 characters.');
        valid = false;
    }

    if (!isValidEmail(email)) {
        displayError('emailError', 'Email address should be valid.');
        valid = false;
    }

    if (password.length < 8) {
        displayError('passwordError', 'Password should be at least 8 characters long.');
        valid = false;
    }

    return valid;
}

function isValidEmail(email) {
    let emailRegex = /^\S+@\S+\.\S+$/;
    return emailRegex.test(email);
}

function displayError(fieldId, message) {
    let errorDiv = document.getElementById(fieldId);
    errorDiv.innerHTML = message;
}

function clearErrors() {
    let errorMessages = document.getElementsByClassName('error-message');
    for (let i = 0; i < errorMessages.length; i++) {
        errorMessages[i].innerHTML = '';
    }
}