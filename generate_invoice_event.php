<?php
require('fpdf/fpdf.php');

// Fetch form data (ensure proper validation and sanitation in a real application)
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$court = $_POST['court'];
$date = $_POST['date'];
$timeSlots = $_POST['timeSlots'];
$venueSlots = $_POST['venueSlots'];
$price = $_POST['price'];

// Create new PDF instance
$pdf = new FPDF();
$pdf->AddPage();

// Set font for title
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Jesselball Sports Centre Event Booking Invoice', 0, 1, 'C');

// Logo (replace with your logo file path relative to this PHP script)
$logoPath = 'assets/logoj.jpg';
$pdf->Image($logoPath, 10, 10, 30); // Insert logo at position (10, 10) with width 30

// Line break
$pdf->Ln(20);

// Set font for section headings
$pdf->SetFont('Arial', 'B', 12);

// Add customer details section
$pdf->Cell(0, 10, 'Organizer Details', 0, 1);
$pdf->SetFont('Arial', '', 12);
$pdf->MultiCell(0, 10, 'Name: ' . $name, 0, 'L');
$pdf->MultiCell(0, 10, 'Email: ' . $email, 0, 'L');
$pdf->MultiCell(0, 10, 'Phone: ' . $phone, 0, 'L');

// Line break
$pdf->Ln(10);

// Add booking details section
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, 'Events Details', 0, 1);

// Set background color for headers
$pdf->SetFillColor(200, 220, 255); // Light blue background
$pdf->SetFont('Arial', 'B', 10);

// Define table headers with increased cell width and padding
$pdf->Cell(30, 10, 'Court Type', 1, 0, 'C', true);
$pdf->Cell(30, 10, 'Date', 1, 0, 'C', true);
$pdf->Cell(70, 10, 'Time Slots', 1, 0, 'C', true); // Adjusted width
$pdf->Cell(60, 10, 'Venue Slots', 1, 1, 'C', true); // Adjusted width

// Set font for table content
$pdf->SetFont('Arial', '', 9);

// Calculate the height needed for the time slots and venue slots cells
$timeSlotsLines = explode(", ", $timeSlots);
$venueSlotsLines = explode(", ", $venueSlots);
$maxLines = max(count($timeSlotsLines), count($venueSlotsLines));
$lineHeight = 10;
$cellHeight = $maxLines * $lineHeight;

// Add table rows with booking details
$pdf->Cell(30, $cellHeight, $court, 1, 0, 'C');
$pdf->Cell(30, $cellHeight, $date, 1, 0, 'C');

// Store current X and Y positions
$x = $pdf->GetX();
$y = $pdf->GetY();

// Print Time Slots cell
$pdf->MultiCell(70, $lineHeight, implode("\n", $timeSlotsLines), 1, 'C');

// Set the position for the Venue Slots cell to the right of the Time Slots cell
$pdf->SetXY($x + 70, $y);

// Print Venue Slots cell
$pdf->MultiCell(60, $cellHeight, implode("\n", $venueSlotsLines), 1, 'C');

// Line break
$pdf->Ln($cellHeight - $lineHeight);

// Add total price
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 80, 'Total Price: RM ' . number_format($price, 2), 0, 1, 'R');

// Output the PDF
$pdf->Output('I', 'invoice_event.pdf');
?>
