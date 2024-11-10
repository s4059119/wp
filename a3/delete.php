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

// If the deletion is confirmed via JavaScript, proceed with deletion
if (isset($_POST['confirm_delete'])) {
    // Prepare the deletion query
    $stmt = $conn->prepare("DELETE FROM pets WHERE petid = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Delete the image file if it exists
        if (file_exists("images/" . $oldImage)) {
            unlink("images/" . $oldImage);
        }
        echo "Pet deleted successfully!";
        header("Location: pets.php"); // Redirect to the pets page after deletion
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

mysqli_close($conn);
?>

