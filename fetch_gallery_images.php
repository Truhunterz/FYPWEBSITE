<?php
 include 'db_connection.php';

// Fetch images from database
$result = $conn->query("SELECT file_name, image FROM images2 ORDER BY uploaded_on DESC");

$gallery = '';

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $imageData = base64_encode($row['image']);
        $gallery .= '<div class="col-lg-4 col-md-6 mb-4">';
        $gallery .= '<div class="card">';
        $gallery .= '<img src="data:image/jpeg;base64,' . $imageData . '" class="card-img-top" alt="' . $row['file_name'] . '">';
        $gallery .= '</div>';
        $gallery .= '</div>';
    }
} else {
    $gallery = '<p>No images found in the database.</p>';
}

$conn->close();

// Return gallery HTML
echo $gallery;
?>
