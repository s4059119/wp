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

// Fetch the pet record to get the image file path
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
