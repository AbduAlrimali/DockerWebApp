<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_destroy();
    header("Location: /login/login page.php", true, 301); // Redirect to the login page or any other page after logout
    exit();
}
