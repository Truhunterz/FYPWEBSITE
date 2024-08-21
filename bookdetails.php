<?php
session_start();
include 'db_connection.php';

include 'login_check.php';


// Fetch sorting options
$courtSort = isset($_GET['courtSort']) ? $_GET['courtSort'] : '';
$dateSort = isset($_GET['dateSort']) ? $_GET['dateSort'] : '';
$createdSort = isset($_GET['createdSort']) ? $_GET['createdSort'] : '';
$monthSort = isset($_GET['monthSort']) ? $_GET['monthSort'] : '';

// Build the SQL query
$sql = "SELECT id, name, email, phone, court, date, time_slots, venue_slots, price, receipt_file, created_at 
        FROM bookings";

// Apply court sorting if selected
if ($courtSort) {
    $sql .= " WHERE court = '$courtSort'";
}

// Apply date sorting if selected
if ($dateSort) {
    $order = $dateSort == 'date_asc' ? 'ASC' : 'DESC';
    $sql .= " ORDER BY date $order, created_at $order";
} elseif ($createdSort) {
    // Apply created_at sorting if selected
    $order = $createdSort == 'created_asc' ? 'ASC' : 'DESC';
    $sql .= " ORDER BY created_at $order";
} elseif ($monthSort) {
    // Apply month sorting if selected
    $sql .= " WHERE MONTH(date) = $monthSort";
} else {
    // Default sorting by court order
    $sql .= " ORDER BY 
        CASE court 
            WHEN 'Futsal Fifa (Interlock)' THEN 1
            WHEN 'Futsal Interlock' THEN 2
            WHEN 'Futsal Turf' THEN 3
            WHEN 'Badminton' THEN 4
            ELSE 5
        END";
}

