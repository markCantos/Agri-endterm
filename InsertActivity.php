<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'regis';

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Connection failed: ' . $conn->connect_error]));
}

// Process the request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents('php://input'), true);
    $activityTitle = $data['title'];
    $activityDate = $data['date'];

    // Prepare and execute the SQL query
    $sql = "INSERT INTO activity (title, date) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $activityTitle, $activityDate);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Event added successfully!']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error adding event: ' . $conn->error]);
    }

    $stmt->close();
}

$conn->close();
?>
