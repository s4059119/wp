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

                <?php
                // Check if the logged-in user is the owner of the pet
                if ($row['username'] === $username) { // Use the correct variable for the logged-in username
                    echo '<div class="button-container" style="margin-top: 20px; margin-bottom: 20px;">
                            <a href="edit.php?id=' . htmlspecialchars($row['petid']) . '" class="btn btn-primary" style="margin-right: 10px;">Edit</a>
                            <a href="delete.php?id=' . htmlspecialchars($row['petid']) . '" class="btn btn-danger">Delete</a>
                          </div>';
                }
                ?>
            </div>
            <?php
        }
    } else {
        echo "<p>No pets found for this user.</p>";
    }
    ?>
</main>

<?php
include('includes/footer.inc');
?>
