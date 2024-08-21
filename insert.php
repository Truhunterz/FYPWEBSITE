<?php
// Handle file upload
$targetDir = "Receipt/";
$fileName = !empty($_FILES["receiptFile"]["name"]) ? basename($_FILES["receiptFile"]["name"]) : "";
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

// Initialize response array
$response = array();

// Check if file is selected
if (!empty($fileName)) {
    // Allow certain file formats
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
    if (in_array($fileType, $allowTypes)) {
        // Upload file to server
        if (move_uploaded_file($_FILES["receiptFile"]["tmp_name"], $targetFilePath)) {
            $response['fileUploadSuccess'] = true;
        } else {
            $response['fileUploadSuccess'] = false;
            $response['error'] = 'File upload failed.';
        }
    } else {
        $response['fileUploadSuccess'] = false;
        $response['error'] = 'Unsupported file type.';
    }
} else {
    $response['fileUploadSuccess'] = false;
    $response['error'] = 'No file selected.';
}

// If file upload was successful or no file was selected, proceed with data insertion
if ($response['fileUploadSuccess'] || empty($fileName)) {
    // Process booking form data
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $court = isset($_POST['court']) ? $_POST['court'] : '';
    $date = isset($_POST['date']) ? $_POST['date'] : '';
    $price = isset($_POST['price']) ? $_POST['price'] : ''; 
    $timeSlots = isset($_POST['timeSlots']) ? $_POST['timeSlots'] : '';
    $venueSlots = isset($_POST['venueSlots']) ? $_POST['venueSlots'] : '';

    // Replace with your database connection code
    include 'db_connection.php';

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO bookings (name, email, phone, court, date, time_slots, venue_slots, price, receipt_file) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $name, $email, $phone, $court, $date, $timeSlots, $venueSlots, $price, $fileName);

    // Execute SQL statement
    if ($stmt->execute()) {
        $response['success'] = true;
    } else {
        $response['success'] = false;
        $response['error'] = 'Error inserting data: ' . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

// Return JSON response to JavaScript fetch
header('Content-Type: application/json');
echo json_encode($response);
?>