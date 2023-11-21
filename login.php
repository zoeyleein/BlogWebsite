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

// Get the author name and password submitted by the user
$author = $_POST['username']; // Assuming your form field is 'username', not 'authorname'
$password = $_POST['password'];

// Prevent SQL injection attacks
$author = mysqli_real_escape_string($conn, $author);
$password = mysqli_real_escape_string($conn, $password);

// Check if the user exists and the password is correct
$sql = "SELECT id, author FROM user WHERE author='$author' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User authentication successful, perform login operations
    session_start();
    $row = $result->fetch_assoc();
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['author'] = $row['author'];

    // Redirect to the index page
    header("Location: index.php");
    exit(); // Make sure to exit after sending the header
} else {
    // User authentication failed, display error message or perform other actions
    echo "Login failed. Please check the author name and password.";
}

// Close the database connection
$conn->close();
?>