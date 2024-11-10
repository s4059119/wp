<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include('includes/header.inc');
include('includes/nav.inc');
include("includes/db_connect.inc");

// Get pet ID from URL parameter
$id = $_GET['id'];

// Fetch current pet details from the database
$stmt = $conn->prepare("SELECT * FROM pets WHERE petid = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$pet = $result->fetch_assoc();

if (!$pet) {
    echo "Pet not found!";
    exit();
}

$oldImage = $pet['image'];
