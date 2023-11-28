<!-- 
    Student: JingYi Li, Wei Deng
    File Name: loging_process.php
    Date of creating: Nov 17 2023
    Description: This is for loging processing.
-->
<?php
// connect to the database
require_once('db_credentials.php');
$conn = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

// check if it's connected
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// initialize error
$error = "";

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $authorname = $_POST["authorname"];
    $password = $_POST["pass"];  // Note: Perform proper password hashing

    // Search data from user table
    $sql = "SELECT * FROM `user` WHERE `author` = '$authorname'";
    $result = $conn->query($sql);

    // check if it's match
    if ($result->num_rows > 0) {
        // Fetch the hashed password from the result
        $row = $result->fetch_assoc();
        $hashedPassword = $row["password"];

        // Verify the password
        if (password_verify($password, $hashedPassword)) {
            // Password is correct, redirect to index.php
            header("Location: index.php");
            exit();
        } else {
            $error = "Incorrect password. Please try again.";
        }
    } else {
        $error = "User not found. Please check your credentials.";
    }
}

// Close the database connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="blogstyle.css">
    <script src="/A02 Blogging website/signin.js"></script>
    <title>Blog Sign in</title>
</head>
<body class="login">
    <header>
        <h1>Sign in</h1>
    </header>

    <!-- Sign in form -->
    <div>
        <form action="index.php" method="post" onsubmit="return validate();">
            <div class="textfield">
                <label for="authorname">User Name</label>
                <input type="text" name="authorname" id="authorname" placeholder="User name">
            </div>  

            <div class="textfield">
                <label for="pass">Password</label>
                <input type="password" name="pass" id="pass" placeholder="Password">
            </div>

            <button class="button" type="submit">Login</button>
            <!-- Display error message if there's an error -->
            <?php if (!empty($error)): ?>
                <div class="error-message"><?php echo $error; ?></div>
            <?php endif; ?>

            <button class="button" onclick="window.location.href='signup.html'" type="button" class="button-link">Sign up</button>

        </form>
    </div>
    
</body>
</html>