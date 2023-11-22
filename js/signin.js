/*
    Student: JingYi Li
    File Name: script.js
    Date of creating: Nov 12 2023
    Description: This is for form validations
*/
function validate() {
    // Clear previous error messages
    clearErrors();

    // Get form elements
    let authorname = document.getElementById('authorname').value;
    let pass = document.getElementById('pass').value;

    // Validation checks
    let valid = true;

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

    // Submit the form if all validations pass
    return valid;
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
