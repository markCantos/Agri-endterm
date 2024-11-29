<?php
session_start();
require 'condb.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $stmt = $conn->prepare("SELECT username, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Bind results
        $stmt->bind_result($username, $hashed_password);
        $stmt->fetch();

        // Verify password
        if (password_verify($password, $hashed_password)) {
            // Login successful
            $_SESSION['username'] = $username; // Store username in session
            $_SESSION['email'] = $email;      // Store email in session
            header("Location: dashboard.php");
            exit;
        } else {
            // Invalid password
            echo "<script>alert('Invalid password.'); window.location.href='login.php';</script>";
            exit;
        }
    } else {
        // No account found with this email
        echo "<script>alert('No account found with this email.'); window.location.href='login.php';</script>";
        exit;
    }
}
    $stmt->close();

$conn->close();

?>