$result = $conn->query($sql);
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
            <span>User Booking</span>
            <h2>Booking Overview</h2> 
        </div>              
        <div class="user--info">
            <div class="search--box">
                <i class="fas fa-search"></i>
                <input type="text" id="searchInput" placeholder="Search" onkeyup="searchTable()">
            </div>
            <i class='fas fa-user-circle' style='font-size:48px;color:white'></i>
        </div>
    </div>
    <div class="booking--details">
        <h2 class="main--title">Booking Details</h2>
        <div class="sort--options">
            <form id="sortForm" method="GET" action="" onsubmit="event.preventDefault();">
                <select id="courtSort" name="courtSort" onchange="this.form.submit()">
                    <option value="">Sort by Court</option>
                    <option value="Futsal Fifa (Interlock)" <?php if ($courtSort == 'Futsal Fifa (Interlock)') echo 'selected'; ?>>Futsal Fifa (Interlock)</option>
                    <option value="Futsal Interlock" <?php if ($courtSort == 'Futsal Interlock') echo 'selected'; ?>>Futsal Interlock</option>
                    <option value="Futsal Turf" <?php if ($courtSort == 'Futsal Turf') echo 'selected'; ?>>Futsal Turf</option>
                    <option value="Badminton" <?php if ($courtSort == 'Badminton') echo 'selected'; ?>>Badminton</option>
                </select>
                <select id="dateSort" name="dateSort" onchange="this.form.submit()">
                    <option value="">Sort by Date</option>
                    <option value="date_asc" <?php if ($dateSort == 'date_asc') echo 'selected'; ?>>Earliest</option>
                    <option value="date_desc" <?php if ($dateSort == 'date_desc') echo 'selected'; ?>>Latest</option>
                </select>
                <select id="createdSort" name="createdSort" onchange="this.form.submit()">
                    <option value="">Sort by Booking Time</option>
                    <option value="created_asc" <?php if ($createdSort == 'created_asc') echo 'selected'; ?>>Earliest</option>
                    <option value="created_desc" <?php if ($createdSort == 'created_desc') echo 'selected'; ?>>Latest</option>
                </select>
                <select id="monthSort" name="monthSort" onchange="this.form.submit()">
                    <option value="">Sort by Month</option>
                    <option value="1" <?php if ($monthSort == '1') echo 'selected'; ?>>January</option>
                    <option value="2" <?php if ($monthSort == '2') echo 'selected'; ?>>February</option>
                    <option value="3" <?php if ($monthSort == '3') echo 'selected'; ?>>March</option>
                    <option value="4" <?php if ($monthSort == '4') echo 'selected'; ?>>April</option>
                    <option value="5" <?php if ($monthSort == '5') echo 'selected'; ?>>May</option>
                    <option value="6" <?php if ($monthSort == '6') echo 'selected'; ?>>June</option>
                    <option value="7" <?php if ($monthSort == '7') echo 'selected'; ?>>July</option>
                    <option value="8" <?php if ($monthSort == '8') echo 'selected'; ?>>August</option>
                    <option value="9" <?php if ($monthSort == '9') echo 'selected'; ?>>September</option>
                    <option value="10" <?php if ($monthSort == '10') echo 'selected'; ?>>October</option>
                    <option value="11" <?php if ($monthSort == '11') echo 'selected'; ?>>November</option>
                    <option value="12" <?php if ($monthSort == '12') echo 'selected'; ?>>December</option>
                </select>
                <input type="text" id="phoneInput" placeholder="Search by Phone" onkeyup="searchTableByPhone()">
                <button onclick="clearFilters()">Clear Filters</button>
            </form>
        </div>
    
        <div class="table--container">
            <table id="bookingTable">
                <thead>
                    <tr>
                        
                        <th>name</th>
                        <th>email</th>
                        <th>phone</th>
                        <th>court</th>
                        <th>date</th>
                        <th>time slots</th>
                        <th>venue slots</th>
                        <th>price</th>
                        <th>current book time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                         
                            echo "<td>" . $row["name"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "<td>" . $row["phone"] . "</td>";
                            echo "<td>" . $row["court"] . "</td>";
                            echo "<td>" . $row["date"] . "</td>";
                            echo "<td>" . $row["time_slots"] . "</td>";
                            echo "<td>" . $row["venue_slots"] . "</td>";
                            echo "<td>" . $row["price"] . "</td>";
                            echo "<td>" . $row["created_at"] . "</td>";
                            echo "<td>
                                    <button class='action-button' onclick='deleteBooking(" . $row["id"] . ")'>Delete</button>
                                    <a href='download.php?id=" . $row["id"] . "'><button class='action-button'>Download</button></a>
                                </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='10'>No bookings found</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
        <div class="manage--buttons">
            <button onclick="addBooking()">Add Booking</button>
            <button onclick="clearAllData()">Clear All Data</button>
        </div>
    </div>
</div>

<script>
    function searchTable() {
        var input, filter, table, tr, td, i, j, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toLowerCase();
        table = document.getElementById("bookingTable");
        tr = table.getElementsByTagName("tr");

        for (i = 1; i < tr.length; i++) {
            tr[i].style.display = "none";
            td = tr[i].getElementsByTagName("td");
            for (j = 0; j < td.length; j++) {
                if (td[j]) {
                    txtValue = td[j].textContent || td[j].innerText;
                    if (txtValue.toLowerCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                        break;
                    }
                }
            }
        }
    }

    function searchTableByPhone() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("phoneInput");
    filter = input.value.toLowerCase();
    table = document.getElementById("bookingTable");
    tr = table.getElementsByTagName("tr");

    for (i = 1; i < tr.length; i++) {
        tr[i].style.display = "none";
        td = tr[i].getElementsByTagName("td")[3]; // Index 3 corresponds to the phone column
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toLowerCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            }
        }
    }
}


    function deleteBooking(id) {
        if (confirm('Are you sure you want to delete this booking?')) {
            window.location.href = 'delete.php?id=' + id;
        }
    }

    function addBooking() {
        window.location.href = 'BookAdmin.php';
    }

    function clearFilters() {
        document.getElementById("courtSort").selectedIndex = 0;
        document.getElementById("dateSort").selectedIndex = 0;
        document.getElementById("createdSort").selectedIndex = 0;
        document.getElementById("monthSort").selectedIndex = 0;
        document.getElementById("phoneInput").value = "";
        document.getElementById("searchInput").value = "";

        // Submit the form to reload with cleared filters
        document.forms["sortForm"].submit();
    }
    function clearAllData() {
        if (confirm('Are you sure you want to clear all data? This action cannot be undone.')) {
            window.location.href = 'clear_alldata.php';
        }
    }
</script>
</body>
</html>
