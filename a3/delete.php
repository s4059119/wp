<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include('includes/db_connect.inc');

// Get the pet ID
$id = $_GET['id'] ?? null;
if (!$id || !is_numeric($id)) {
    echo "Invalid pet ID!";
    exit();
}
