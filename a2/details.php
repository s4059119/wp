<?php
include_once('includes/db_connect.inc');


$title = "Pet Details";


include_once('includes/header.inc');
?>

<header>
  <?php
  
  include_once('includes/nav.inc');
  ?>
</header>

<?php


if (isset($_GET['petid'])) {
  $petid = mysqli_real_escape_string($connection, $_GET['petid']); 

  
  $sql = "SELECT * FROM pets WHERE petid = ?";
  $stmt = mysqli_prepare($connection, $sql);  
  mysqli_stmt_bind_param($stmt, "i", $petid);   
  mysqli_stmt_execute($stmt);                   

  $result = mysqli_stmt_get_result($stmt);     

  
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    $petname = htmlspecialchars($row['petname']);
    $type = htmlspecialchars($row['type']);
    $age = htmlspecialchars($row['age']);
    $location = htmlspecialchars($row['location']);
    $image = htmlspecialchars($row['image']); 
    $description = htmlspecialchars($row['description']);

    
    $imagePath = "images/" . $image;
  } else {
    echo "<p>Pet not found.</p>";
    exit();
  }


  mysqli_stmt_close($stmt);
} else {
  echo "<p>No pet selected.</p>";
  exit();
}


mysqli_close($connection);
?>

<main class="default-main">
    <section class="pet-info-section">
        <div class="pet-image">
            <img src="<?php echo $imagePath; ?>" alt="<?php echo $petname; ?>" class="pet-profile-image">
        </div>

        <div class="pet-details">
                <div class="detail">
                    <i class="material-icons">alarm</i>
                    <p><?php echo $age; ?> Months</p>
                </div>
            <div class="detail">
            <i class="material-icons">pets</i>
                <p><?php echo ucfirst($type); ?></p>
            </div>
            <div class="detail">
            <i class="material-icons">location_on</i>
                <p><?php echo $location; ?></p>
            </div>
        </div>

        <div class="pet-name-description">
            <h2><?php echo $petname; ?></h2>
            <p><?php echo $description; ?></p>
        </div>
    </section>
</main>

<?php

include_once('includes/footer.inc');
?>
