<?php
session_start();
include 'db_connection.php';

if (isset($_SESSION['username']) || isset($_SESSION['id'])) {
    session_unset();
    session_destroy();
    header('Location: login.php');
    exit;
}

?>
