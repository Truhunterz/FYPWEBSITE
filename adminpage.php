<?php
session_start();
include 'db_connection.php';
include 'login_check.php';


// Query to fetch total price
$sql = "SELECT SUM(price) as total_price, COUNT(id) as total_bookings FROM bookings";
$result = $conn->query($sql);

$total_price = 0;
$total_bookings = 0;

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_price = $row['total_price'];
    $total_bookings = $row['total_bookings'];
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
                    <span>Event</span>
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
                <span>Home</span>
                <h2>Dashboard</h2> 
            </div>
            <div class="user--info">
            <i class='fas fa-user-circle' style='font-size:48px;color:white'></i>
             
               
            </div>
        </div>
        <div class="card--container">
            <h3 class="main--title">Today's data</h3>
            <div class="card--wrapper">
                <div class="payment--card">
                    <div class="card--header">
                        <span class="title">Total</span>
                        <span class="amount--value">RM</span>
                        <div class="amount">
                            <?php echo number_format($total_price, 2); ?>
                        </div>
                    </div>
                    <i class="fas fa-dollar-sign icon"></i>
                </div>
                <div class="book--card">
                    <div class="card--header">
                        <span class="title">Total Book Data</span>
                        <span class="book--value"><?php echo $total_bookings; ?></span>
                    </div>
                    <i class="fas fa-book icon"></i>
                </div>
            </div>
        </div>

        <div class="chart--container">
            <h3 class="main--title">Booking Overview</h3>
            <div class="chart">
                <select id="viewSelector">
                    <option value="monthly">Monthly</option>
                    <option value="yearly">Yearly</option>
                    <option value="weekly">Weekly</option>
                    <option value="daily">Daily</option>
                </select>
                <canvas id="bookingChart"></canvas>
            </div>
        </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="adminpage.js"></script>
</body>
</html>
