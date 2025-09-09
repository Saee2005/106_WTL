<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'] ?? '';

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db   = "php";

    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error) {
        die("DB Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("DELETE FROM student WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Deleted successfully";
    } else {
        echo "Error deleting: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
