<?php
// Database configuration
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $conn->real_escape_string($_POST['title']);
    $date = $conn->real_escape_string($_POST['date']);
    $time = $conn->real_escape_string($_POST['time']);
    $description = $conn->real_escape_string($_POST['description']);

    // Handle image upload
    $image = $_FILES['image'];
    $imageName = $image['name'];
    $imageTmpName = $image['tmp_name'];
    $imageSize = $image['size'];
    $imageError = $image['error'];
    $imageType = $image['type'];

    $imageExt = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
    $allowed = array('jpg', 'jpeg', 'png', 'gif');

    if (in_array($imageExt, $allowed)) {
        if ($imageError === 0) {
            if ($imageSize < 5000000) { // Limit size to 5MB
                $imageData = file_get_contents($imageTmpName);

                // Insert event into the database
                $stmt = $conn->prepare("INSERT INTO events (title, date, time, image, image_type, description) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("ssssss", $title, $date, $time, $imageData, $imageType, $description);

                 if ($stmt->execute()) {
                        header("Location: Events.php?status=success");
                        exit();
                } else {
                    echo "Error: " . $stmt->error;
                }

                $stmt->close();
            } else {
                echo "Your image file is too big!";
            }
        } else {
            echo "There was an error uploading your file!";
        }
    } else {
        echo "You cannot upload files of this type!";
    }

    $conn->close();
}
?>
