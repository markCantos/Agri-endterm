<?php

require 'condb.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$email = $_POST['email'];
$username   = $_POST['username'];
$password   = $_POST['password'];

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO users (email, username, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $email, $username, $hashed_password);

if ($stmt->execute()) {
    echo "<script>
            alert('Account created successfully!');
            window.location.href = 'login.php';
          </script>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
}

?>