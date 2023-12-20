<!-- 
    Student: JingYi Li, Wei Deng
    File Name: login_process.php
    Date of creating: Nov 17 2023
    Description: This is for checking if user input the right name and password.
    Written by: JingYi Li
-->
<?php
session_start();


$user = array("Jaya Lee" => "jayaleee", "Wei Deng" => "weidengg"); //use database

if (isset($_POST['authorname']) && isset($_POST['password'])) {
    // If the user has just tried to log in
    $authorname = $_POST['authorname'];
    $password = $_POST['password'];

    // Validate the existence of the user and password in the associative array
    if (isset($user[$authorname]) && $user[$authorname] === $password) {
        header("Location: index.php");
        // Ensure that no further code is executed after the header redirect
        exit(); 
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/A02-organized/blogstyle.css" />
  <title>Invalid user</title>
</head>
<body calss="login">
    <div class="textfield">
            <h1>Invalid user</h1>
            <?php
            
            if (isset($authorname)) {
                // if they've tried and failed to log in
                echo '<p style="color: red;">Could not log you in.</p><br>';
            } else {
                // they have not tried to log in yet or have logged out
                echo '<p style="color: red;">You are not logged in.</p><br>';
            }
            
            ?>

            <p class="actions"><a href="signin.html">Login again</a></p>
            <p class="actions"><a href="signup.html">Sign up</a></p>
    </div>
</body>

</html>