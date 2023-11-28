/*
    Student: JingYi Li, Wei Deng
    File Name: signup.js
    Date of creating: Nov 12 2023
    Description: This is for form validations
*/
function validate() {
    // Clear previous error messages
    clearErrors();

    // Get form elements
    let email = document.getElementById('email').value;
    let authorname = document.getElementById('authorname').value;
    let pass = document.getElementById('pass').value;
    let pass2 = document.getElementById('pass2').value;

    // Validation checks
    let valid = true;

    // Check email format
    if (!isValidEmail(email)) {
        displayError('email', 'Email address should be non-empty with the format xyz@xyz.xyz.');
        valid = false;
    }

    // Check login length
    if (authorname.trim() === '' || authorname.length >= 30) {
        displayError('authorname', 'User name should be non-empty, and within 30 characters.');
        valid = false;
    } else {
        // Convert login to lowercase alphabetic characters
        authorname = authorname.toLowerCase();
    }

    // Check password length
    if (pass.length < 8) {
        displayError('pass', 'Password should be at least 8 characters long.');
        valid = false;
    }

    // Check if both password fields have the same value
    if (pass !== pass2 || pass.trim() === '') {
        displayError('pass2', 'Please retype password.');
        valid = false;
    }

    // Submit the form if all validations pass
    return valid;
}

// Helper function to check email format
function isValidEmail(email) {
    // Use a simple regular expression for basic email format validation
    let emailRegex = /^\S+@\S+\.\S+$/;
    return emailRegex.test(email); // test is for checking if () is true or false
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
