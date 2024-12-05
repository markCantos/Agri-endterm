<?php
$servername   = 'localhost';
$username     = 'root';
$password     = '';
$database     = 'regis';

$conn = new mysqli($servername, $username, $password, $database);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $id = $data['id'];

    $sql = "DELETE FROM activity WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        echo json_encode('Event deleted successfully!');
    } else {
        echo json_encode('Error deleting event: ' . $conn->error);
    }
}

$conn->close();
?>
