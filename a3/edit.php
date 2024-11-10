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

// Process form submission for updating pet details
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $petname = $_POST['petname'];
    $description = $_POST['description'];
    $caption = $_POST['caption'];
    $age = (float) $_POST['age'];
    $type = $_POST['type'];
    $location = $_POST['location'];
    $username = $_SESSION['username'];
    $image = $oldImage;

    // Handle image upload if a new file is uploaded
    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $target_file = "images/" . basename($image);

        // Validate the image file
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check === false) {
            die("File is not an image.");
        }

        // Move the new image to the images folder
        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            die("There was an error uploading your file.");
        }

        // Delete the old image file if a new one was uploaded
        if (file_exists("images/" . $oldImage) && $oldImage !== $image) {
            unlink("images/" . $oldImage);
        }
    }

    // Update pet details
    $stmt = $conn->prepare("UPDATE pets SET petname = ?, description = ?, caption = ?, age = ?, type = ?, location = ?, image = ?, username = ? WHERE petid = ?");
    $stmt->bind_param("sssissssi", $petname, $description, $caption, $age, $type, $location, $image, $username, $id);

    if ($stmt->execute()) {
        echo "Pet details updated successfully!";
        header('Location: pets.php'); // Redirect to the pets page after successful update
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

mysqli_close($conn);
?>
