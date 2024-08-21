<?php
session_start();
include 'login_check.php';
include 'db_connection.php';

// Fetch events from the database
$sql = "SELECT id, title, date, time, description, image, image_type FROM events";
$result = $conn->query($sql);

$events = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $events[] = $row;
    }
}

$conn->close();
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
        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 18px;
            text-align: left;
        }
        table th, table td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }
        table th {
            background-color: #f2f2f2;
        }
        table tr:hover {
            background-color: #f1f1f1;
        }
        .action-buttons {
           
            gap: 10px;
        }
        .action-buttons button {
            padding: 5px 10px;
            border: none;
            cursor: pointer;
        }
        .delete-button {
            background-color: #e74c3c;
            color: white;
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
                <a href="events.php">
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
                <span>Booking Events</span>
                <h2>Events & Tournament</h2> 
            </div>
            <div class="user--info">
               
                <i class='fas fa-user-circle' style='font-size:48px;color:white'></i>
            </div>
        </div>
        
        <div class="card--container">
            <div class="main--title">Events</div>
            <div class="card--wrapper">
                <!-- First calendar event card -->
                <div class="card--container2">
                    <h3>Event Booking</h3>
                    <p>For events, it is necessary to book a slot time and slot venue to create an event or tournament. To book a slot, click the book button</p>
                    <h3>Event Form</h3>
                    <button class="button" onclick="location.href='BookEvent.php'">Book Event Slot</button>
                    <form action="insert_events.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Event Title:</label>
                            <input type="text" id="title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="date">Date:</label>
                            <input type="date" id="date" name="date" required>
                        </div>
                        <div class="form-group">
                            <label for="time">Time:</label>
                            <input type="text" id="time" name="time" required>
                        </div>
                        <div class="form-group">
                            <label for="image">Upload Image:</label>
                            <input type="file" id="image" name="image" accept="image/*" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea id="description" name="description" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="submit-button">Submit</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Second event card -->
        <div class="card--container">
            <div class="main--title">Events Booking</div>
            <div class="card--wrapper">
                <!-- Event table -->
                <table>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($events as $event): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($event['title']); ?></td>
                                <td><?php echo htmlspecialchars($event['date']); ?></td>
                                <td><?php echo htmlspecialchars($event['time']); ?></td>
                                <td><?php echo htmlspecialchars($event['description']); ?></td>
                                <td><img src="data:<?php echo htmlspecialchars($event['image_type']); ?>;base64,<?php echo base64_encode($event['image']); ?>" alt="Event Image" style="width:100px;height:100px;"/></td>
                                <td class="action-buttons">
                                    <form action="delete_event.php" method="post" style="display:inline;">
                                        <input type="hidden" name="id" value="<?php echo $event['id']; ?>">
                                        <button type="submit" class="delete-button">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
