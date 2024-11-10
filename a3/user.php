<?php
session_start();

include('includes/db_connect.inc');
include('includes/header.inc');
include('includes/nav.inc');

if (!isset($_SESSION['username'])) {
    echo "<p>You must be logged in to view this page.</p>";
    exit;
}

$username = $_SESSION['username']; // Get the logged-in username

// Query to get pets uploaded by the logged-in user
$stmt = $conn->prepare("SELECT * FROM pets WHERE username = ?"); 
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

?>
