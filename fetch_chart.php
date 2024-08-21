<?php
 include 'db_connection.php';

// Query to fetch total price and total bookings count
$sqlTotalPrice = "SELECT SUM(price) as total_price, COUNT(id) as total_bookings FROM bookings";
$resultTotalPrice = $conn->query($sqlTotalPrice);

$total_price = 0;
$total_bookings = 0;

if ($resultTotalPrice->num_rows > 0) {
    $row = $resultTotalPrice->fetch_assoc();
    $total_price = $row['total_price'];
    $total_bookings = $row['total_bookings'];
}

$sql = "SELECT date, price FROM bookings";
$result = $conn->query($sql);

$bookingsByMonth = [];
$bookingsByYear = [];
$bookingsByWeek = [];
$bookingsByDay = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $date = $row["date"];
        $price = $row["price"];
        $month = date("F", strtotime($date));
        $year = date("Y", strtotime($date));
        $week = date("W", strtotime($date));
        $weekOfMonth = ceil(date("j", strtotime($date)) / 7);
        $day = date("l", strtotime($date));

        if (!isset($bookingsByMonth[$month])) {
            $bookingsByMonth[$month] = 0;
        }
        if (!isset($bookingsByYear[$year])) {
            $bookingsByYear[$year] = 0;
        }
        if (!isset($bookingsByWeek[$month][$weekOfMonth])) {
            $bookingsByWeek[$month][$weekOfMonth] = 0;
        }
        if (!isset($bookingsByDay[$day])) {
            $bookingsByDay[$day] = 0;
        }

        $bookingsByMonth[$month]++;
        $bookingsByYear[$year]++;
        $bookingsByWeek[$month][$weekOfMonth]++;
        $bookingsByDay[$day]++;
    }
}

$conn->close();

echo json_encode([
    "monthly" => $bookingsByMonth,
    "yearly" => $bookingsByYear,
    "weekly" => $bookingsByWeek,
    "daily" => $bookingsByDay,
    "total_price" => $total_price,
    "total_bookings" => $total_bookings
]);
?>
