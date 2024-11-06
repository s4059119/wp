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
    
    <div class="detailsTextContainer">
        <p class="detailsName"><?= htmlspecialchars($row['petname']) ?></p>
        <p class="detailsDescription"><?= htmlspecialchars($row['description']) ?></p>
    </div>

    <div class="detailsContainer">
        <div class="detailsInfo">
            <i class="material-icons">access_alarm</i><br>
            <p><?= $row['age'] ?> months</p>
        </div>
        <div class="detailsInfo">
            <span class="material-symbols-outlined">pets</span><br>
            <p><?= $row['type'] ?></p>
        </div>
        <div class="detailsInfo">
            <i class="material-icons">location_on</i><br>
            <p><?= htmlspecialchars($row['location']) ?></p>
        </div>
    </div>
