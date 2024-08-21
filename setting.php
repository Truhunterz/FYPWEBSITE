<?php
session_start();
include 'db_connection.php';
include 'login_check.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="adminstyle.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap">
    <style>
        /* Add your additional styles here */
        .card--container {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .card--container h3 {
            margin-bottom: 10px;
        }
        .card--container p {
            margin-bottom: 15px;
            color: #666;
        }
        .upload-form {
            margin-bottom: 15px;
        }
        .upload-form input[type=file] {
            margin-right: 10px;
        }
        .upload-form button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            cursor: pointer;
        }
        .upload-form button:hover {
            background-color: #45a049;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .table th {
            background-color: #f2f2f2;
        }
        .view-button, .delete-button {
            background-color: #008CBA;
            color: white;
            border: none;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin-right: 5px;
            cursor: pointer;
        }
        .view-button:hover, .delete-button:hover {
            background-color: #0073aa;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo"></div>
        <ul class="menu">
            <li class="active">
                <a href="adminpage.php">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="bookdetails.php">
                    <i class="fas fa-clipboard-list"></i>
                    <span>Book details</span>
                </a>
            </li>
            <li>
                <a href="Events.php">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Events</span>
                </a>
            </li>
            <li>
                <a href="setting.php">
                    <i class="fas fa-cog"></i>
                    <span>Settings</span>
                </a>
            </li>
            <li class="logout">
                <a href="logout.php">
                    <i class="fas fa-door-open"></i> 
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="main--content">
        <div class="header--wrapper">
            <div class="header--title">
                <span>Settings & Options</span>
                <h2>advertisement</h2> 
            </div>
            <div class="user--info">
                
                <i class='fas fa-user-circle' style='font-size:48px;color:white'></i>
            </div>
        </div>

        <div class="card--container">
            <div class="main--title">
                Settings
            </div>
            <div class="card--wrapper">
                <!-- Upload forms -->
                <div class="card--container">
                    <h3>Upload Image</h3>
                    <p>Description: Image slideshow</p>
                    <form class="upload-form" action="upload_img.php" method="post" enctype="multipart/form-data">
                        <input type="file" name="image" accept="image/*" required>
                        <button type="submit">Upload</button>
                    </form>
                    <div id="uploadStatusSlideshow"></div>
                </div>
                <div class="card--container">
                    <h3>Upload Image</h3>
                    <p>Description: Gallery image</p>
                    <form class="upload-form" action="upload_gallery_image.php" method="post" enctype="multipart/form-data">
                        <input type="file" name="image" accept="image/*" required>
                        <button type="submit">Upload</button>
                    </form>
                    <div id="uploadStatusGallery"></div>
                </div>
            </div>
        </div>

        <!-- Image gallery table -->
        <div class="card--container">
            <div class="main--title">
                 Gallery Images
            </div>
            <div class="card--wrapper">
                <?php
                include 'db_connection.php';

                // Function to safely escape input values
                function escape($value) {
                    global $conn;
                    return mysqli_real_escape_string($conn, $value);
                }

                // Check if delete button is pressed
                if (isset($_POST['delete_image'])) {
                    $id = escape($_POST['id']);
                    $query = "DELETE FROM images2 WHERE id = $id";
                    if (mysqli_query($conn, $query)) {
                       
                    } else {
                        echo '<div class="error">Error deleting image.</div>';
                    }
                }

                $result = $conn->query("SELECT id, file_name, image, uploaded_on FROM images2 ORDER BY uploaded_on DESC");

                $gallery = '';
        
                if ($result->num_rows > 0) {
                    $gallery .= '<table class="table">';
                    $gallery .= '<thead><tr><th>File Name</th><th>Image</th><th>Uploaded On</th><th>Actions</th></tr></thead>';
                    $gallery .= '<tbody>';
                    while ($row = $result->fetch_assoc()) {
                        $gallery .= '<tr>';
                        $gallery .= '<td>' . htmlspecialchars($row['file_name'], ENT_QUOTES) . '</td>';
                        $gallery .= '<td><img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="' . htmlspecialchars($row['file_name'], ENT_QUOTES) . '" style="width:100px;height:auto;"></td>';
                        $gallery .= '<td>' . htmlspecialchars($row['uploaded_on'], ENT_QUOTES) . '</td>';
                        $gallery .= '<td>';
                        $gallery .= '<form method="post" action="">';
                        $gallery .= '<input type="hidden" name="id" value="' . $row['id'] . '">';
                        $gallery .= '<button type="submit" name="delete_image" class="delete-button">Delete</button>';
                        $gallery .= '</form>';
                        $gallery .= '</td>';
                        $gallery .= '</tr>';
                    }
                    $gallery .= '</tbody></table>';
                } else {
                    $gallery = '<p>No images found in the database.</p>';
                }
        
                $conn->close();
        
                // Return gallery HTML
                echo $gallery;
                ?>
            </div>
        </div>
        <div class="card--container">
        <div class="main--title">
            Slideshow Images
        </div>
        <div class="card--wrapper">
            <?php
            include 'db_connection.php';

            // Function to safely escape input values
          

            // Check if delete button is pressed
            if (isset($_POST['delete_image'])) {
                $id = escape($_POST['id']);
                $query = "DELETE FROM images WHERE id = $id";
                if (mysqli_query($conn, $query)) {
                    
                } else {
                    echo '<div class="error">Error deleting image.</div>';
                }
            }

            // Fetch slideshow images from the database
            $result = $conn->query("SELECT id, file_name, image, uploaded_on FROM images ORDER BY uploaded_on DESC");

            if ($result->num_rows > 0) {
                echo '<table class="table">';
                echo '<thead><tr><th>File Name</th><th>Image</th><th>Uploaded On</th><th>Action</th></tr></thead>';
                echo '<tbody>';
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                  
                    echo '<td>' . htmlspecialchars($row['file_name'], ENT_QUOTES) . '</td>';
                    echo '<td><img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="' . htmlspecialchars($row['file_name'], ENT_QUOTES) . '" style="width:100px;height:auto;"></td>';
                    echo '<td>' . htmlspecialchars($row['uploaded_on'], ENT_QUOTES) . '</td>';
                    echo '<td>';
                    echo '<form method="post" action="">';
                    echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                    echo '<button type="submit" name="delete_image" class="delete-button">Delete</button>';
                    echo '</form>';
                    echo '</td>';
                    echo '</tr>';
                }
                echo '</tbody></table>';
            } else {
                echo '<p>No slideshow images found in the database.</p>';
            }

            $conn->close();
            ?>
        </div>
    </div>


    </div>

    <script>
        // JavaScript for handling form submission and displaying upload status
        document.getElementById('uploadForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission
            var formData = new FormData(this);
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'upload_img.php', true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    document.getElementById('uploadStatusSlideshow').innerHTML = xhr.responseText;
                } else {
                    document.getElementById('uploadStatusSlideshow').innerHTML = 'An error occurred. Please try again.';
                }
            };
            xhr.send(formData);
        });

        document.getElementById('uploadGalleryForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission
            var formData = new FormData(this);
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'upload_gallery_image.php', true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    document.getElementById('uploadStatusGallery').innerHTML = xhr.responseText;
                } else {
                    document.getElementById('uploadStatusGallery').innerHTML = 'An error occurred. Please try again.';
                }
            };
            xhr.send(formData);
        });
    </script>
</body>
</html>
