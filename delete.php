<?php
// Database configuration
include 'db_connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the booking from the database
    $sql = "DELETE FROM bookings WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo "Booking deleted successfully.";
    } else {
        echo "Error deleting booking: " . $conn->error;
    }
    $stmt->close();
} else {
    echo "No ID specified.";
}

$conn->close();

// Redirect back to the admin page
header("Location: bookdetails.php");
exit;
?>
