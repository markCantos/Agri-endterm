<?php
$servername   = 'localhost';
$username     = 'root';
$password     = '';
$database     = 'regis';

$conn = new mysqli($servername, $username, $password, $database);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $id = $data['id'];
    $title = $data['title'];
    $date = $data['date'];

    $sql = "UPDATE activity SET title = ?, date = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssi', $title, $date, $id);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Event updated successfully!']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error updating event: ' . $conn->error]);
    }
}

$conn->close();
?>
