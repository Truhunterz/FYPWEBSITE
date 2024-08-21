<?php
// Database configuration
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    // Delete event from the database
    $sql = "DELETE FROM events WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Event deleted successfully.";
    } else {
        echo "Error deleting event: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
    
    // Redirect back to events page
    header("Location: Events.php");
    exit();
}
?>
