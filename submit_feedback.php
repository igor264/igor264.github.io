<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shaev_bd";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);
    $feedback = htmlspecialchars($_POST['feedback']);

    $stmt = $conn->prepare("INSERT INTO shaev (name, phone, feedback) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $phone, $feedback);
    
    if ($stmt->execute()) {
        header("Location: ../view.php");
        exit();
    } else {
        echo "<p>Ошибка: " . $stmt->error . "</p>";
    }

    $stmt->close();
}

$conn->close();
?>
