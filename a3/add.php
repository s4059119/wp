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