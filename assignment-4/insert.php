<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $password = $_POST['pass'] ?? '';
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db   = "php";
    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error) {
        die("DB Connection failed: " . $conn->connect_error);
    }
    $stmt = $conn->prepare("INSERT INTO student (name, pass) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $password);

    if ($stmt->execute()) {
        echo "Data Inserted successfully";
    } else {
        echo "Error in inserting: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
