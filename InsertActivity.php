<?php
$servername   = 'localhost';
$username     = 'root';
$password     = '';
$database     = 'regis';  // Make sure your database name is correct

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert activity into the database if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $activityTitle = $_POST['activityTitle'];
    $activityDate = $_POST['activityDate'];

    // Prepare and execute the SQL query
    $sql = "INSERT INTO activity (title,date) VALUES ('$activityTitle', '$activityDate')";

    if ($conn->query($sql) === TRUE) {
        // Redirect back to the main page after insertion
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
