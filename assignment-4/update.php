<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'] ?? '';
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

    $stmt = $conn->prepare("UPDATE student SET name = ?, pass = ? WHERE id = ?");
    $stmt->bind_param("ssi", $name, $password, $id);

    if ($stmt->execute()) {
        echo "Updated successfully";
    } else {
        echo "Error updating: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
