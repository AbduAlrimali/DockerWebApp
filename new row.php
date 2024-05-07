<?php

include("database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username and password from form
    $student_id = $_POST["student_id"];
    $name = $_POST["name"];
    $gpa = $_POST["gpa"];
    $age = $_POST["age"];

    $query = "INSERT INTO student (Student_ID, First_Name, CGPA, Age) VALUES ('$student_id', '$name', '$gpa', '$age');";
    mysqli_query($connect, $query);
    header("Location: /index.php", true, 301);
}
mysqli_close($connect);
