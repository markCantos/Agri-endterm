<?php
$servername   = 'localhost';
$username     = 'root';
$password     = '';
$database     = 'regis';
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get event details using the ID from the URL
if (isset($_GET['id'])) {
    $eventId = $_GET['id'];
    $sql = "SELECT * FROM activity WHERE id = $eventId";
    $result = $conn->query($sql);
    $event = $result->fetch_assoc();
}

// Handle event update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update'])) {
        $title = $_POST['title'];
        $date = $_POST['date'];
        $sql = "UPDATE activity SET title = '$title', date = '$date' WHERE id = $eventId";
        if ($conn->query($sql) === TRUE) {
            header("Location: dashboard.php"); // Redirect to the calendar
            exit();
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

    // Handle event deletion
    if (isset($_POST['delete'])) {
        $sql = "DELETE FROM activity WHERE id = $eventId";
        if ($conn->query($sql) === TRUE) {
            header("Location: dashboard.php"); // Redirect to the calendar
            exit();
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
</head>
<body>
    <h1>Edit or Delete Event</h1>
    <form method="POST">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($event['title']); ?>" required><br><br>

        <label for="date">Date:</label>
        <input type="date" id="date" name="date" value="<?php echo htmlspecialchars($event['date']); ?>" required><br><br>

        <button type="submit" name="update">Update</button>
        <button type="submit" name="delete" onclick="return confirm('Are you sure you want to delete this event?')">Delete</button>
    </form>
</body>
</html>
