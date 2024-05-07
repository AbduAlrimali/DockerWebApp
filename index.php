<?php
session_start();
include("database.php");

if (empty($_SESSION["username"])) {
    session_destroy();
    header("Location: /login/login page.php", true, 301);
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            max-width: 800px;
            width: 80%;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 40px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px 15px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .input-group {
            margin-bottom: 20px;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
        }

        .input-group input {
            width: calc(25% - 10px);
            padding: 8px;
            border-radius: 3px;
            border: 1px solid #ccc;
            margin-right: 10px;
        }

        .btn-add-row {
            display: block;
            width: 200px;
            margin: 0 auto;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-add-row:hover {
            background-color: #0056b3;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin: 5px;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Student Data</h1>
        <form action="new row.php" method="post">

            <div class="input-group">
                <label for="student_id">Student ID:</label>
                <input type="text" id="student_id" name="student_id">
            </div>
            <div class="input-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name">
            </div>
            <div class="input-group">
                <label for="gpa">GPA:</label>
                <input type="text" id="gpa" name="gpa">
            </div>
            <div class="input-group">
                <label for="age">Age:</label>
                <input type="text" id="age" name="age">
            </div>
            <button class="btn-add-row" type="submit">Add New Row</button>
        </form>
        <form method="post" action="logout.php">
            <button type="submit" name="logout">Logout</button>
        </form>
        <table>

            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>GPA</th>
                    <th>Age</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $table_name = "student";
                $query = "SELECT * FROM $table_name";
                $responses = mysqli_query($connect, $query);

                foreach ($responses as $response) {
                    echo "<tr>";
                    foreach ($response as $value) {
                        echo "<td>$value</td>";
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script>
        function addRow() {
            var table = document.querySelector('table');
            var newRow = table.insertRow();
            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            var cell3 = newRow.insertCell(2);
            var cell4 = newRow.insertCell(3);

            var studentId = document.getElementById('student_id').value;
            var name = document.getElementById('name').value;
            var gpa = document.getElementById('gpa').value;
            var age = document.getElementById('age').value;

            cell1.innerHTML = studentId;
            cell2.innerHTML = name;
            cell3.innerHTML = gpa;
            cell4.innerHTML = age;
        }
    </script>
</body>

</html>