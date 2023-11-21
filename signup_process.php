<?php
// Establish a connection to the database
$servername = "localhost";
$username = "appuser";
$password = "password";
$dbname = "blog";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user input data
$author = $_POST['authorname'];
$email = $_POST['email'];
$password = $_POST['password'];

// Hash the password (replace this with your preferred hashing method)
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Insert data into the user table
$sql = "INSERT INTO user (author, email, password) VALUES ('$author', '$email', '$hashedPassword')";

if ($conn->query($sql) === TRUE) {
    // Redirect to the sign in page
    header("Location: sign in.html");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>