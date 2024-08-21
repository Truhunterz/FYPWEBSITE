<?php
// Database configuration
include 'db_connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the receipt file from the database
    $sql = "SELECT receipt_file FROM bookings WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($receipt_file);
    $stmt->fetch();
    $stmt->close();

    // Define the base directory where files are stored
    $baseDir =  "Receipt/"; // Ensure to escape backslashes

    // Construct the full path to the file
    $fullPath = $baseDir . $receipt_file;

    // Debug output
    echo "Full file path: " . htmlspecialchars($fullPath) . "<br>";

    // Check if the file path is not empty and if the file exists
    if (!empty($receipt_file) && file_exists($fullPath)) {
        // Debug output
        echo "File exists.<br>";

        // Send the file to the browser for download
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($receipt_file) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($fullPath));
        readfile($fullPath);
        exit;
    } else {
        // Debug output
        echo "File not found.<br>";
    }
} else {
    echo "No ID specified.";
}

$conn->close();
?>
