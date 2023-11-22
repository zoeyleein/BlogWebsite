<!-- 
    Student: JingYi Li, Wei Deng
    File Name: signin.html
    Date of creating: Nov 17 2023
    Description: This is for processing the data insert of sign up.
-->
<?php
// Connect to the database
$servername = "localhost";
$username = "appuser";
$password = "password";
$dbname = "blog";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $authorname = $_POST["authorname"];
    $email = $_POST["email"];
    $password = $_POST["pass"];  // Note: You should perform proper password hashing

    // Insert data into the user table
    $sql = "INSERT INTO `user` (`author`, `email`, `password`) VALUES ('$authorname', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>