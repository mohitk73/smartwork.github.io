<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $branch = $_POST['branch'];
    $semester = $_POST['semester'];
    $assignment = $_POST['assignment'];
    $file = $_POST['file'];
    $date = $_POST['date'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $databasename = "smartwork";

    // Create a database connection
    $conn = new mysqli($servername, $username, $password, $databasename);

    // Check for connection errors
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the database
    $sql = "INSERT INTO applyform (name, email, number, branch, semester, assignment, file, date)
            VALUES ('$name', '$email', '$number', '$branch', '$semester', '$assignment', '$file', '$date')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>