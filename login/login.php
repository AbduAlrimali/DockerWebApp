<?php
// login.php
include("../database.php");
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username and password from form
    $username = $_POST["username"];
    $password = $_POST["password"];
    $realPass = mysqli_query($connect, "SELECT password FROM login WHERE username='$username';");

    $row = mysqli_fetch_assoc($realPass);
    $realPass = $row['password'];
    // Check if username and password match a valid user (in a real application, this would query a database)
    if (password_verify($password, $realPass)) {
        // Start session and set logged-in user
        session_start();
        $_SESSION["username"] = $username;
        $_SESSION["password"] = $password;
        // Redirect to dashboard or some other page
        header("Location: /index.php", true, 301);
        exit();
    } else {
        // Redirect back to login page with error message
        header("Location: /login/login page.php?error=invalid_login", true, 301);
        echo ("wrong password or username");
        exit();
    }
}
mysqli_close($connect);
