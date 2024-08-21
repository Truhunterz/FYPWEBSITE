<?php
header('Content-Type: application/json');

include 'db_connection.php';

$data = json_decode(file_get_contents('php://input'), true);
$court = $data['court'];
$date = $data['date'];

$response = [
    'timeSlots' => [],
    'venueSlots' => []
];

if(!isset($data['venueValue'])){
    // Fetch booked venue slots
    $sql = "SELECT venue_slots FROM bookings WHERE court = ? AND date = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $court, $date);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $bookedVenueSlots = explode(", ", $row['venue_slots']);
        $response['venueSlots'] = array_merge($response['venueSlots'], $bookedVenueSlots);
    }

}else{
    // Fetch booked time slots
    $venueValue = $data['venueValue'];
    $sql = "SELECT time_slots FROM bookings WHERE court = ? AND date = ? AND venue_slots = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $court, $date, $venueValue);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $bookedTimeSlots = explode(", ", $row['time_slots']);
        $response['timeSlots'] = array_merge($response['timeSlots'], $bookedTimeSlots);
    }
}

$stmt->close();
$conn->close();

$response['timeSlots'] = array_unique($response['timeSlots']);
$response['venueSlots'] = array_unique($response['venueSlots']);

echo json_encode($response);
?>
