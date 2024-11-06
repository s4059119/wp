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

mysqli_close($conn);
?>

<section class="main-section-3">
    <div class="container">
        <div class="textContent3">
            <h3>Add a pet</h3>
            <p>You can add a new pet here</p>
        </div>
        <form action="add.php" class="addpetform" method="post" enctype="multipart/form-data">
            <label for="petname">Pet Name:</label>
            <input type="text" id="petname" name="petname" placeholder="Provide a name for the pet" required>

            <label for="type">Type:</label>
            <select id="type" name="type" required>
                <option value="">--Choose an option--</option>
                <option value="Dog">Dog</option>
                <option value="Cat">Cat</option>
                <option value="Small Animal">Small Animal</option>
            </select>

            <label for="description">Description</label>
            <textarea id="description" name="description" rows="4" placeholder="Describe the pet briefly" required></textarea>

            <label for="image">Select an Image:</label>
            <input type="file" id="image" name="image" required><br><br>

            <label for="caption">Image Caption:</label>
            <input type="text" id="caption" name="caption" placeholder="Describe the image in one word" required>

            <label for="age">Age (months):</label>
            <input type="text" id="age" name="age" placeholder="Age of the pet in months" required>

            <label for="location">Location:</label>
            <input type="text" id="location" name="location" placeholder="Location of the pet" required>
            
            <div class="button-group">
                <button type="submit" class="btn submit-btn">submit</button>
                <button type="reset" class="btn clear-btn">clear</button>
            </div>