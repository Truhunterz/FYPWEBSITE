<?php
 include 'db_connection.php';
// Fetch images from database
$result = $conn->query("SELECT file_name, image FROM images ORDER BY uploaded_on DESC");

$slides = '';
$dots = '';
$slideIndex = 1;

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $slides .= '<div class="slides fade">';
        $slides .= '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="' . $row['file_name'] . '" style="width:100%">';
        $slides .= '</div>';
        $dots .= '<span class="dot" onclick="currentSlide(' . $slideIndex . ')"></span>';
        $slideIndex++;
    }
} else {
    echo json_encode(['error' => 'No images found in the database.']);
    exit;
}

$conn->close();

// Return slides and dots HTML
echo json_encode(['slides' => $slides, 'dots' => $dots]);
?>
