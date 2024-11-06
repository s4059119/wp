<?php
session_start(); // Ensure the session is started
include('includes/header.inc');
include('includes/nav.inc');
include("includes/db_connect.inc");

$id = $_GET['id'];
$sql = "SELECT * FROM pets WHERE petid = $id";
$result = $conn->query($sql);

$row = mysqli_fetch_array($result);

// Get the logged-in user's username from the session
$loggedInUsername = $_SESSION['username'] ?? ''; 
?>

<main>
    <img class="detailsImg" src="images/<?= htmlspecialchars($row['image']) ?>" alt="<?= htmlspecialchars($row['petname']) ?>">
    
