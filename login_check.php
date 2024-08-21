<?php
session_start();
include 'db_connection.php';

if (!isset($_SESSION['username']) || !isset($_SESSION['id'])) {
    // Redirect to login page
    header("location: login.php");
    exit;
}
?>
