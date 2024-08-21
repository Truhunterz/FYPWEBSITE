<?php
include 'db_connection.php';

// SQL to delete all records from the bookings table
$sql = "DELETE FROM bookings";

if ($conn->query($sql) === TRUE) {
    echo "All data deleted successfully";
} else {
    echo "Error deleting data: " . $conn->error;
}

$conn->close();
?>
