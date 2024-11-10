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

<main>
    <h1 class="userh1"><?= htmlspecialchars($username) ?>'s Collection</h1>
    
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>
            <div class="petCard">
                <img class="detailsImg" src="images/<?= htmlspecialchars($row['image']) ?>" alt="<?= htmlspecialchars($row['petname']) ?>">
                
                <div class="detailsTextContainer">
                    <p class="detailsName"><?= htmlspecialchars($row['petname']) ?></p>
                    <p class="detailsDescription"><?= htmlspecialchars($row['description']) ?></p>
                </div>
