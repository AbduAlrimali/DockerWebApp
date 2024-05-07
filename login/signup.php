<?php
// signup.php
include("../database.php");
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username and password from form
    $newUsername = $_POST["new_username"];
    $newPassword = $_POST["new_password"];

    $hash = password_hash($newPassword, PASSWORD_DEFAULT);
    $query = "INSERT INTO login(username, password) VALUES ('$newUsername', '$hash');";
    mysqli_query($connect, $query);

    header("Location: /login/login page.php", true, 301);
    echo "Account created Successfully.";
    // For demonstration purposes, let's just print the new user details
}
mysqli_close($connect);
