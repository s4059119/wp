<?php
session_start();

// Check if the user is logged in by verifying the session variable
if (!isset($_SESSION['username'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

include('includes/header.inc');
include('includes/nav.inc');
include("includes/db_connect.inc");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// Get form data and escape it for security
$petname = mysqli_real_escape_string($conn, $_POST['petname']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
$caption = mysqli_real_escape_string($conn, $_POST['caption']);
$age = (float) $_POST['age'];
$type = mysqli_real_escape_string($conn, $_POST['type']);
$location = mysqli_real_escape_string($conn, $_POST['location']);
$image = $_FILES['image']['name'];
$username = $_SESSION['username']; // Retrieve the logged-in username from the session

    // Handle image upload
    $target_file = "images/" . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check === false) {
        die("File is not an image.");
    }
    if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        die("There was an error uploading your file.");
    }

    // Insert pet data including the username into the database
    $sql = "INSERT INTO pets (petname, description, caption, age, type, location, image, username) 
            VALUES ('$petname', '$description', '$caption', '$age', '$type', '$location', '$image', '$username')";

    if (mysqli_query($conn, $sql)) {
        echo "New pet added successfully!";
        header('Location: pets.php'); // Redirect to the pets page after successful addition
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}