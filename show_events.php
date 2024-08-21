<?php
// Database configuration
include 'db_connection.php';

// Fetch events from the database
$sql = "SELECT title, date,time, description, image, image_type FROM events";
$result = $conn->query($sql);

$events = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $events[] = $row;
    }
}

$conn->close();

return $events;
?>
