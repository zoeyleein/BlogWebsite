<?php
require_once('db_credentials.php');
require_once('database.php');

// Process the login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $authorname = $_POST["authorname"];
    $password = $_POST["pass"];

    // Validate login credentials (you should perform proper password hashing)
    $sql = "SELECT * FROM `user` WHERE `author` = '$authorname' AND `password` = '$password'";
    // To check if it works successfully
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Login successful, redirect to main page
        header("Location: ../index.php");
        exit();
    } else {
        // Login failed, display error message
        echo "<script>
                document.getElementById('error-message').innerHTML = 'Invalid username or password.';
                </script>";
    }
}

// Close the database connection
$conn->close();
?>