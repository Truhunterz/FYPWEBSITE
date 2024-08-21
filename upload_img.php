<?php
 include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
    $fileName = basename($_FILES['image']['name']);
    $imageType = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

    if (in_array($imageType, $allowedTypes)) {
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
        
        // Insert image content into database
        $insert = $conn->query("INSERT INTO images (file_name, image, uploaded_on) VALUES ('{$fileName}', '{$imgContent}', NOW())");

        if ($insert) {
            header("Location: setting.php");
            exit();
        } else {
            echo "File upload failed, please try again.";
        }
    } else {
        echo "Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.";
    }
} else {
    echo "No file uploaded.";
}

$conn->close();
?>
