<?php
$servername   = 'localhost';
$username     = 'root';
$password     = '';
$database     = 'regis';

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch events from the database
$sql = "SELECT id, title, date FROM activity";
$result = $conn->query($sql);

// Initialize an empty array to hold events
$events = array();

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        $events[] = array(
            'id' => $row['id'],          // Include the event ID
            'title' => $row['title'],
            'start' => $row['date'],     // Ensure date format matches FullCalendar
        );
    }
}

// Return the events as JSON
header('Content-Type: application/json');
echo json_encode($events);

$conn->close();
?>
