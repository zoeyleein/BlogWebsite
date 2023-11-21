function signInValidate() {
    // Clear previous error messages
    clearErrors();

    // Get form elements
    let username = document.getElementById('username').value;
    let password = document.getElementById('password').value;

    // Validation checks
    let valid = true;

    // Check if username is empty
    if (username.trim() === '') {
        displayError('usernameError', 'User name cannot be empty.');
        valid = false;
    }

    // Check if password is empty
    if (password.trim() === '') {
        displayError('passwordError', 'Password cannot be empty.');
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
