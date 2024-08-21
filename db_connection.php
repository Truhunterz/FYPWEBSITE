<?php
$servername = "sql212.infinityfree.com";
$username = "if0_36943310";
$password = "Arip123";
$dbname = "if0_36943310_jesselball";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
