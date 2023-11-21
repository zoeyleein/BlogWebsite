/*
    Student: JingYi Li, Wei Deng
    File Name: bloggingscript.js
    Date of creating: Nov 17 2023
    Description: This is for from validation
*/

function signUpValidate() {

    // Clear previous error messages
    clearErrors();

    // Get form elements
    let email = document.getElementById('email').value;
    let authorname = document.getElementById('authorname').value;
    let password = document.getElementById('password').value;

    // Validation checks
    let valid = true;


    // Check email format
    if (!isValidEmail(email)) {
        displayError('emailError', 'Email address should be valid.');
        valid = false;
    }

    if (authorname.trim() === '' || authorname.length > 20) {
        displayError('authornameError', 'The name should be non-empty and within 20 characters.');
        valid = false;
    } else {
        // Convert authorname to lowercase alphabetic characters
        authorname = authorname.toLowerCase();
    }

    // Check password length
    if (password.length < 8) {
        displayError('passwordError', 'Password should be at least 8 characters long.');
        valid = false;
    }

    // Submit the form if all validations pass
    return valid;
}

// Helper function to check email format
function isValidEmail(email) {
    let emailRegex = /^\S+@\S+\.\S+$/;
    return emailRegex.test(email);
}

// Helper function to display error messages
function displayError(fieldId, message) {
    let errorDiv = document.createElement('div');
    errorDiv.className = 'error-message';
    errorDiv.innerHTML = message;
    document.getElementById(fieldId).parentNode.appendChild(errorDiv);

    // Call setInputBorderError to highlight the input border
    setInputBorderError(document.getElementById(fieldId));
} 

// Helper function to clear error messages
function clearErrors() {
    let errorMessages = document.getElementsByClassName('error-message'); // NodeList
    while (errorMessages.length > 0) {
        errorMessages[0].parentNode.removeChild(errorMessages[0]);
    }
}

// Helper function to set input border color for error state
function setInputBorderError(inputElement) {
    inputElement.parentNode.classList.add('error'); // Add 'error' class to parent container
}